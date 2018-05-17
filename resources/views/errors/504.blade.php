@extends('layouts.user.default')

@section('content')

<div class="block-error-page block-error-page--504">
    <div class="block-error-page__des">
        <img src="{{asset('images/error_page/504_sp.png')}}"  alt="504 ERROR">
    </div>
    <!--/.block-error-page__sec1-->
    <div class="block-error-page__note">
        <p>応答がありません。しばらく時間をおいてからアクセスしてみてください。</p>
    </div>
</div>

@endsection
