@extends('layouts.user.default')

@section('content')

<h2 class="page-title">あとで読む</h2>
<div class="content-center">
<div class="item-list item-list--readafer block-home-list" id="clips-list">
    <!-- <ul>
        <li v-for="clip in clips">
            <clip-chip v-bind:clip="clip" :authed="true" @delete-event="onDelete" />
        </li>
    </ul> -->
    <ul><li><div class="item-list__box"><div class="item-list__thumb"><div class="item-list__photo"><a href="https://eatas.jp/article/274"><img src="https://eatas.jp/storage/image/Ijk6Sa90E5BbZCC3T2ZAZpy4zFRtF9XTHP3ydotu.jpg" alt="メニュー"></a></div> <h3>メニュー</h3></div> <div class="item-list__des"><h3 class="item-list__des__title"><a href="https://eatas.jp/article/274">全国の“飲食店の冷蔵庫”をめざす業務用食材ECサイト</a></h3> <div class="block-option"><a><img src="https://eatas.jp/images/icon-trash.png" alt=""></a></div></div> <div class="item-list__arrow"><a href="https://eatas.jp/article/274"><i aria-hidden="true" class="fa fa-angle-right"></i></a></div></div></li><li><div class="item-list__box"><div class="item-list__thumb"><div class="item-list__photo"><a href="https://eatas.jp/article/279"><img src="https://eatas.jp/storage/image/KMB94b6hakYzFuZkdEOeDs3zItvP8xHvIEdntsqM.jpg" alt="メニュー"></a></div> <h3>メニュー</h3></div> <div class="item-list__des"><h3 class="item-list__des__title"><a href="https://eatas.jp/article/279">産地を持ち歩く！飲食店向け鮮魚注文サービス『魚ポチ』に注目</a></h3> <div class="block-option"><a><img src="https://eatas.jp/images/icon-trash.png" alt=""></a></div></div> <div class="item-list__arrow"><a href="https://eatas.jp/article/279"><i aria-hidden="true" class="fa fa-angle-right"></i></a></div></div></li></ul>
    <!--/.item-list-->
    <div class="block-botttom mt12" v-if="canMore && page <= 1">
        <a v-on:click="readMore" class="btn btn--block btn--default">あとで読むをもっと見る</a>
    </div>
    <div v-if="canMore && page > 1">
        <a v-inview:enter="readMore"></a>
    </div>

    <div v-if="clips.length == 0 && !canMore" class="no-data">
        <h2 class="no-data-message" v-text="'あとで読む記事はありません'">
        </h2>
    </div>
    <!--/.block-botttom-->
</div>
</div>
<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {

    new Vue( {
        el: '#clips-list',
        data: {
            page: 0,
            canMore: true,
            clips: [],
        },
        mounted: function() {
            this.readMore();
        },
        methods: {
            readMore: function() {
                this.page += 1;
                var self = this;
                axios.get("{{route('api.user.clips')}}?pagesize=10&page="+this.page).then( function( res ) {
                    self.clips = self.clips.concat(res.data.data);
                    if(self.page >= res.data.last_page){
                        self.canMore=false;
                    }
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
});
</script>

@endsection
