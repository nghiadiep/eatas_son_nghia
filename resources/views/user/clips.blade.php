@extends('layouts.user.default')

@section('content')

<h2 class="page-title">あとで読む</h2>
<div class="item-list item-list--readafer block-home-list" id="clips-list">
    <ul>
        <li v-for="clip in clips">
            <clip-chip v-bind:clip="clip" :authed="true" @delete-event="onDelete" />
        </li>
    </ul>
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
