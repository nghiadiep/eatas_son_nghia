<template>
    <div class="item-list__box">
        <div class="item-list__thumb">
            <div class="item-list__photo">
                <a v-bind:href="getArticleUrl(article)">
                    <img v-bind:src="getArticleImageUrl(article.article_image)" v-bind:alt="article.category.label">
                </a>
            </div>
            <div class="block-option btn-action">
                <ul>
                    <li>
                        <a v-if="my_stock==null" class="btn-bookshelf" v-on:click="addStock">
                        </a>
                        <a v-else v-on:click="deleteStock" class="btn-bookshelf active">
                        </a>
                    </li>
                    <li>
                        <a v-if="my_clip==null" class="btn-read-later" v-on:click="addClip">
                        </a>
                        <a v-else v-on:click="deleteClip" class="btn-read-later active">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!--/.thumb-->
        <a class="item-list__des" v-bind:href="getArticleUrl(article)">
            <h3 class="item-list__des__title">
                <span v-text="article.title"></span>
            </h3>
            <div class="item-list__des__list">
                <span v-text="publishDate()"></span>
                <span v-text="article.category.label"></span>
            </div>
        </a>
        <!--/.item-list__box__des-->
        <div class="item-list__arrow">
            <a v-bind:href="getArticleUrl(article)">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
            </a>
        </div>
        <!--/.item-list__box__arrow-->
    </div>
</template>

<script>
    export default {
        props:[
            "article",
            "authed",
        ],
        data: function() {
            return {
                my_clip: null,
                my_stock: null,
            };
        },
        mounted: function () {
            if(this.authed){
                this.my_clip = this.article.my_clip;
                this.my_stock = this.article.my_stock;    
            }
        },
        methods : {
            publishDate: function () {
                if(this.authed == true){
                    if(this.article.member_publish_date != null){
                        return this.toDateString(this.article.member_publish_date);
                    }
                }
                if( this.article.publish_date != null ){
                    return this.toDateString(this.article.publish_date);
                }
                return null;
            },
        }
    }
</script>