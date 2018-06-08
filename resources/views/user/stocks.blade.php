@extends('layouts.user.default')

@section('content')

<h2 class="page-title">本棚</h2>
<div class="content-center">
<div class="item-list item-list--readafer bookshelf-page" id="stocks-list">
    <ul>
        <li v-for="stock in stocks">
            <stock-chip v-bind:stock="stock" @delete-event="onDelete" />
        </li>
    </ul>
    <!--/.item-list-->
    <div class="block-botttom mt12" v-if="canMore && page <= 1">
        <a v-on:click="readMore" class="btn btn--block btn--default">本棚の記事をもっと見る</a>
    </div>
    <div v-if="canMore && page > 1">
        <a v-inview:enter="readMore"></a>
    </div>
    <!--/.block-botttom-->

    <div v-if="stocks.length == 0 && !canMore" class="no-data">
        <h2 class="no-data-message" v-text="'本棚に記事が登録されていません'">
        </h2>
    </div>
</div>

</div>
<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {

    new Vue( {
        el: '#stocks-list',
        data: {
            page: 0,
            canMore: true,
            stocks: [],
        },
        mounted: function() {
            this.readMore();
        },
        methods: {
            readMore: function() {
                this.page += 1;
                var self = this;
                axios.get("{{route('api.user.stocks')}}?page="+this.page).then( function( res ) {
                    self.stocks = self.stocks.concat(res.data.data);
                    if(self.page >= res.data.last_page){
                        self.canMore=false;
                    }
                }).catch( function( res ) {
                    console.error( res );
                });
            },
            onDelete: function(stock){
                this.stocks = this.stocks.filter( function(item) {
                    return item.id != stock.id;
                });
            }
        },
    });
});
</script>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        $('.showItem').on('click', function() {
            $(this).parent().find('.block-option__share__social').toggleClass('active');
        })
    });
</script>
@endsection
