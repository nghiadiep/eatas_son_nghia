@extends('layouts.user.default')

@section('content')

@include("component.part.slideshow", ["url" => route('api.articles.tops')])
<div class="container clearfix">
    <div class="content-center">
        <section class="block-eatas-wa pc">
            <h3 class="section-title"><span>EATASとは</span></h3>
            <p class="block-eatas-wa__des">飲食店に関わる皆さまへ必要なあらゆる情報を簡単に楽しく収集できるサイトです！</p>
            <div class="block-eatas-wa__step">
                <img src="{{asset('images/step_pc.jpg')}}" alt="気になる記事をチェック 本棚へ追加 詳しく読む 資料請求">
            </div>
            <div class="block-eatas-wa__link">
                <a href="#"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> もっと詳しくみる</a>
            </div>
        </section>
        <div class="block-bg-gray sp">
            <div class="block-usage">
                <a href="#">
                    <span class="block-usage__title">EATASとは</span>
                    <span class="block-usage__txt">飲食店に関わる皆さまへ必要なあらゆる<br>情報を簡単に楽しく収集できるサイトです！</span>
                </a>
            </div>
            <div class="block-register">
                <h3 class="block-register__title"><span>新規会員登録（無料）</span></h3>
                <div class="block-register__body">
                    <ul>
                        <li><a href="">会員登録するとできること</a></li>
                        <li><a href="">設定方法／よくある質問</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- <section class="block-home-list" id="clips-list">
            <div class="block-home-blog-list__inner clearfix">
                <div class="block-clipnone no-auth">
                    <div class="clipnone-table">
                        <div class="clipnone-table__cell">
                            <div class="clipnone-content">
                                <div class="clipnone-content__inner">
                                    <div class="clipnone-content__bottom"><a href="{{route('root.about')}}" class="btn btn--block btn--default">EATASの使い方を見る</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
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
    @include("layouts.user.sidebar")
</div>
<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
    new Vue( {
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
            }
        },
    });
});
</script>

@endsection
