<template>
    <div class="uk-grid-small" uk-grid>
        <div class="uk-width-1-4">
            <a class="uk-width-1-1 uk-button uk-button-primary twitter" v-on:click="shareToTW()">
                <span uk-icon="icon: twitter; ratio: 1;"></span>
            </a>
        </div>
        <div class="uk-width-1-4">
            <a class="uk-width-1-1 uk-button uk-button-primary facebook" v-on:click="shareToFB()">
                <span uk-icon="icon: facebook; ratio: 1;"></span>
            </a>
        </div>
        <div class="uk-width-1-4">
            <a class="uk-width-1-1 uk-button uk-button-primary google-plus" v-on:click="shareToGP()">
                <span uk-icon="icon: google-plus; ratio: 1;"></span>
            </a>
        </div>
        <div class="uk-width-1-4">
            <a class="uk-width-1-1 uk-button uk-button-primary hatebu" v-on:click="shareToHB()">
                B!
            </a>
        </div>
    </div>
</template>

<script>
    export default {
        props:[
            "article"
        ],
        methods: {
            shareToFB: function(){
                let shareUrl = this.getArticleUrl(this.article);
                window.shereToFacebock(shareUrl);
            },
            shareToTW: function(){
                let shareUrl = this.getArticleUrl(this.article);
                window.shareToTwitter(shareUrl, this.article.title);
            },
            shareToGP: function(){
                let shareUrl = this.getArticleUrl(this.article);
                window.shareToGooglePlus(shareUrl);
            },
            shareToHB: function(){
                let shareUrl = this.getArticleUrl(this.article);
                window.shareToHatena(shareUrl);
            }
        }
    }
</script>
