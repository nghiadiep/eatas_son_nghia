<template>
    <a v-bind:href="getArticleUrl(clip.article)">
        <div class="slider-readlater__window">
            <img v-bind:src="getArticleImageUrl(clip.article.article_image)" v-bind:alt="clip.article.category.label" style="max-width:100%;">
        </div>
        <div class="slider-readlater__des">
            <p class="slider-readlater__cat"><span v-text="clip.article.category.label"></span></p>
            <h3 class="slider-readlater__title">
                <a v-bind:href="getArticleUrl(clip.article)" v-text="clip.article.title"></a>
            </h3>
        </div>
    </a>
</template>

<script>
export default {
  props: ['clip', 'authed', 'onDelete'],
  methods: {
    deleteThisClip: function() {
      this.my_clip = this.clip;
      this.deleteClip();
      this.$emit('delete-event', this.clip);
    },
  },
};
</script>