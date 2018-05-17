confirmDelete = function(event){
    event.preventDefault();
    UIkit.modal.confirm('本当に削除しますか？').then(function () {
       event.target.submit();
    }, function () {
    });
};

viewAll = function (self, url) {
    if(url != null){
        axios.post(url).then((res) => {});
    }
    return false;
}

clickTabItem = function(self) {
    var $self = $(self);
    var $tabBase = $(self).parents(".tab-base");
    var left = $self.position().left;
    var width = $self.width();
    
    $tabBase.animate({
        scrollLeft: left + (width/2) - ($(window).width()/2)
    }, 300, 'swing');
};

slideTab = function (self, distination) {
    var $self = $(self);
    var $tabBase = $(self).parent().children('.tab-base');
    $tabBase.animate({
        scrollLeft: (200 * distination) + $tabBase.scrollLeft()
    }, 300, 'swing');
};

document.addEventListener('DOMContentLoaded', function() {
    
    $(document).on("keypress", "input:not(.allow_submit)", function(event) {
        return event.which !== 13;
    });

    if( jQuery.datetimepicker != null ){
        jQuery.datetimepicker.setLocale('ja');
        $('.datetimepicker').datetimepicker({
            format: 'Y-m-d H:i',
            timepicker: true
        });

        $('.datepicker').datetimepicker({
            format: 'Y-m-d',
            timepicker: false
        });    
    }

    if(window.Layzr != null){
        const layzr = Layzr({
          threshold: 0
        });    
    }

    $('*[required]').each(function(index, el) {
        var name =     $(el).attr("name");
        $label = $(el).parents(".uk-form-controls").parent().children('label[for='+name+']');
        $label.text( $label.text() + "(必須)" );
    });

    $("*[uk-spinner] > svg:first-child").remove();

    $('.text-overflow').each(function() {
        var $target = $(this);
     
        // オリジナルの文章を取得する
        var html = $target.html();
     
        // 対象の要素を、高さにautoを指定し非表示で複製する
        var $clone = $target.clone();
        $clone.css({
            display: 'none',
            position : 'absolute',
            overflow : 'visible'
        }).width($target.width()).height('auto');
     
        // DOMを一旦追加
        $target.after($clone);
     
        // 指定した高さになるまで、1文字ずつ消去していく
        while((html.length > 0) && ($clone.height() > $target.height())) {
            html = html.substr(0, html.length - 1);
            $clone.html(html + '...');
        }
     
        // 文章を入れ替えて、複製した要素を削除する
        $target.html($clone.html());
        $clone.remove();
    });
});

openPopup = function(url){
    window.open(url, 'popupwindow', 'width=550, height=450,personalbar=0,toolbar=0,scrollbars=1,resizable=1');
    return false;
}

shareToTwitter = function(url, title=null){
    let fullUrl = "http://twitter.com/share?url=" + encodeURIComponent(url) + "&text=" + encodeURIComponent(title);
    openPopup(fullUrl);
}

shereToFacebock = function(url){
    FB.ui({
        method: 'share', display: 'popup', href: url,
    }, function(response){});
}

shareToHatena = function(url){
    let fullUrl = "http://b.hatena.ne.jp/add?url=" + encodeURIComponent(url);
    openPopup(fullUrl);
}

shareToGooglePlus = function(url){
    let fullUrl = "https://plusone.google.com/_/+1/confirm?hl=ja&url=" + encodeURIComponent(url);
    openPopup(fullUrl);
}

shareToLine = function(url, title){
    var url = "https://line.me/R/msg/text/?「"+title+"」".url;
    openPopup(url);
}

QueryString = {  
  parse: function(text, sep, eq, isDecode) {
    text = text || location.search.substr(1);
    sep = sep || '&';
    eq = eq || '=';
    var decode = (isDecode) ? decodeURIComponent : function(a) { return a; };
    return text.split(sep).reduce(function(obj, v) {
      var pair = v.split(eq);
      obj[pair[0]] = decode(pair[1]);
      return obj;
    }, {});
  },
  stringify: function(value, sep, eq, isEncode) {
    sep = sep || '&';
    eq = eq || '=';
    var encode = (isEncode) ? encodeURIComponent : function(a) { return a; };
    return Object.keys(value).filter( (key) => {
        var val = value[key];
        return val !== null && (Array.isArray(val) || ( typeof val === "string" && val.length > 0 ) || typeof val !== "string" );
    } ).map(function(key) {
        var val = value[key];
        if( Array.isArray(val) ){
            return val.map( (v) => {
                return key + "[]" + eq + encode(v);
            } ).join(sep);
        }else{
            return key + eq + encode(val);
        }
    }).join(sep);
  },
};