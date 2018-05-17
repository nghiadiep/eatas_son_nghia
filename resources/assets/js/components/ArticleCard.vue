<template>
    <article class="uk-card uk-card-default uk-card-small">
        <a class="uk-link-reset" v-bind:href="getArticleUrl(article['category'], article)" target="_blank">
            <div class="uk-grid-collapse" uk-grid>
                <div class="uk-card-media-top image-wrapper uk-position-relative uk-width-1-1@s uk-height-small@s uk-width-small">
                    <template v-if="article.article_image != null">
                        <img v-bind:src="getImageUrl(article['article_image']['url'])" alt="">
                    </template>
                    <template v-if="article.article_image == null">
                        <img v-bind:src="getNoImageUrl()" alt="">
                    </template>
                    <div class="uk-position-top-left" v-if="authed">
                        <span class="uk-label uk-margin-small-right" v-if="isNew(article['member_publish_date'])">
                            NEW
                        </span>
                        <span class="uk-label uk-label-danger uk-margin-small-right" v-if="isMemberOnly(article['article_status_id'])">
                            会員限定
                        </span>
                    </div>
                    <div class="uk-position-top-left" v-if="authed">
                        <span class="uk-label uk-margin-small-right" v-if="isNew(article['publish_date'])">
                            NEW
                        </span>
                    </div>
                </div>
                <div class="uk-card-body uk-width-expand">
                    <div class="uk-margin-remove">
                        <small>{{article["category"]["label"]}}</small>
                    </div>
                    <h3 class="uk-margin-remove uk-card-title text-overflow line-3">
                        {{article["title"]}}
                    </h3>
                    <div class="uk-margin-remove uk-text-right">
                        <time v-bind:datetime="article['member_publish_date']" v-if="isMemberOnly(article['article_status_id'])">
                            <small  v-if="article['member_publish_date'] != null">
                                {{ article['member_publish_date'].split(" ")[0] }}
                            </small>
                        </time>
                        <time v-bind:datetime="article['publish_date']" v-if="!isMemberOnly(article['article_status_id'])">
                            <small  v-if="article['publish_date'] != null">
                                {{article['publish_date'].split(" ")[0]}}
                            </small>
                        </time>
                    </div>
                </div>
            </div>
        </a>
    </article>
</template>

<script>
    export default {
        props:[
            "article",
            "authed"
        ],
    }
</script>


