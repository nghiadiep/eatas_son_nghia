@inject('articleStatus', 'App\Models\ArticleStatus')
@extends('layouts.writer_authed')

@section('content')
<div class="uk-margin">
    <h1 class="uk-inline uk-margin-remove">
        記事検索
    </h1>
    <a class="uk-margin-left uk-button uk-button-primary" href="{{route('writer.articles.add')}}">
        記事の追加
    </a>
</div>

<div class="uk-margin uk-card uk-card-default uk-card-small uk-card-body">

    <ul uk-accordion>
        <li class="uk-open">
            <h2 class="uk-accordion-title">
                フィルター
            </h2>
            <div class="uk-accordion-content">
                <form class="form-horizontal" method="GET">
                    <div class="uk-grid-small uk-flex-bottom" uk-grid>
                        <div class="uk-width-1-1">
                            <label class="uk-form-label" for="notice_status_id">
                                ステータス
                            </label>
                            <div class="uk-form-controls">
                                @include('component.input.article_statuses', [ 'value' => isset($params['article_status_id']) ? $params['article_status_id']: null, "required" => false ])
                            </div>
                        </div>
                        <div class="uk-width-1-1">
                            <label class="uk-form-label" for="category_id">
                                カテゴリ
                            </label>
                            <div class="uk-form-controls">
                                @include('component.input.categories', [ 'value' => isset($params['category_id']) ? $params['category_id']: null, "required" => false ])
                            </div>
                        </div>
                        <div class="uk-width-1-2@s">
                            <label class="uk-form-label" for="publish_date">
                                公開日
                            </label>
                            <div class="uk-form-controls">
                                <div class="uk-grid-small uk-flex-middle" uk-grid>
                                    <div class="uk-width-expand">
                                        <input class="uk-input datepicker" type="text" name="publish_date__start" value="@if(isset($params['publish_date__start']))@date($params['publish_date__start'])@endif">
                                    </div>
                                    <div class="uk-width-auto">
                                        ~
                                    </div>
                                    <div class="uk-width-expand">
                                        <input class="uk-input datepicker" type="text" name="publish_date__end" value="@if(isset($params['publish_date__end']))@date($params['publish_date__end'])@endif">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="uk-width-1-2@s">
                            <label class="uk-form-label" for="publish_date">
                                会員限定公開日
                            </label>
                            <div class="uk-form-controls">
                                <div class="uk-grid-small uk-flex-middle" uk-grid>
                                    <div class="uk-width-expand">
                                        <input class="uk-input datepicker" type="text" name="member_publish_date__start" value="@if(isset($params['member_publish_date__start']))@date($params['member_publish_date__start'])@endif">
                                    </div>
                                    <div class="uk-width-auto">
                                        ~
                                    </div>
                                    <div class="uk-width-expand">
                                        <input class="uk-input datepicker" type="text" name="member_publish_date__end" value="@if(isset($params['member_publish_date__end']))@date($params['member_publish_date__end'])@endif">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="uk-width-expand@s">
                            <label class="uk-form-label" for="title">
                                タイトル
                            </label>
                            <div class="uk-form-controls">
                                <input class="uk-input" type="text" name="title" value="{{ isset($params['title']) ? $params['title']: null }}">
                            </div>
                        </div>
                        <div class="uk-width-expand@s">
                            <label class="uk-form-label" for="freeword">
                                本文
                            </label>
                            <div class="uk-form-controls">
                                <input class="uk-input" type="text" name="freeword" value="{{ isset($params['freeword']) ? $params['freeword']: null }}">
                            </div>
                        </div>
                        <div class="uk-width-auto">
                            <button type="submit" class="uk-button uk-button-primary">
                                検索
                            </button>
                        </div>
                        <div class="uk-width-auto">
                            <a class="uk-button uk-button-default" href="?">
                                クリア
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </li>
    </ul>
</div>

@include("component.list.articles", [
    "articles" => $articles,
    "params" => $params,
    "mode" => "writer"
])

@endsection
