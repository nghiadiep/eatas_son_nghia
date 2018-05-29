@extends('layouts.user.default')

@section('content')
<div class="content-center error-page">
<div class="block-error-page block-error-page--maintenance">
    <div class="block-error-page__des">
        <img src="{{asset('images/error_page/maintenance_sp.png')}}"  alt="ただいまメンテナンス中です">
    </div>
    <!--/.block-error-page__sec1-->
    <div class="block-error-page__note">
        <p>しばらく時間をおいてからアクセスしてみてください。</p>
    </div>
</div>
</div>
@endsection