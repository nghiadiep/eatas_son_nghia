<template>
    <article class="block-home-blog__box">
        <a v-bind:href="this.getArticleUrl(article)">
            <figure class="block-home-blog__photo">
                <img v-bind:src="getArticleImageUrl(article.article_image)" v-bind:alt="article.category.label">
            </figure>
            <dl class="block-home-blog__date">
                <dt v-text="toPublishedDate()"></dt>
                <dd>
                    <span v-if="article.is_advertise==1">PR</span>
                    <span v-else v-text="article.category.label"></span>
                </dd>
            </dl>
            <div class="block-home-blog__des">
                <header class="block-home-blog__header">
                    <h2 v-text="article.title"></h2>
                </header>
                <template v-if="article.summary_mode===1">
                    <dl class="block-home-blog__list" v-for="( summary, index) in summaries">
                        <dt>
                            <span v-text="index+1"></span>
                        </dt>
                        <dd>
                            <span v-text="summary"></span>
                        </dd>
                    </dl>
                </template>
                <template v-if="article.summary_mode===0">
                    <div class="block-home-blog__txt">
                        <p v-text="article.summary"></p>
                    </div>
                </template>
            </div>
        </a>
        <footer class="block-home-blog__footer">
            <button v-if="my_stock==null" class="block-home-blog__footer__btn-bookshelf" v-on:click="addStock">
                本棚へ
            </button>

            <button v-if="my_stock!=null" class="block-home-blog__footer__btn-bookshelf block-home-blog__footer__btn-bookshelf--active no-boder" v-on:click="deleteStock">
                本棚へ
            </button>

            <button v-if="my_clip==null" class="block-home-blog__footer__btn-read-later" v-on:click="onAddClip">
                あとで読む
            </button>
            <button v-if="my_clip!=null" class="block-home-blog__footer__btn-read-later block-home-blog__footer__btn-read-later--active no-boder" v-on:click="onDeleteClip">
                あとで読む
            </button>
            <a class="block-home-blog__footer__center" v-bind:href="this.getArticleUrl(article)">
                <span v-if="article.article_product_relations != null && article.article_product_relations.length > 0" target="_blank" class="block-home-blog__footer__btn-detail block-home-blog__footer--btn-icon">
                    記事を読む
                </span>

                <span v-if="article.article_product_relations == null || article.article_product_relations.length == 0" target="_blank" class="block-home-blog__footer__btn-detail">
                    記事を読む
                </span>
            </a>
        </footer>
    </article>    
</template>

<script>
    export default {
        data: function() {
            return {
                my_clip: null,
                my_stock: null,
                summaries: this.article.summary != null && this.article.summary_mode==1 ? this.article.summary.split("\n"): [],
            };
        },
        mounted: function(){
            if(this.authed){
                this.my_clip = this.article.my_clip;
                this.my_stock = this.article.my_stock;    
            }
        },
        props:[
            "article",
            "authed",
        ],
        methods : {
            toPublishedDate: function() {
                if(this.authed  && this.article.member_publish_date != null){
                    return this.toDateString(this.article.member_publish_date);
                }else{
                    return this.toDateString(this.article.publish_date);
                }
            },
            onAddClip: function() {
                if(this.authed){
                    this.addClip().then( () => {
                        this.$emit('clip-event');
                    });
                }else{
                    this.addClip();
                }
            },
            onDeleteClip: function(){
                if(this.authed){
                    this.deleteClip().then( () => {
                        this.$emit('clip-event');
                    });    
                }else{
                    this.deleteClip();
                }
            }
        }
    }
</script>