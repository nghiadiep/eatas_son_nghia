<h2>
    おすすめ記事
</h2>
<div uk-grid class="uk-grid-small" id="relatedBase">
    <div class="uk-width-1-1" v-for="article in articles">
        <article-card :article="article" :authed="true"></article-card>
    </div>
</div>
<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
    let vm = new Vue( {
        el: '#relatedBase',
        data: {
            page: 0,
            canMore: true,
            articles: [],
            param: {!! json_encode($param) !!},
            url: "{{route('api.articles.recommend')}}?"
        },
        mounted : function(){
            if(this.param.article_id != null){
                this.url += "article_id=" + this.param.article_id + "&";
            }
            if(this.param.category_id != null){
                this.url += "category_id=" + this.param.category_id + "&";
            }
            this.readMore();
        },
        methods: {
            readMore: function() {
                this.page += 1;
                axios.get(this.url).then( ( res ) => {
                    this.articles = this.articles.concat(res.data.data);
                    if(this.page >= res.data.last_page){
                        this.canMore=false;
                    }
                }).catch( ( res ) => {
                      console.error( res );
                });
            }
        },
    });
});
</script>