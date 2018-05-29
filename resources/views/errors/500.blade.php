@extends('layouts.user.default')

@section('content')
<div class="content-center error-page">
<div class="block-error-page block-error-page--500">
    <div class="block-error-page__des">
        <img src="{{asset('images/error_page/500_sp.png')}}"  alt="500 ERROR">
    </div>
    <!--/.block-error-page__sec1-->
    <div class="block-error-page__note">
        <p>システムエラーです。しばらく時間をおいてからアクセスしてみてください。</p>
    </div>
</div>
</div>
@endsection
