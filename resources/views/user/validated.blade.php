@extends('layouts.user.default')

@section('content')

<h2 class="page-title">メールアドレスの変更</h2>
<div class="block-logout logout-page">
    <h3 class="block-logout__title">
        メールアドレスを変更しました<br/>
        再度ログインしてください。
    </h3>
    <ul class="block-logout__btn-list">
        <li>
            <a onclick="onOpenLogin()" class="btn btn--block btn--default">再ログインする</a>
        </li>
        <li>
            <a href="{{route('root.index')}}" class="btn btn--block btn--default">トップページへ</a>
        </li>
    </ul>
</div>

@endsection
