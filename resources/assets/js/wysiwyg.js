document.addEventListener('DOMContentLoaded', function() {

    var editor = document.querySelector('.editor');
    if(editor == null || Quill == null){
        return;
    }

    var Keyboard = Quill.import('modules/keyboard');
    var Delta = Quill.import('delta');

    var ColorStyle = Quill.import('attributors/style/color');
    var AlignStyle = Quill.import('attributors/style/align');
    var SizeClass = Quill.import('attributors/class/size');
    let BlockEmbed = Quill.import('blots/block/embed');
    let Inline = Quill.import('blots/inline');

    class VideoBlot extends BlockEmbed {
      static create(data) {
        let node = super.create();
        node.setAttribute('src', data);
        node.setAttribute('height', "400px");
        node.setAttribute('width', "100%");
        node.setAttribute('frameborder', '0');
        node.setAttribute('allowfullscreen', true);
        return node;
      }
      
      static formats(node) {
        let format = {};
        if (node.hasAttribute('height')) {
          format.height = node.getAttribute('height');
        }
        if (node.hasAttribute('width')) {
          format.width = node.getAttribute('width');
        }
        return format;
      }
      
      static value(node) {
        return node.getAttribute('src');
      }
      
      format(name, value) {
        if (name === 'height' || name === 'width') {
          if (value) {
            this.domNode.setAttribute(name, value);
          } else {
            this.domNode.removeAttribute(name, value);
          }
        } else {
          super.format(name, value);
        }
      }
    }
    VideoBlot.blotName = 'myvideo';
    VideoBlot.tagName = 'iframe';
    Quill.register(VideoBlot);

    var toolbarOptions = [
        ['bold', 'italic', 'underline', 'strike'],
        ['link','blockquote', { 'color': [] }, { 'background': [] }],
        [{ 'align': ["", "right", "center"] }],
        [{ 'list': 'ordered'}, { 'list': 'bullet' }, 'custom'],
        [{ 'size': ['small', false, 'large', 'huge'] }],
        [{ 'header': [ 2, 3, false] }],
        ['image', 'video'],
        ['clean'],
    ];

    var keyboardOptions = {
        bindings: {
            smartbreak: {
                key: Keyboard.keys.ENTER,
                shiftKey: true,
                handler: function (range, context) {
                    this.quill.setSelection(range.index,'silent');
                    this.quill.insertText(range.index, '\n', 'user')
                    this.quill.setSelection(range.index +1,'silent');
                    this.quill.format('linebreak', true,'user');
                }
            },
            paragraph: {
                key: Keyboard.keys.ENTER,
                handler: function (range, context) {
                    this.quill.setSelection(range.index,'silent');
                    this.quill.insertText(range.index, '\n', 'user')
                    this.quill.setSelection(range.index +1,'silent');
                    let f = this.quill.getFormat(range.index +1);
                    if(f.hasOwnProperty('linebreak') || f.hasOwnProperty('bar-list') ) {
                        delete(f.linebreak)
                        this.quill.removeFormat(range.index +1)
                        for(let key in f){
                            this.quill.formatText(range.index +1,key,f[key])
                        }
                    }
                }
            }
        }
    };

    Quill.register(ColorStyle, true);
    Quill.register(AlignStyle, true);
    Quill.register(SizeClass, true);

    var Parchment = Quill.import('parchment');
    var LineBreakClass = new Parchment.Attributor.Class('linebreak', 'linebreak', {
      scope: Parchment.Scope.BLOCK
    });
    Quill.register('formats/linebreak', LineBreakClass);

    let BarList = new Parchment.Attributor.Class('bar-list', 'bar-list');
    Parchment.register(BarList);

    var quill = new Quill('.editor', {
        modules: {
            toolbar: toolbarOptions,
            keyboard: keyboardOptions,
            clipboard: true,
        },
        theme: 'snow',
    });

    quill.on('text-change', function(delta, oldDelta, source) {
        var retIndex = 0;
        var delSize = null;
        delta.ops.forEach( (op, index) => {
            if(op.retain != null){
                retIndex = op.retain;
            }else if (op.delete != null){
                delSize = op.delete;
            }
        });
        if(retIndex != null && delSize != null){
            var deletedDelta = oldDelta.slice(retIndex, retIndex + delSize);
            deletedDelta.ops.forEach( function(ops, index) {
                if(ops.insert != null){
                    if(ops.insert.image != null){
                        deleteImage(ops.insert.image);    
                    }
                }
            });
        }

        var text = quill.getText();
        var html = quill.root.innerHTML;
        html = html.replace(/blobUrl=[0-9a-zA-Z\\/\-:.]*"/, '"');
        quill.container.nextElementSibling.setAttribute('value', html);
    });

    function deleteImage(url) {
        var path = url.split("/storage")[1];
        axios.post(imageDeleteUrl, {path: path}).then( ( res ) => {
        }).catch( ( res ) => {
          console.error( res );
        });
    }

    function saveImageToServer(file) {
        const fd = new FormData();
        fd.append('file', file);

        UIkit.modal("#loading-modal").show();
        const xhr = new XMLHttpRequest();
        xhr.open('POST', imageUploadUrl, true);
        xhr.setRequestHeader('Authorization', 'Bearer ' + document.querySelector("meta[name=auth-token]").getAttribute("content"));
        xhr.onload = () => {
            UIkit.modal("#loading-modal").hide();
            if (xhr.status === 200) {
                const data = JSON.parse(xhr.responseText);
                const range = quill.getSelection();
                var index = 0;
                if(range != null){
                    index = range.index;
                }
                var parsedUrl = new URL(data.url);
                quill.insertEmbed(index, 'image', parsedUrl.pathname);
            }
        };
        xhr.onerror = () => {
            UIkit.modal("#loading-modal").hide();
        }
        xhr.send(fd);
    }
    
    var toolbar = quill.getModule("toolbar");

    toolbar.addHandler("image", () => {
        const input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.click();

        input.onchange = () => {
            const file = input.files[0];
            if (/^image\//.test(file.type)) {
                saveImageToServer(file);
            } else {
                alert('画像を選択してください');
            }
        };
    });

    function saveMovieToServer(file, uploadParam) {
        return new Promise( (resolve, reject) => {
            
            const xhr = new XMLHttpRequest();
            xhr.open('POST', uploadParam.attribute.action, true);

            const fd = new FormData();
            if(uploadParam.input != null){
                Object.keys(uploadParam.input).forEach( (key) => {
                    if(key !== "key"){
                        let value = uploadParam.input[key];
                        fd.append(key, value);    
                    }else{
                        fd.append("key", uploadParam.name);
                    }
                });
            }else{
                xhr.setRequestHeader('Authorization', 'Bearer ' + document.querySelector("meta[name=auth-token]").getAttribute("content"));
            }
            fd.append('file', file);
            
            xhr.onload = () => {
                if (xhr.status < 300) {
                    var url = uploadParam.name;
                    if(uploadParam.name == null){
                        url = JSON.parse(xhr.responseText).url;
                    }
                    const range = quill.getSelection();
                    var index = 0;
                    if(range != null){
                        index = range.index;
                    }
                    var blobUrl = window.URL.createObjectURL( file ) ;

                    quill.insertText(index, '\n', Quill.sources.USER);
                    quill.insertEmbed(index + 1, 'myvideo',"/movie?url="+url+"&blobUrl="+blobUrl, Quill.sources.USER);
                    quill.setSelection(index + 2, Quill.sources.SILENT);
                    
                    resolve(xhr);
                }else{
                    reject(xhr);
                }
            };
            xhr.onerror = () => {
                reject();
            }
            xhr.send(fd);
        });
    }

    function getUploadUrl() {
        //アップロード用URLを取得
        return new Promise( (resolve, reject) => {
            const fd = new FormData();
            const xhr = new XMLHttpRequest();
            xhr.open('GET', movieUploadUrl, true);
            xhr.setRequestHeader('Authorization', 'Bearer ' + document.querySelector("meta[name=auth-token]").getAttribute("content"));
            xhr.onload = () => {
                if (xhr.status < 300) {
                    const data = JSON.parse(xhr.responseText);
                    resolve(data);
                }else{
                    reject(xhr);    
                }
            };
            xhr.onerror = () => {
                reject(xhr);
            }
            xhr.send(fd);
        });
    }

    toolbar.addHandler("video", () => {
        const input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.click();
        input.onchange = () => {
            const file = input.files[0];
            if (/^video\//.test(file.type)) {
                UIkit.modal("#loading-modal").show();
                getUploadUrl().then( (uploadParam)=>{
                    saveMovieToServer(file, uploadParam).then((result)=>{
                        UIkit.modal("#loading-modal").hide();
                    }).catch( (error) => {
                        UIkit.modal("#loading-modal").hide();
                    });
                }).catch( (error) => {
                    UIkit.modal("#loading-modal").hide();
                });
            } else {
                alert('動画を選択してください');
            }
        };
    });

    var customButton = document.querySelector('.ql-custom');
    customButton.addEventListener('click', function() {
        var range = quill.getSelection();
        if(range != null){
            var index = range.index;
            var format = quill.getFormat(index);
            console.log(format);
            if(format["bar-list"] != null && format["bar-list"] == "on" ){
                quill.formatLine(index, index, 'bar-list', 'off'); 
            }else{
                quill.formatLine(index, index, 'bar-list', 'on');     
            }
        }
    });

});


