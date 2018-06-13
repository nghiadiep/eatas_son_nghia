@extends('layouts.user.default')

@section('content')

@include("component.part.slideshow", ["url" => route('api.articles.tops')])
<div class="content-center">
    <div class="block-bg-gray">
        <section class="article-readlater" id="clips-list">
            <h2 class="section-title"><span>あとで読むに入っている記事</span></h2>
            <div v-if="clips.length > 0">
            <!-- Begin Code here put inside id "clips-list" -->
            <div class="slider-readlater">
                <div class="slider-readlater__item" v-for="clip in clips">
                    <clip-chip-slider v-bind:clip="clip" v-bind:authed="true" />
                </div>
            </div>
            <!-- End Code here put inside id "clips-list" -->
            </div>
        </section>
        <div class="current-point">
            <div class="current-point__header">○○○さん 現在のポイント数：○○ポイント</div>
            <div class="current-point__button"><a href="#" class="btn-point">ポイント獲得/利用履歴</a></div>
        </div>
        <div class="block-usage-eatas sp">
            <a href="#">
                <span class="block-usage-eatas__title">EATAS活用方法を見る</span>
                <span class="block-usage-eatas__txt">EATASをビジネスに活かす方法を簡単にご説明します。</span>
            </a>
        </div>
    </div>
    <hr class="hr sp">
    <div class="block-home-blog" id="articles-list">
        <h2 class="block-home-list__title"><span>新着記事</span></h2>
        <div class="block-home-blog__inner">
            <div v-for="article in articles">
                <article-cell @clip-event="onReloadClip" v-bind:article="article" :authed="true" />
            </div>
            
        </div>
    </div>
</div>

<script type="text/javascript">
window.onload=function(){
    if(window.jQuery){
        $('.block-home-blog__footer__btn-read-later').on('click', function(){
            if($('.slider-readlater').hasClass('slick-initialized')){
                $('.slider-readlater').slick('unslick');    
            }
        });
    }
}
document.addEventListener('DOMContentLoaded', function() {
    /* Move PC point html structure to SP */
    var $sidebarPoint  = $('.sidebar-point');
    var $usageEatas = $('.block-usage-eatas');
    $(window).on('load resize', function(){
        if($(window).width()<768){
            if($sidebarPoint.length>0 && $('.b-point-content').length<=0){
                $sidebarPoint.parent('.sidebar__box').insertBefore($usageEatas).addClass('b-point-content');
            }
        }else{
            $('.sidebar').prepend($sidebarPoint.parent('.sidebar__box').detach());
            $sidebarPoint.parent('.sidebar__box').removeClass('b-point-content');
        }
    });
    let clipVue = new Vue( {
        el: '#clips-list',
        data: {
            clips: [],
            pagesize:100,
            slick:{
                dots: true,
                infinite: false,
                speed: 300,
                slidesToShow: 3,
                slidesToScroll: 1,
                dots: false,
                responsive: [
                    {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                    }
                ]
            }
        },
        mounted: function() {
            this.readMore();
        },
        updated: function() {
            if($('.slider-readlater').hasClass('slick-initialized')){
                $('.slider-readlater').slick('unslick');
            }
            $('.slider-readlater').slick(this.slick);
            $('.slider-readlater__title').css({'width':'100%'});
        },
        methods: {
            readMore: function() {
                var self = this;
                axios.get("{{route('api.user.clips')}}?pagesize="+this.pagesize).then( function( res ) {
                    self.clips = res.data.data;
                }).catch( function( res ) {
                    console.error( res );
                });
            },
            onDelete: function(clip) {
                this.clips = this.clips.filter( function(c) {
                    return c.id != clip.id;
                }); 
            }
        },
    });

    let articleVue =  new Vue( {
        el: '#articles-list',
        data: {
            page: 0,
            canMore: true,
            articles: [],
        },
        mounted: function (){
            this.readMore();
        },
        methods: {
            readMore: function() {
                this.page += 1;
                var self = this;
                axios.get("{{route('api.articles')}}?page=" + this.page).then( function( res ) {
                    self.articles = self.articles.concat(res.data.data);
                    if(self.page >= res.data.last_page){
                        self.canMore=false;
                    }
                }).catch( function( res ) {
                    console.error( res );
                });
            },
            onReloadClip: function() {
                clipVue.readMore();
            }
        },
    });
    
});
                
</script>

@endsection
