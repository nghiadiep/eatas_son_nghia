@extends('layouts.user.default')

@section('content')

<div class="main__content member-registration-page register-page clearfix">
    <h2 class="page-title">新規会員登録</h2>
    <div class="content-center">
    <div class="block-form">
        <nav class="block-form__step">
            <ol>
                <li class="block-form__step__active">
                    <span>会員情報を入力</span>
                </li>
                <li class="block-form__step__current">
                    <span>会員情報の確認メール送信</span>
                </li>
                <li>
                    <span>登録完了</span>
                </li>
            </ol>
        </nav>
        
        <section class="reg-step2">
            <h3 class="reg-step2__title">登録が完了しました</h3>
            
            @if(isset($user["email"]))
            <p class="reg-step2__des">下記のメールアドレスに、登録用アドレスを記載したメールを送信しました。</p>
            <p class="reg-step2__email">
                {{$user["email"]}}
            </p>
            <p class="reg-step2__text">メール内に記載されている登録用アドレスにアクセスして本登録<br>を行ってください。</p>
            <p class="reg-step2__text2">
                <a href="{{route('root.faq')}}" class="text-underline">メールが届かない場合</a>
            </p>
            <div class="reg-step2__btn-bottom block-form__btn-bottom">
                <a href="{{route('root.index')}}" class="btn btn--block btn--default">トップページへ戻る</a>
            </div>
            <!--/.password-forgotten__success__bottom-->
            @endif
        </section>
        <!--/.password-forgotten__success-->
    </div>
    <!--/.block-form-->
</div>

@endsection
</div>