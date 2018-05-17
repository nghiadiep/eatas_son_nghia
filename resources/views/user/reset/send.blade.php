@extends('layouts.user.default')

@section('content')

<h2 class="page-title">パスワード再設定</h2>
<div class="password-forgotten-page password-forgotten">
    <section class="password-forgotten__success">
        <h3 class="password-forgotten__success__title">メールを送信しました</h3>
        <p>下記のメールアドレスに、パスワード再設定用のアドレスを記載したメールを送信しました。</p>
        <p class="password-forgotten__success__email">
            {{$email}}
        </p>
        <p>
            メール内のパスワード再設定用アドレスにアクセスしてパスワードを変更してください。<br/>
            アドレスが正しくない場合は再度入力してください。
        </p>
        <p>
            <a href="{{route('root.faq')}}" class="password-forgotten__success__again">メールが届かない場合</a>
        </p>
        <div class="password-forgotten__success__bottom">
            <a href="{{route('root.index')}}" class="btn btn--block btn--default">トップページへ</a>
        </div>
        <!--/.password-forgotten__success__bottom-->
    </section>
    <!--/.password-forgotten__success-->
</div>

@endsection
