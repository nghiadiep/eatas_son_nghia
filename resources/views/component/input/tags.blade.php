@inject('tagService', 'App\Services\TagService')

<div class="uk-margin-small">
    <input name="tags" class="uk-input tag-input" value="@php
    echo isset($tags) ? $tags->implode('label', ','): null;
@endphp" />
</div>

@verbatim
<div class="uk-margin-small" id="tags">
    <a v-for="tag in tags" class="add-tag uk-margin-small-right" v-bind:data-label="tag.label" v-text="'+'+tag.label" v-on:click="selectTag(tag.label)">
    </a>
    <button type="button" class="uk-margin-small-right uk-button uk-button-small uk-button-default" v-if="canMore" v-on:click="readMore()">もっと見る</button>
</div>
@endverbatim

<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
    $(".tag-input").tagsInput({
        autocomplete_url: "{{route('api.tags.search')}}",
        autocomplete: {"test": "test"},
        height:'64px',
        width: 'calc(100% - 42px)',
        defaultText: "タグを追加"
    });

    $(".add-tag").click(function(event) {
        if(!$(".tag-input").tagExist($(this).data("label"))){
            $(".tag-input").addTag($(this).data("label"));    
        }
    });

    let vm = new Vue( {
        el: '#tags',
        data: {
            page: 0,
            canMore: true,
            tags: [],
            size: 12,
        },
        methods: {
            readMore: function() {
                this.page += 1;
                axios.get("{{route('api.tags')}}?size="+this.size+"&page=" + this.page).then( ( res ) => {
                    this.tags = this.tags.concat(res.data);
                    if(res.data == null || res.data.length < this.size ){
                        this.canMore=false;
                    }
                }).catch( ( res ) => {
                    this.canMore=false;
                });
            },
            selectTag: function(label) {
                if(!$(".tag-input").tagExist(label)){
                    $(".tag-input").addTag(label);    
                }
            }
        },
        mounted: function() {
            this.readMore();
        }
    });

});
</script>