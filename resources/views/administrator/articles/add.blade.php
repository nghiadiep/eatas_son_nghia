@extends('layouts.administrator_authed')

@section('content')
<h1>
    記事の新規作成
</h1>
<div class="uk-margin uk-card uk-card-default uk-card-small uk-card-body">
    <form class="form-horizontal" method="POST" action="{{ route('administrator.articles.add') }}">
        {{ csrf_field() }}
        @component("component.editor.article", ["role" => "administrator"])
        @endComponent()
        <div class="uk-margin-small">
            <button class="uk-button uk-button-primary uk-width-1-1" type="submit">
                新規作成
            </button>
        </div>
    </form>
</div>
@endsection
