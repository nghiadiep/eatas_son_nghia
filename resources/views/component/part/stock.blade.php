<article class="uk-card uk-card-default uk-card-small uk-grid-collapse uk-grid-match" uk-grid>
    <div class="uk-card-media-left uk-cover-container">
        <a class="uk-link-reset" href="{{route('articles.view', ['article' => $stock->article])}}" target="_blank">
            <div class="uk-width-small uk-height-1-1 image-wrapper">
                <img src="@include('component.part.image', ['image'=> $stock->article->articleImage])" alt="" uk-cover>
            </div>
        </a>
        <div class="uk-position-bottom-left">
            <a class="uk-button uk-button-small uk-button-danger" href="{{route('user.stocks.delete', ['stock' => $stock])}}" uk-icon="icon: trash">
            </a>
        </div>
    </div>
    <div class="uk-width-expand">
        <div class="uk-card-body">
            <a class="uk-link-reset" href="{{route('articles.view', ['article' => $stock->article])}}" target="_blank">
                <h3 class="uk-margin-remove">
                    {{$stock->article->title}}
                </h3>
                <div class="uk-grid-collapse" uk-grid>
                    <div class="uk-width-expand">
                        {{$stock->article->category->label}}
                    </div>
                    <div class="uk-width-auto">
                        <time datetime="{{$stock->article->publish_date}}">
                            @date($stock->article->publish_date)
                        </time>
                    </div>
                </div>
                <p>
                    @lined($stock->memo)
                </p>
            </a>
            <div class="uk-margin-small uk-text-right">
                <a class="uk-button uk-button-default uk-button-small" href="#stock-modal_{{$stock->id}}" uk-toggle>
                    メモを編集
                </a>
            </div>
        </div>
    </div>
</article>

<div id="stock-modal_{{$stock->id}}" uk-modal>
    <div class="uk-modal-dialog">
        <form class="form-horizontal" method="POST" action="{{ route('user.stocks.add') }}">
            {{ csrf_field() }}
            <input type="hidden" name="article_id" value="{{$stock->article->id}}">
            <button class="uk-modal-close-default" type="button" uk-close></button>
            <div class="uk-modal-body">
                <label class="uk-form-label" for="memo">
                    メモ
                </label>
                <div class="uk-form-controls">
                    <textarea class="uk-textarea uk-height-small" name="memo">{{!is_null($stock)?$stock->memo:null}}</textarea>
                </div>
            </div>
            <div class="uk-modal-footer">
                <div uk-grid class="uk-grid-small uk-flex-between">
                    <div class="uk-width-auto">
                        <a class="uk-button uk-button-danger" href="{{route('user.stocks.delete', ['stock' => $stock])}}">削除</a>
                    </div>
                    <div class="uk-width-expand uk-text-right">
                        <button class="uk-button uk-button-default uk-modal-close" type="button">キャンセル</button>
                        <button class="uk-button uk-button-primary" type="submit">保存</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>