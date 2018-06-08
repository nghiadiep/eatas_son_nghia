@extends('layouts.user.default')

@section('content')

<h2 class="page-title">新規会員登録</h2>
<div class="content-center">
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
            <h2 class="block-form__header__title"> 会員登録が完了しました<br class="sp">ありがとうございました</h2>
            <p>
                <a href="#" class="btn btn--block btn--default">トップページへ戻る</a>
            </p>
            <p>資料請求を行う場合は続けてお届け先情報を登録していただくと大変便利です。</p>
        </section>

        <section>
            <h2 class="title-center">
                <span>お届け先情報</span>
            </h2>
            <section class="block-alert mb14-ipt">
                <h2 class="block-alert__title">
                    <span>ご確認ください</span>
                </h2>
                <ul class="block-alert__list">
                    <li>屋号を入力してください。</li>
                    <li>会社の郵便番号を入力してください。</li>
                    <li>会社住所を入力してください。</li>
                    <li>代表電話番号を入力してください。</li>
                    <li>担当者名を入力してください。</li>
                    <li>担当者の性別を選択してください。</li>
                    <li>担当者の生年月日を選択してください。</li>
                    <li>担当者に連絡できる電話番号を入力してください。</li>
                    <li>職種を選択してください。</li>
                </ul>
            </section>
            <form method="POST" action="{{route('user.inquiries.edit')}}" class="checkable-submit">
                {{ csrf_field() }}
                @include("component.user.inquiry")
                <div class="block-form__btn-bottom">
                    <button type="submit" class="btn btn--block">お問い合わせを送信する</button>
                </div>
                <input type="hidden" name="product_id" value="{{$product->id}}" >
                <!--/.block-form__btn-bottom-->
            </form>
        </section>
    </div>
</div>
@endsection