@extends('layouts.user.default')

@section('content')

@include("component.part.slideshow", ["url" => route('api.articles.tops')])
<div class="content-center">
    <div class="block-bg-gray">
        <section class="article-readlater">
            <h2 class="section-title"><span>あとで読むに入っている記事</span></h2>
            <div class="slider-readlater">
                <div class="slider-readlater__item">
                    <a href="#">
                        <div class="slider-readlater__window">
                            <img src="{{asset('images/slider_read_later.png')}}" alt="カテゴリ1">
                        </div>
                        <div class="slider-readlater__des">
                            <p class="slider-readlater__cat"><span>カテゴリ1</span></p>
                            <h3 class="slider-readlater__title">記事タイトル記事タイトル記事タイトル記事タイトル記事</h3>
                        </div>
                    </a>
                </div>
                <div class="slider-readlater__item">
                    <a href="#">
                        <div class="slider-readlater__window">
                            <img src="{{asset('images/slider_read_later.png')}}" alt="カテゴリ1">
                        </div>
                        <div class="slider-readlater__des">
                            <p class="slider-readlater__cat"><span>カテゴリ1</span></p>
                            <h3 class="slider-readlater__title">記事タイトル記事タイトル記事タイトル記事タイトル記事</h3>
                        </div>
                    </a>
                </div>
                <div class="slider-readlater__item">
                    <a href="#">
                        <div class="slider-readlater__window">
                            <img src="{{asset('images/slider_read_later.png')}}" alt="カテゴリ1">
                        </div>
                        <div class="slider-readlater__des">
                            <p class="slider-readlater__cat"><span>カテゴリ1</span></p>
                            <h3 class="slider-readlater__title">記事タイトル記事タイトル記事タイトル記事タイトル記事</h3>
                        </div>
                    </a>
                </div>
                <div class="slider-readlater__item">
                    <a href="#">
                        <div class="slider-readlater__window">
                            <img src="{{asset('images/slider_read_later.png')}}" alt="カテゴリ1">
                        </div>
                        <div class="slider-readlater__des">
                            <p class="slider-readlater__cat"><span>カテゴリ1</span></p>
                            <h3 class="slider-readlater__title">記事タイトル記事タイトル記事タイトル記事タイトル記事</h3>
                        </div>
                    </a>
                </div>
                <div class="slider-readlater__item">
                    <a href="#">
                        <div class="slider-readlater__window">
                            <img src="{{asset('images/slider_read_later.png')}}" alt="カテゴリ1">
                        </div>
                        <div class="slider-readlater__des">
                            <p class="slider-readlater__cat"><span>カテゴリ1</span></p>
                            <h3 class="slider-readlater__title">記事タイトル記事タイトル記事タイトル記事タイトル記事</h3>
                        </div>
                    </a>
                </div>
                <div class="slider-readlater__item">
                    <a href="#">
                        <div class="slider-readlater__window">
                            <img src="{{asset('images/slider_read_later.png')}}" alt="カテゴリ1">
                        </div>
                        <div class="slider-readlater__des">
                            <p class="slider-readlater__cat"><span>カテゴリ1</span></p>
                            <h3 class="slider-readlater__title">記事タイトル記事タイトル記事タイトル記事タイトル記事</h3>
                        </div>
                    </a>
                </div>

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
                <article-cell v-bind:article="article" :authed="false" />
            </div>
            
        </div>
    </div>
</div>

<script type="text/javascript">

document.addEventListener('DOMContentLoaded', function() {

    let clipVue = new Vue( {
        el: '#clips-list',
        data: {
            clips: [],
        },
        mounted: function() {
            this.readMore();
        },
        methods: {
            readMore: function() {
                var self = this;
                axios.get("{{route('api.user.clips')}}").then( function( res ) {
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
    /******UPDATED 15/05/2018****/
        $('.slider-readlater').slick({
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
        });
});
                
</script>

@endsection
