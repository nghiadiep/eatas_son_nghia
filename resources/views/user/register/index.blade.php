@extends('layouts.user.default')

@section('content')


<h2 class="page-title">新規会員登録</h2>
<div class="block-form">
    <nav class="block-form__step">
        <ol>
            <li class="block-form__step__current">
                <span>会員情報を入力</span>
            </li>
            <li>
                <span>会員情報の確認メール送信</span>
            </li>
            <li>
                <span>登録完了</span>
            </li>
        </ol>
    </nav>
    <form method="POST" action="{{route('user.register')}}" class="checkable-submit">
        {{ csrf_field() }}
        @include("component.user.error")
        <div class="block-form__sec">
            @include("component.user.input", [
                "label" => "ニックネーム",
                "name" => "nickname",
                "required" => true,
                "type" => "text"
            ])
        </div>
        <!--/.block-form__sec-->
        <div class="block-form__sec">
            @include("component.user.input", [
                "label" => "メールアドレス",
                "name" => "email",
                "required" => true,
                "type" => "email"
            ])
        </div>
        <!--/.block-form__sec-->
        <div class="block-form__sec">
            @component("component.user.password_input", [
                "label" => "パスワード",
                "name" => "password",
                "required" => true,
            ])
                @slot('placeholder')
                    <span>パスワード</span>
                    <small>（半角英数字8～16文字）</small>
                @endslot
            @endcomponent
        </div>
        <!--/.block-form__sec-->
        <div class="block-form__sec">
            @component("component.user.password_input", [
                "label" => "パスワード（確認用）",
                "name" => "password_confirmation",
                "required" => true,
            ])
                @slot('placeholder')
                    <span>パスワード</span>
                    <small>（確認用）</small>
                @endslot
            @endcomponent
        </div>
        <!--/.block-form__sec-->
        <div class="block-form__sec">
            <div class="block-form__btn-list">
                <ul>
                    <li>
                        <a target="_blank" href="{{route('root.term')}}" class="btn btn--block btn--gray">利用規約を読む</a>
                    </li>
                    <li>
                        <a target="_blank" href="{{config('app.company_privacy_url')}}" class="btn btn--block btn--gray">プライバシーポリシーを読む</a>
                    </li>
                </ul>
            </div>
            <!--/.block-form__btn-list-->
            <div class="checkbox-group">
                <label class="term-label">
                    <input type="checkbox" name="term_agree" value="on" {{old('term_agree')=='on'?'checked': null}}>
                    <span>
                        <span>利用規約およびプライバシーポリシーを確認し、同意しました</span>
                    </span>
                </label>
            </div>
            <!--/.checkbox-group-->
        </div>
        <!--/.block-form__sec-->
        <div class="block-form__btn-bottom">
            <button type="submit" class="btn btn--block btn--off">新規会員登録する</button>
        </div>
        <input type="hidden" name="inquiring_product_id" class="inquiering_product" value="{{$inquiring_product_id}}" />
        <!--/.block-form__btn-bottom-->
    </form>
</div>
<!--/.block-form-->

@endsection
