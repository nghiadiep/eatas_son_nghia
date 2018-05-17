@if(count($articles) > 0 )

<div class="uk-margin uk-overflow-auto">
    <table class="uk-table uk-table-small uk-table-divider uk-table-striped">
        <thead>
            <tr>
                <th class="uk-width-auto">
                </th>
                @if(!isset($by_status))
                <th>
                    @include("component.part.sorter", ["order" => "article_status_id", "label" => "status", "params" => $params])
                </th>
                @endif
                <th class="uk-width-auto">
                    @include("component.part.sorter", ["order" => "publish_date", "label" => "公開日", "params" => $params])
                </th>
                <th class="uk-width-auto">
                    @include("component.part.sorter", ["order" => "close_date", "label" => "終了日", "params" => $params])
                </th>
                <th class="uk-width-auto">
                    @include("component.part.sorter", ["order" => "category_id", "label" => "カテゴリ", "params" => $params])
                </th>
                <th class="uk-width-auto">
                    @include("component.part.sorter", ["order" => "title", "label" => "タイトル", "params" => $params])
                </th>
                <th class="uk-width-auto">
                    商材
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
            @php
            if($mode == null || $mode == "administrator"){
                $viewUrl = route('administrator.articles.view', ['article' => $article]);
                $editUrl = route('administrator.articles.edit', ['article' => $article]);
                $deleteUrl = route('administrator.articles.delete', ['article' => $article]);
            }else{
                $viewUrl = route('writer.articles.view', ['article' => $article]);
                $editUrl = route('writer.articles.edit', ['article' => $article]);
                $deleteUrl = route('writer.articles.delete', ['article' => $article]);
            }
            @endphp
            <tr>
                <td>
                    <div class="uk-margin-small uk-text-nowrap">
                        @if(isset($article->articleImage) && $article->articleImage->url != null )
                        <span class="uk-margin-small-right" uk-lightbox uk-tooltip="title: サムネイルを表示; pos: right">
                            <a class="uk-icon-button uk-button-default" uk-icon="icon: image" href="@include('component.part.image', ['image' => $article->articleImage])"></a>
                        </span>
                        @endif
                        @can("view", $article)
                        <span uk-tooltip="title: 記事を見る; pos: right">
                            <a class="uk-icon-button uk-button-default" uk-icon="icon: search" href="{{$viewUrl}}">
                            </a>
                        </span>
                        @endcan
                    </div>
                    <div class="uk-margin-small uk-text-nowrap">
                        @can("update", $article)
                        <span class="uk-margin-small-right" uk-tooltip="title: 記事の更新; pos: right">
                            <a class="uk-icon-button uk-button-primary" uk-icon="icon: file-edit" href="{{$editUrl}}">
                            </a>
                        </span>
                        @endcan
                        @can("delete", $article)
                        <span uk-tooltip="title: 記事の削除; pos: right">
                            <form class="uk-display-inline-block" method="POST" action="{{ $deleteUrl}}" onSubmit="confirmDelete(event)">
                                {{ csrf_field() }}
                                <button class="uk-icon-button uk-button-danger" uk-icon="icon: trash">
                                </button>
                            </form>
                        </span>
                        @endcan
                    </div>
                    @if($mode == null || $mode == "administrator")
                    <div class="uk-margin-small" uk-tooltip="title: 商材を関連づける; pos: right">
                        <a class="uk-icon-button uk-button-primary" uk-icon="icon: cart" href="{{route('administrator.articles.products', ['article' => $article])}}">
                        </a>
                    </div>
                    @endif
                </td>
                @if(!isset($by_status))
                <td>
                    @if($article->articleStatus != null)
                    <div class="uk-text-nowrap">
                        {{ $article->articleStatus->label }}
                    </div>
                    @endif
                </td>
                @endif
                <td>
                    @if( $article->publish_date != null )
                    <div class="uk-text-nowrap">
                        @date($article->publish_date)
                    </div>
                    @endif
                    @if( $article->member_publish_date != null )
                    <div class="uk-text-nowrap">
                        <small>
                            会員: @date($article->member_publish_date)
                        </small>
                    </div>
                    @endif
                </td>
                <td>
                    @if( $article->close_date != null )
                    <div class="uk-text-nowrap">
                        @date($article->close_date)
                    </div>
                    @endif
                    @if( $article->member_close_date != null )
                    <div class="uk-text-nowrap">
                        <small>
                            会員: @date($article->member_close_date)
                        </small>
                    </div>
                    @endif
                </td>
                <td>
                    <div class="uk-text-nowrap">
                        {{$article->category->label}}
                    </div>
                </td>
                <td>
                    <div class="uk-width-medium">
                        {{$article->title}}
                    </div>
                </td>
                <td>
                    @foreach($article->products as $product)
                    <div class="uk-text-nowrap">
                        {{$product->name}}
                    </div>
                    @endforeach
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
<p>
    該当する記事はありません
</p>
@endif

<div class="uk-margin">
    {{ $articles->appends(isset($params)? $params: [])->links() }}
</div>
