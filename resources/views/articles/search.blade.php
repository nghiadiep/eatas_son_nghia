@inject("categoryService", App\Services\CategoryService)
@inject("tagService", App\Services\TagService)

@extends('layouts.user.default')

@section('content')

<h2 class="page-title">検索結果</h2>
<div class="content-center">
<div class="search-result-page" id="articles-list">
    <div class="block-search-form">
        <form action="{{route('articles.search')}}" method="GET">
            <div class="search-control pc clearfix">
                <div class="search-control__input"><input class="form-control" value="{{isset($params['freeword']) ? $params['freeword'] : null }}" name="freeword"></div>
                <div class="search-control__search-button"><button class="btn btn--block btn--yellow">検索する</button></div>
                <div class="search-control__search-advance"><button v-on:click="switchDetail" type="button" class="btn btn--block btn--gray">詳細検索</button></div>
            </div>
            <div class="form-group sp">
                <input class="form-control" value="{{isset($params['freeword']) ? $params['freeword'] : null }}" name="freeword">
            </div>
            <!--/.form-group-->
            <div class="block-search-form__btn-bottom sp">
                <button class="btn btn--block btn--yellow">検索する</button>
            </div>
            
            <div>
                <div class="block-search-form__btn-bottom sp">
                    <button v-on:click="switchDetail" type="button" class="btn btn--block btn--gray">詳細検索</button>
                </div>

                <section v-if="show">
                    <h2 class="modal-search__title">
                        <span>詳細検索</span>
                    </h2>
                    <div class="modal-search__form-group">
                        <h3 class="modal-search__sub-title">
                            <span>カテゴリ検索</span>
                        </h3>
                        <ul class="modal-search__input-list clearfix">
                            @foreach( $categoryService->getAll() as $category )
                            <li>
                                <label>
                                    <input type="checkbox" name="category_id[]" value="{{$category->id}}" v-bind:checked="isCategorySelected({{$category->id}})">
                                    <span>
                                        {{$category->label}}
                                    </span>
                                </label>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="modal-search__form-group">
                        <h3 class="modal-search__sub-title">
                            <span>タグ検索</span>
                        </h3>
                        <ul class="modal-search__input-list clearfix">
                            @foreach($tagService->getFamous(9) as $tag)
                            <li>
                                <label>
                                    <input type="checkbox" name="tag_id[]" value="{{$tag->id}}" v-bind:checked="isTagSelected({{$tag->id}})">
                                    <span>
                                        {{$tag->label}}
                                    </span>
                                </label>
                            </li>
                            @endforeach
                        </ul>
                        <button type="submit" class="modal-search__btn-search">検索する</button>
                    </div>
                </section>
            </div>

            @if( isset($categories) && $categories->count() > 0 )
            <p class="block-search-form__tt">
                カテゴリ:
                @foreach($categories as $category)
                    <strong>{{ $category->label }}</strong>
                @endforeach
            </p>
            @endif
            @if( isset($tags) && $tags->count() > 0 )
            <p class="block-search-form__tt">
                タグ:
                @foreach($tags as $tag)
                    <strong>{{ $tag->label }}</strong>
                @endforeach
            </p>
            @endif
            <p class="block-search-form__tt">
                 @if(isset($params['freeword']) && strlen($params['freeword']) > 2)
                <strong>{{$params['freeword']}}</strong>
                @else
                <strong>すべて</strong>
                @endif
                の検索結果（<span v-text="total"></span>件）
            </p>
            
            <div class="form-group">
                <ul class="group-radio-list">
                    <li>
                        <label>
                            <input type="radio" name="order" value="latest" 
                            {{ !isset($params['order']) || $params['order'] == "latest" ? "checked" : null }} v-on:click="switchOrder('latest')">
                            <span>新着順</span>
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" name="order" value="stock"
                            {{ !isset($params['order']) || $params['order'] == "stock" ? "checked" : null }} v-on:click="switchOrder('stock')">
                            <span>本棚数が多い順</span>
                        </label>
                    </li>
                </ul>
            </div>
        </form>
    </div>

    <div class="item-list">
        <ul>
            <li v-for="article in articles">
                <article-chip :article="article" :authed="authed" />
                <!--/.item-list__box-->
            </li>
        </ul>
        <!--/.item-list-->
        <div class="block-botttom" v-if="canMore && page <= 1">
            <a v-on:click="readMore" class="btn btn--block btn--default">検索結果をもっと読む</a>
        </div>

        <div class="block-botttom" v-if="canMore && page > 1">
            <a v-inview:enter="readMore"></a>
        </div>
        <!--/.block-botttom-->
    </div>
</div>
</div>
<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
    let vm = new Vue( {
        el: '#articles-list',
        data: {
            page: 0,
            total: 0,
            canMore: true,
            articles: [],
            freeword: '{{ isset($params["freeword"]) ? $params["freeword"] : null }}',
            order: '{{ isset($params["order"]) ? $params["order"] : "latest" }}',
            authed: @auth('user') true @else false @endauth,
            show: false,
            params: {!! json_encode($params) !!},
        },
        mounted: function() {
            this.readMore();
        },
        methods: {
            isCategorySelected: function(categoryId){
                if(this.params.category_id == null){
                    return false;
                }
                return this.params.category_id.find( function(id) {
                    return id == categoryId;
                });
            },
            isTagSelected: function(tagId){
                if(this.params.tag_id == null){
                    return false;
                }
                return this.params.tag_id.find( function(id) {
                    return id == tagId;
                });
            },
            switchDetail: function(){
                this.show = !this.show;
            },
            readMore: function() {
                this.page += 1;
                var url = "{{route('api.articles.search')}}?";
                var params = window.objectAssign({}, this.params);
                params.order = this.order;
                params.page = this.page;
                url += QueryString.stringify(params);

                var self = this;
                axios.get(url).then( function( res ) {
                    self.articles = self.articles.concat(res.data.data);
                    self.total=res.data.total;
                    if(self.page >= res.data.last_page){
                        self.canMore=false;
                    }
                }).catch( function( res ) {
                    console.error( res );
                });
            },
            switchOrder: function(order) {
                this.page = 0;
                this.order = order;
                this.canMore = true;
                this.articles = [];
                this.readMore();
            }
        },
    });

});
</script>

@endsection
