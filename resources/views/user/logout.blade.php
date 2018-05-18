@extends('layouts.user.default')

@section('content')
<h2 class="page-title">ログアウト</h2>
<div class="content-center">
    <div class="block-logout logout-page">
        <h3 class="block-logout__title">ログアウトしました</h3>
        <ul class="block-logout__btn-list">
            <li>
                <a href="{{route('user.intro')}}" class="btn btn--block btn--yellow">新規登録する</a>
            </li>
            <li>
                <a onclick="onOpenLogin()" class="btn btn--block btn--default">別のIDでログインする</a>
            </li>
            <li>
                <a href="{{route('root.index')}}" class="btn btn--block btn--default">トップページへ</a>
            </li>
        </ul>
    </div>
</div>
@endsection
