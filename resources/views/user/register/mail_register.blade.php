@extends('layouts.user.default')

@section('content')

<h2 class="page-title">新規会員登録</h2>
<div class="block-form from-step3">
    <nav class="block-form__step">
        <ol>
            <li class="block-form__step__active">
                <span>会員情報を入力</span>
            </li>
            <li class="block-form__step__active">
                <span>会員情報の確認メール送信</span>
            </li>
            <li class="block-form__step__current">
                <span>登録完了</span>
            </li>
        </ol>
    </nav>
    <!--/.block-form__step-->
    <section class="block-form__header">
        <h2 class="block-form__header__title"> 会員登録が完了しました
            <br>ありがとうございました</h2>
        <p>
            <a href="{{route('root.index')}}" class="btn btn--block btn--default">トップページへ戻る</a>
        </p>
    </section>
</div>

@endsection
