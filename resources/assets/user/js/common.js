var body = $("body");
var top = body.scrollTop();
var elHeaderMiddle = $('.header .header__middle');
var headerMiddleH  = elHeaderMiddle.height();
/*** BUTON FOR PAGE TOP */
$('.btn-page-top').click(function(){
	if(top!=0){$('html,body').animate({scrollTop:0}, '500');}
});

(function($){
	"use strict";
	/*** Arccodion**/
	var window = 0;
	$(".block-accordion__title").click(function (e) {
		$(this).next(".block-accordion__content").slideToggle(300).siblings(".block-accordion__content:visible").slideUp(300);
		$(this).toggleClass("active");
		$(this).siblings(".block-accordion__title").removeClass("active");
		e.preventDefault();
	 });
	 $('input[data-toggle="nav-menu-toggle"]').click(function(){
		$('input[data-toggle="nav-mod-search"]').prop('checked',false);
	});
	$('input[data-toggle="nav-mod-search"]').click(function(){
		$('input[data-toggle="nav-menu-toggle"]').prop('checked',false);
	 });

	$('.btn--approve').click(function(e) {
		e.preventDefault();
		$(this).closest('.form-group').cftoaster({content: "編集内容を登録しました", fontColor: "#000000", backgroundColor: "#ffffff", maxWidth: "250", bottomMargin: "30", showTime: "3000"});
	})

	$('.edit-info-member-page .input-group__addon').click(function() {
		if($(this).siblings('input[type="text"]').length > 0) {
			$(this).siblings('input[type="text"]').attr('type','password');
		} else {
			$(this).siblings('input[type="password"]').attr('type','text');
		}
		
	});
})(jQuery); /***End of use strict**/

var elModalSearch = $('.modal-search');
var modalSearchH = 0;
var windowH = 0;
$(window).on('load resize',function(){
	elModalSearch.css({'height':''});
	windowH = $(window).height();
	modalSearchH = elModalSearch.outerHeight(true);
	if(modalSearchH>windowH){
		elModalSearch.css({'height':windowH});
	}else{
		modalSearchH = elModalSearch.height();
		elModalSearch.css({'height':modalSearchH});
	}
	var form = $('form.checkable-submit');
	setCheckSubmit(form);
	doCheckSubmit(form);
	showQuateEnd();
});

showQuateEnd = function(){
	$('.block-art-detail__sentence').each(function(index, el) {
		$(el).find("blockquote + *:not(blockquote.linebreak-true)").each(function(index, el) {
			var quateEnd = '<span class="qoute qoute--bottom"><img src="/images/qoute_bottom.png" alt=""></span>';
			$(el).prev().append(quateEnd);
		});
	});
}


onAuthedAction = function(productId=null){
	if(productId != null){
		$('input.inquiering_product[type=hidden]').val(productId);
	}
    $.fancybox.open({
        src  : '#modalLoginIntro',type : 'inline'
    });
}

onOpenLogin = function(productId=null){
	if(productId != null){
		$('input.inquiering_product[type=hidden]').val(productId);
	}
    $.fancybox.open({
        src  : '#modalLogin',type : 'inline'
    });
}

switchVisitable = function(self){
	var input = $(self).parent().find("input");
	var type = input.attr('type');
	if(type == "password"){
		input.attr('type', 'text');
		$(self).find("span").text('非表示');
	}else{
		input.attr('type', 'password');
		$(self).find("span").text('表示する');
	}
}

showInquiryTab = function(index, domId){
	var base = $("#"+domId);
	base.children().attr("hidden", true);
	base.find("input, select, textarea").attr("disabled", true);

	var selected = $("#"+domId+"__"+index);
	selected.attr("hidden", false);
	selected.find("input, select, textarea").attr("disabled", false);
}

changeDate = function(name){
	var year = $("select[name="+name+"__year]:not(:disabled) option:selected").val();
	var month = $("select[name="+name+"__month]:not(:disabled) option:selected").val();
	var day = $("select[name="+name+"__day]:not(:disabled) option:selected").val();
	$("input[name="+name+"]:not(:disabled)").val(year+"-"+month+"-"+day);
}

setCheckSubmit = function(form){
	form.find("input, textarea, select").on('change', function(event) {
		doCheckSubmit(form);	
	});
}

doCheckSubmit = function(form){
	var requireds = form.find("input[required]:not(:disabled), textarea[required]:not(:disabled), select[required]:not(:disabled)");
		
	var disabled = false;
	requireds.each(function(index, el) {
		if($(el).val() == null || $(el).val().length == 0 || $(el).val() == "null" ){
			disabled = true;
		}
	});
	form.find("input[type=checkbox]").each(function(index, el) {
		disabled = disabled || !$(el).prop("checked");
	});

	form.find("button[type=submit]").attr("disabled", disabled);
	if(disabled){
		form.find("button[type=submit]").addClass("btn--off").removeClass("btn--on");
	}else{
		form.find("button[type=submit]").addClass("btn--on").removeClass("btn--off");
	}
}

onAutoAddress = function (postcode, prefecture, address, error, url) {
	var postEle = document.querySelector("input[name="+postcode+"]:not(:disabled)");
	var errorEle = document.querySelector(error);

	if( postEle.value == null || postEle.value.length == 0 ){
        postEle.classList.add("error");
		errorEle.innerText = "郵便番号を入力してください";
        return;
	}
    postEle.classList.remove("error");
	errorEle.innerText = null;

	var prefectureEle = document.querySelector("select[name="+prefecture+"]:not(:disabled)");
	var addressEle = document.querySelector("input[name="+address+"]:not(:disabled)");

	axios.get( url + "?post_code="+postEle.value ).then( (response) => {
        if(response.status == 200 && response.data.result ){
            prefectureEle.value = response.data.data.prefecture.id;
            addressEle.value = response.data.data.address;
        }else{
            postEle.classList.add("error");
            errorEle.innerText = "郵便番号が正しいか確認してください";
        }
    });
}

showNoClip = function(element='body') {
	var clipNoneHtml='<div class="block-clipnone">'+
    '<div class="block-clipnone__inner">'+
      '<div class="clipnone-table">'+
        '<div class="clipnone-table__cell">'+
          '<div class="clipnone-content">'+
            '<div class="clipnone-content__inner">'+
                '<h2 class="clipnone-content__title">「あとで読む」が<br>登録されていません</h2>'+
                '<p>「あとで読む」を押してみてください。<br>EATASには便利な機能がたくさんあります。</p>'+
                '<div class="clipnone-content__bottom"><a href="#" class="btn btn--block btn--default">EATASの使い方を見る</a></div>'+
            '</div>'+
          '</div>'+
        '</div>'+
      '</div>'+
    '</div>'+
    '</div>';
    $(element).cftoaster({content: clipNoneHtml, maxWidth: "768", bottomMargin: "30", showTime: "4000"});
}

scrollToTop = function () {
	$( 'html,body' ).animate( {scrollTop:0} , 300 );
}

scrollToSelector = function (selector) {
	$( 'html,body' ).animate( {scrollTop: $(selector).position().top - 60 } , 300 );
}