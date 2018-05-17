@extends('layouts.user.default')

@section('content')

<h2 class="page-title">パスワード再設定</h2>
<div class="password-forgotten password-forgotten-page">
    <section class="password-forgotten__success password-forgotten--complete">
        <h3 class="password-forgotten__success__title">パスワードを再設定しました</h3>
        <p class="password-forgotten__success__txt04">新しいパスワードでお楽しみください。</p>
        <div class="password-forgotten__success__bottom">
            <a href="{{route('root.index')}}" class="btn btn--block btn--default">トップページへ</a>
        </div>
        <!--/.password-forgotten__success__bottom-->
    </section>
    <!--/.password-forgotten__success-->
</div>

@endsection
