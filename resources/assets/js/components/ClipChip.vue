<template>
    <div class="item-list__box">
        <div class="item-list__thumb">
            <div class="item-list__photo">
                <a v-bind:href="getArticleUrl(clip.article)">
                    <img v-bind:src="getArticleImageUrl(clip.article.article_image)" v-bind:alt="clip.article.category.label">
                </a>
            </div>
            <h3 v-text="clip.article.category.label"></h3>
        </div>
        <!--/.thumb-->
        <div class="item-list__des">
            <h3 class="item-list__des__title">
                <a v-bind:href="getArticleUrl(clip.article)" v-text="clip.article.title"></a>
            </h3>
            <div class="block-option">
                <a v-on:click="deleteThisClip">
                    <img v-bind:src="getSystemImage('icon-trash.png')" alt="">
                </a>
            </div>
        </div>
        <!--/.block-home-list__des-->
        <div class="item-list__arrow">
            <a v-bind:href="getArticleUrl(clip.article)">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
            </a>
        </div>
        <!--/.block-home-list__arrow-->
    </div>
</template>

<script>
    export default {
        props:[
            "clip",
            "authed",
            "onDelete"
        ],
        methods: {
            deleteThisClip: function() {
                this.my_clip = this.clip;
                this.deleteClip();
                this.$emit('delete-event', this.clip);
            }
        }
    }
</script>