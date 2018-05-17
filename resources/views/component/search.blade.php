<form class="form-horizontal" method="GET" action="">
    <div class="uk-grid-small" uk-grid>
        <div class="uk-width-medium@m">
            <label class="uk-form-label" for="category_id">
                カテゴリ選択
            </label>
            <div class="uk-form-controls">
                @include('component.input.categories', [ 'value' => isset($params['category_id']) ? $params['category_id']: null , "required" => false])
            </div>
        </div>
        <div class="uk-width-expand">
            <label class="uk-form-label" for="category_id">
                タイトル・キーワードなど
            </label>
            <div class="uk-form-controls">
                <div class="uk-grid-collapse" uk-grid>
                    <div class="uk-width-expand">
                        <input type="text" name="freeword" class="uk-input" value="{{isset($params['freeword']) ? $params['freeword']: null }}">
                    </div>
                    <div class="uk-width-auto">
                        <button class="uk-button uk-button-primary">
                            検索
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="uk-width-1-1">
            <label class="uk-form-label" for="tags">
                並び順
            </label>
            <div class="uk-form-controls">
                <label class="uk-margin-small-right">
                    <input class="uk-radio" type="radio" name="order" value="latest" {{isset($params["order"]) && $params["order"] == "latest" ? "checked" : null }}>
                    新着順
                </label>
                <label class="uk-margin-small-right">
                    <input class="uk-radio" type="radio" name="order" value="stocks" {{isset($params["order"]) && $params["order"] == "stocks" ? "checked" : null }}> 
                    STOCK数順
                </label>
            </div>
        </div>
        <div class="uk-width-1-1">
            <ul uk-accordion>
                <li>
                    <h3 class="uk-accordion-title">
                        詳細検索
                    </h3>
                    <div class="uk-accordion-content">
                        <div class="uk-margin-small">
                            <label class="uk-form-label" for="tags">
                                タグ
                            </label>
                            @verbatim
                            <div class="uk-form-controls uk-text-nowrap" id="tags">
                                <span v-for="tag in tags">
                                    <label class="uk-margin-small-right">
                                        <input class="uk-checkbox" type="checkbox" name="tag_id[]" v-bind:value="tag.id">
                                        {{tag.label}}
                                    </label>
                                    <wbr>
                                </span>
                                <button type="button" class="uk-margin-small-right uk-button uk-button-small uk-button-default" v-if="canMore" v-on:click="readMore()">
                                    もっと見る
                                </button>
                            </div>
                            @endverbatim
                        </div>
                        <div class="uk-margin-small uk-text-center">
                            <button class="uk-width-large@s uk-button uk-button-primary">
                                検索
                            </button>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</form>


<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
    let vm = new Vue( {
        el: '#tags',
        data: {
            page: 0,
            canMore: true,
            tags: [],
        },
        methods: {
            readMore: function() {
                this.page += 1;
                axios.get("{{route('api.tags')}}?page=" + this.page).then( ( res ) => {
                    this.tags = this.tags.concat(res.data.data);
                    if(this.page >= res.data.last_page){
                        this.canMore=false;
                    }
                }).catch( ( res ) => {
                    console.error( res );
                });
            }
        },
        mounted: function() {
            this.readMore();
        }
    });

});
</script>
