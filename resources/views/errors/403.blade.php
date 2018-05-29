@extends('layouts.user.default')

@section('content')
<div class="content-center error-page">
<div class="block-error-page block-error-page--403">
    <div class="block-error-page__des">
        <img src="{{asset('images/error_page/403_sp.png')}}"  alt="403 ERROR">
    </div>
    <!--/.block-error-page__sec1-->
    <div class="block-error-page__note">
        <p>このページへのアクセスはできません。</p>
    </div>
</div>

<div class="block-home-blog">
    <h2 class="sub-title">
        <span>こちらの記事もオススメ</span>
    </h2>

    <div id="article-list">
        <div v-for="article in articles">
            <article-cell v-bind:article="article" v-bind:authed="authed"/>    
        </div>
    </div>

    <div class="block-home-blog__read-more">
        <a class="btn btn--block btn--default" href="{{route('root.index')}}">オススメ記事をもっと見る</a>
    </div>
    <!--/.block-home-blog__read-more-->
</div>
</div>
<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
    let vm = new Vue( {
        el: '#article-list',
        data: {
            canMore: true,
            articles: [],
            authed: @auth('user') true @else false @endauth
        },
        methods: {
            readMore: function() {
                var self = this;
                axios.get("{{route('api.articles.tops')}}").then( function( res ) {
                    self.articles = self.articles.concat(res.data);
                }).catch( function( res ) {
                    console.error( res );
                });
            }
        },
        mounted: function() {
            this.readMore();
        }
    });

});
</script>

@endsection
