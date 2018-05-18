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
            <div class="block-home-blog__read-more" v-if="canMore && page <= 1">
                <a v-on:click="readMore" class="btn btn--block btn--default">新着記事をもっと読む</a>
            </div>
            <div class="block-home-blog__read-more" v-if="canMore && page > 1">
                <a v-inview:enter="readMore"></a>
            </div>
            <!--/.block-home-blog__read-more-->
        </div>
    </div>
</div>
<!-- <section class="block-home-list top-page" id="clips-list">
    <div v-if="clips.length > 0">
        <h2 class="block-home-list__title">あとで読む</h2>
        <ul>
            <li v-for="clip in clips">
                <clip-chip v-bind:clip="clip" v-bind:authed="true" @delete-event="onDelete" />
            </li>
        </ul>
        <a href="{{route('user.clips')}}" class="btn btn--block btn--default">あとで読む一覧を見る</a>
    </div>
    <div class="block-clipnone" v-else>
        <div class="clipnone-table">
            <div class="clipnone-table__cell">
                <div class="clipnone-content">
                    <div class="clipnone-content__inner">
                        <h2 class="clipnone-content__title">「あとで読む」が<br>登録されていません</h2>
                        <p>「あとで読む」を押してみてください。<br>EATASには便利な機能がたくさんあります。</p>
                        <div class="clipnone-content__bottom"><a href="{{route('root.about')}}" class="btn btn--block btn--default">EATASの使い方を見る</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="block-home-blog" id="articles-list">
    <div v-for="article in articles">
        <article-cell @clip-event="onReloadClip" v-bind:article="article" :authed="true" />
    </div>
    <div class="block-home-blog__read-more" v-if="canMore && page <= 1">
        <a v-on:click="readMore" class="btn btn--block btn--default">新着記事をもっと読む</a>
    </div>
    <div class="block-home-blog__read-more" v-if="canMore && page > 1">
        <a v-inview:enter="readMore"></a>
    </div>
    
</div> -->
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
