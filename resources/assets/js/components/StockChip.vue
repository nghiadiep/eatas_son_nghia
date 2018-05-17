<template>
    <div class="item-list__box">
        <div class="item-list__thumb">
            <div class="item-list__photo">
                <a v-bind:href="getArticleUrl(stock.article)">
                    <img v-bind:src="getArticleImageUrl(stock.article.article_image)" v-bind:alt="stock.article.category.label">
                </a>
            </div>
            <div class="block-option">
                <ul>
                    <li>
                        <a v-on:click="deleteThisStock">
                            <img v-bind:src="getSystemImage('icon-trash.png')" alt="">
                        </a>
                    </li>
                    <li class="block-option__share">
                        <a v-on:click="toggleShare">
                            <img v-bind:src="getSystemImage('icon-share.png')" alt="">
                        </a>
                        <div v-bind:class="shareClass">
                            <ul class="block-option__share__social__list">
                                <li>
                                    <a v-on:click="shareLine">
                                        <img v-bind:src="getSystemImage('ico_social/icon-line.png')" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a v-on:click="shareTwitter">
                                        <img v-bind:src="getSystemImage('ico_social/icon-twitter.png')" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a v-on:click="shareFB">
                                        <img v-bind:src="getSystemImage('ico_social/icon-facebook.png')" alt="">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <!--/.block-option-->
        </div>
        <!--/.thumb-->
        <div class="item-list__des">
            <h3 class="item-list__des__title">
                <a v-bind:href="getArticleUrl(stock.article)" v-text="stock.article.title"></a>
            </h3>
            <div class="item-list__des__cat" v-text="stock.article.category.label"></div>
            <div class="item-list__des__gray-box">
                <textarea placeholder="メモが入力できます" v-model="memo" v-on:blur="editStock"></textarea>
            </div>
            <!--/.item-list__des__gray-box-->
        </div>
        <!--/.item-list__box__des-->
        <div class="item-list__arrow">
            <a v-bind:href="getArticleUrl(stock.article)">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
            </a>
        </div>
        <!--/.item-list__box__arrow-->
    </div>


</template>

<script>
    export default {
        data: function() {
            return {
                memo: null,
                shareClass: "block-option__share__social"
            };
        },
        mounted: function(){
            this.memo = this.stock.memo;
            this.authed = true;
        },
        props:[
            "stock",
            "onDelete",
        ],
        methods : {
            toggleShare: function(){
                if(this.shareClass == "block-option__share__social"){
                    this.shareClass = "block-option__share__social active";    
                }else{
                    this.shareClass = "block-option__share__social"
                }
            },
            editStock: function(){
                if(this.memo != null && this.memo.length > 0){
                    var url = this.editStockUrl(this.stock);
                    axios.post(url, {
                        memo: this.memo
                    }).then();    
                }
            },
            deleteThisStock: function(){
                this.my_stock = this.stock;
                this.deleteStock();
                this.$emit('delete-event', this.stock);
            },
            shareFB: function(){
                let shareUrl = this.getArticleUrl(this.stock.article);
                window.shereToFacebock(shareUrl);
            },
            shareLine: function(){
                let shareUrl = this.getArticleUrl(this.stock.article);
                window.shareToLine(shareUrl, this.stock.article.title);
            },
            shareTwitter: function(){
                let shareUrl = this.getArticleUrl(this.stock.article);
                window.shareToTwitter(shareUrl, this.stock.article.title);
            },
        }
    }
</script>