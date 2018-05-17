@extends('layouts.administrator_authed')

@section('content')
<h1>
    管理者ページ
</h1>
<p>
    {{$user->name}}さんこんにちは。
</p>
<div class="uk-margin">
    <h2>
        アクティビティ
    </h2>
    <div>
        何かしらのデータを出す？
    </div>
</div>

@endsection
