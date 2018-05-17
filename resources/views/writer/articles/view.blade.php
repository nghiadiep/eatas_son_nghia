@inject('articleStatus', 'App\Models\ArticleStatus')
@extends('layouts.writer')

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

                        <iframe width="100%" height="600" src="{{route('writer.articles.preview', ['article' => $article])}}"></iframe>

                @if(!isset($mode) || $mode != "view_only" )

                    </li>
                    <li>
                        @include("component.part.smartviewer", ["url" => route('writer.articles.preview', ['article' => $article]) ])
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
                        @if( $article->article_status_id == $articleStatus::EDITING)
                        <div class="uk-margin-small">
                            <form class="form-horizontal" method="POST" action="{{ route('writer.articles.changeStatus', ['article'=>$article]) }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="article_status_id" value="{{$articleStatus::UNAPPROVED}}">
                                <button type="submit" class="uk-button uk-button-primary uk-width-1-1">
                                    承認依頼
                                </button>
                            </form>
                        </div>
                        <div class="uk-margin-small">
                            <a class="uk-button uk-button-default uk-width-1-1" href="{{route('writer.articles.edit', [ 'article'=>$article])}}">
                                編集
                            </a>
                        </div>
                        @if( count($article->reviews)>0 )
                        <hr/>
                        <h4 class="uk-margin-small">
                            レビューコメント
                        </h4>
                        @foreach($article->reviews as $review)
                            <div class="uk-margin-small">
                                <dl class="uk-description-list">
                                    <dt>
                                        {{$review->administrator->name}}
                                    </dt>
                                    <dd>
                                        @lined($review->comment)
                                    </dd>
                                </dl>
                            </div>
                        @endforeach
                        @endif

                        @endif
                        @if( $article->article_status_id == $articleStatus::UNAPPROVED)
                        <div class="uk-margin-small">
                           <form class="form-horizontal" method="POST" action="{{ route('writer.articles.changeStatus', ['article'=>$article]) }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="article_status_id" value="{{$articleStatus::EDITING}}">
                                <button type="submit" class="uk-button uk-button-danger uk-width-1-1">
                                    依頼取り下げ
                                </button>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>

                @endif
            </div>
        </div>
    </div>
</div>

@endsection
