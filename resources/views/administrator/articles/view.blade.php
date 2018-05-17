@inject('articleStatus', 'App\Models\ArticleStatus')
@extends('layouts.administrator')

@section('content')

@if(!isset($mode) || $mode != "view_only" )
<div class="uk-section uk-section-default">
@else
<div class="uk-section uk-section-default" style="margin-top: -100px;">
@endif

    <div class="uk-container">
        <div uk-grid>
            <div class="uk-width-expand">

                @if(!isset($mode) || $mode != "view_only" )

                <ul class="uk-child-width-expand" uk-tab>
                    <li class="uk-active">
                        <a href="">
                            PC版で見る
                        </a>
                    </li>
                    <li>
                        <a href="">
                            スマホ版で見る
                        </a>
                    </li>
                </ul>
                <ul class="uk-switcher uk-margin">
                    <li>

                @endif

                        <iframe width="100%" height="600" src="{{route('administrator.articles.preview', ['article' => $article])}}"></iframe>

                @if(!isset($mode) || $mode != "view_only" )

                    </li>
                    <li>
                        @include("component.part.smartviewer", ["url" => route('administrator.articles.view', ['article' => $article]) ])
                    </li>
                </ul>

                @endif
            </div>
            <div class="uk-width-medium@m">

                @if(!isset($mode) || $mode != "view_only" )

                <div class="uk-card uk-card-default uk-card-small uk-card-body uk-margin">
                    <div class="uk-margin">
                        <dl class="uk-description-list">
                            <dt>現在のステータス</dt>
                            <dd>
                                {{$article->articleStatus->label}}
                            </dd>
                        </dl>
                    </div>
                    <div class="uk-margin">
                        <div class="uk-margin-small">
                            <form class="form-horizontal" method="POST" action="{{ route('administrator.articles.changeStatus', ['article'=>$article]) }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="article_status_id" value="{{$articleStatus::WAITING}}">
                                <button type="submit" class="uk-button uk-button-primary uk-width-1-1">
                                    一般向けに承認する
                                </button>
                            </form>
                        </div>
                        <div class="uk-margin-small">
                            <form class="form-horizontal" method="POST" action="{{ route('administrator.articles.changeStatus', ['article'=>$article]) }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="article_status_id" value="{{$articleStatus::WAITING_MEMBER_ONLY}}">
                                <button type="submit" class="uk-button uk-button-primary uk-width-1-1">
                                    会員向けに承認する
                                </button>
                            </form>
                        </div>
                        <div class="uk-margin-small">
                            <a class="uk-button uk-button-danger uk-width-1-1" href="#comment-modal" uk-toggle>
                                差し戻し
                            </a>
                        </div>
                    </div>
                    <hr/>
                    <div class="uk-margin">
                        <div class="uk-margin-small">
                            <a type="submit" class="uk-button uk-button-default uk-width-1-1" href="{{route('articles.view', [ 'article'=>$article])}}">
                                ユーザ向けページで見る
                            </a>
                        </div>
                        <div class="uk-margin-small">
                            <a type="submit" class="uk-button uk-button-default uk-width-1-1" href="{{route('administrator.articles.edit', [ 'article'=>$article])}}">
                                編集
                            </a>
                        </div>
                    </div>
                </div>
                <div class="uk-card uk-card-default uk-card-small uk-card-body uk-margin">
                    <div class="uk-margin">
                        <form class="form-horizontal" method="POST" action="{{ route('administrator.articles.edit', ['article'=>$article]) }}">
                            {{ csrf_field() }}
                            <div class="uk-margin-small">
                                @component("component.editor.article", ["article"=>$article, "form" => "status_only"])
                                @endcomponent
                            </div>
                            <div class="uk-margin-small">
                                <button type="submit" class="uk-button uk-button-default uk-width-1-1">
                                    ステータスの更新
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@if(!isset($mode) || $mode != "view_only" )
<div id="comment-modal" uk-modal>
    <div class="uk-modal-dialog">
        <form class="form-horizontal" method="POST" action="{{ route('administrator.articles.changeStatus', ['article'=>$article]) }}">
            {{ csrf_field() }}
            <input type="hidden" name="article_status_id" value="{{$articleStatus::EDITING}}">
            <button class="uk-modal-close-default" type="button" uk-close></button>
            <div class="uk-modal-body">
                <label class="uk-form-label" for="comment">
                    コメント
                </label>
                <div class="uk-form-controls">
                    <textarea class="uk-textarea uk-height-small" type="text" name="comment"></textarea>
                </div>
            </div>
            <div class="uk-modal-footer uk-text-right">
                <button class="uk-button uk-button-default uk-modal-close" type="button">キャンセル</button>
                <button class="uk-button uk-button-primary" type="submit">差し戻し</button>
            </div>
        </form>
    </div>
</div>
@endif

@endsection
