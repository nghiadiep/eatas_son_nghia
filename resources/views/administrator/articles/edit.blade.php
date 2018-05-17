@extends('layouts.administrator_authed')

@section('content')
<div>
    <h1 class="uk-margin-remove uk-inline uk-text-middle">
        記事の編集
    </h1>
    <a class="uk-margin-left uk-button uk-button-text uk-text-middle" href="{{route('administrator.articles.view', ['article'=> $article])}}">
        >> ページを見る
    </a>
</div>
<div class="uk-margin uk-card uk-card-default uk-card-small uk-card-body">
    <form class="form-horizontal" method="POST" action="{{ route('administrator.articles.edit', ['article'=>$article]) }}">
        {{ csrf_field() }}
        @component("component.editor.article", ['article'=>$article, "role" => "administrator"])
        @endComponent()
        <div class="uk-margin-small">
            <button class="uk-button uk-button-primary uk-width-1-1" type="submit">
                更新
            </button>
        </div>
    </form>
</div>
@endsection
