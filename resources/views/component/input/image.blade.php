@php
$name = isset($name)? $name: 'article_image_id';
@endphp

<input class="image-input" type="hidden" name="{{$name}}" value="{{isset($image)?$image->id:null}}">

<div id="image-base_{{$name}}" class="uk-height-small uk-width-1-1 image-contain" style="{{!isset($image) ? 'display:none': null }}">
    <img src="@if(isset($image))@include('component.part.image', ['image' => $image])@endif">
    <div class="uk-position-bottom-right">
        <a class="uk-icon-button uk-button-danger" uk-icon="icon: trash">
        </a>
    </div>
</div>
<div id="noimage-base_{{$name}}" style="{{isset($image) ? 'display:none': null }}">
    <a class="uk-button uk-button-primary" href="#image-modal_{{$name}}" uk-toggle>
        画像を設定
    </a>
</div>

<div id="image-modal_{{$name}}" class="uk-modal-container" uk-modal>
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-hidden data-holder"></div>
        <div class="uk-modal-header">
            <h2 class="uk-modal-title">画像設定</h2>
        </div>
        <div class="uk-modal-body" uk-overflow-auto>

            <ul uk-tab>
                <li class="uk-active">
                    <a href="#">アップロード</a>
                </li>
                <li>
                    <a href="#">画像を選択</a>
                </li>
            </ul>
            <ul class="uk-switcher uk-margin">
                <li>
                    <div class="uk-margin-small">
                        <div class="js-upload uk-placeholder uk-text-center">
                            <span uk-icon="icon: cloud-upload"></span>
                            <span class="uk-text-middle">
                                画像ファイルをドロップするか            
                            </span>
                            <div uk-form-custom>
                                <input type="file" multiple>
                                <span class="uk-link">こちらから選択します</span>
                            </div>
                        </div>
                        <progress id="js-progressbar" class="uk-progress" value="0" max="100" hidden></progress>
                    </div>
                    <div class="uk-margin-small image-base uk-text-center" style="display: none;">
                        <img class="uk-height-medium">
                    </div>
                </li>
                <li id="selectImageBase">
                    <div class="uk-margin uk-gird-small images-base" uk-grid>
                        <div class="uk-width-1-4@m uk-width-1-2@s uk-width-1-1 uk-position-relative" v-for="articleImage in articleImages">
                            <div class="uk-height-small image-wrapper">
                                <img v-bind:data-id="articleImage['id']" v-bind:src="getImageUrl(articleImage['url'])" onclick="selectThis(this)">
                            </div>
                            @auth("administrator")
                            <div class="uk-position-bottom-right">
                                <a class="uk-button uk-button-small uk-button-danger" v-on:click="delImage(articleImage.id)">
                                    削除
                                </a>
                            </div>
                            @endauth
                        </div>
                    </div>
                    <div class="uk-margin uk-text-center">
                        <div v-if="canMore" v-inview:enter="readMore">
                            <div uk-spinner class="uk-inline uk-margin-small-right"></div>
                            読み込み中...
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="uk-modal-footer uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close" type="button">キャンセル</button>
            <button class="uk-button uk-button-primary uk-modal-close select-button" type="button">保存</button>
        </div>
    </div>
</div>


<script type="text/javascript">
var setHolder = function(id, url){
    var holder = document.querySelector("#image-modal_{{$name}} .data-holder");
    holder.setAttribute("data-id", id);
    holder.setAttribute("data-url", url);
};

var selectThis = function(self) {
    document.querySelectorAll("img.selected").forEach(function(element){
        element.className = null;
    });
    self.className ='selected';
    var id = self.getAttribute("data-id");
    var url = self.getAttribute("src");
    setHolder(id, url);
};

document.addEventListener('DOMContentLoaded', function() {
    var bar = document.getElementById('js-progressbar');
    UIkit.upload('#image-modal_{{$name}} .js-upload', {
        url: "{{$url}}",
        multiple: false,
        mime: "image/*",
        name: "file",
        beforeSend: function (env) {
            //認証パラメータ
            env.headers ={
                Authorization: "Bearer " + document.querySelector("meta[name=auth-token]").getAttribute("content")
            };
        },
        complete: function () {
        },
        loadStart: function (e) {
            bar.removeAttribute('hidden');
            bar.max = e.total;
            bar.value = e.loaded;
        },
        progress: function (e) {
            bar.max = e.total;
            bar.value = e.loaded;
        },
        loadEnd: function (e) {
            bar.max = e.total;
            bar.value = e.loaded;
        },
        completeAll: function (result) {
            var data = JSON.parse(result.response);
            setTimeout(function () {
                bar.setAttribute('hidden', 'hidden');
            }, 1000);
            var imageBase = document.querySelector("#image-modal_{{$name}} .image-base");
            imageBase.style.display="block";

            var image = document.querySelector("#image-modal_{{$name}} .image-base img");
            image.setAttribute("src", data.url);

            setHolder(data.articleImage.id, data.url);
        }
    });

    document.querySelector("#image-base_{{$name}} a").onclick = function(){
        UIkit.modal.confirm('本当に削除しますか？').then(function () {
            document.querySelector("input[name={{$name}}]").removeAttribute("value");
            document.querySelector("#image-base_{{$name}}").style.display = "none";
            document.querySelector("#noimage-base_{{$name}}").style.display = "inline-block";
        }, function () {
        });
    };

    document.querySelector("#image-modal_{{$name}} .select-button").onclick = function(){
        var holder = document.querySelector("#image-modal_{{$name}} .data-holder");
        document.querySelector("input[name={{$name}}]").setAttribute("value", holder.getAttribute("data-id"));
        document.querySelector("#image-base_{{$name}}").style.display = "inline-block";
        document.querySelector("#image-base_{{$name}} img").setAttribute("src", holder.getAttribute("data-url"));
        document.querySelector("#noimage-base_{{$name}}").style.display = "none";
    };

    let vm = new Vue( {
        el: '#selectImageBase',
        data: {
            page: 0,
            canMore: true,
            articleImages: [],
        },
        methods: {
            readMore: function() {
                this.page += 1;
                axios.get("{{$read}}?page=" + this.page).then( ( res ) => {
                    this.articleImages = this.articleImages.concat(res.data.data);
                    if(this.page >= res.data.last_page){
                        this.canMore=false;
                    }
                }).catch( ( res ) => {
                  console.error( res );
                });
            },
            delImage: function(imageId){
                @auth("administrator")
                UIkit.modal.confirm('本当に削除しますか？', {stack: true}).then( () => {
                    var url = "{{route('api.administrator.article_images.delete', ['article_image' => null])}}";
                    url = url.replace(/\/\/delete/g, "/" + imageId + "/delete");
                    axios.post(url).then( res => {
                    });
                    this.articleImages = this.articleImages.filter( (articleImage) => {
                        return articleImage.id != imageId;
                    });
                }); 
                @endauth
            }
        },
    });
});
</script>