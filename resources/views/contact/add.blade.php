@inject('constantService', 'App\Services\ConstantService')
@extends('layouts.user.default')

@section('content')


<h2 class="page-title">お問い合わせ</h2>
<div class="content-center">
    <div class="block-contact">
        <p class="block-contact__notice">
            お客さまからのご質問をお問い合わせフォームにて受け付けております。
            <br>必要事項を記入し、以下の注意事項を確認のうえ、お問い合わせください。
        </p>
        <div class="block-contact__message">
            <p>※下記について、あらかじめご了承ください。</p>
            <ul>
                <li>各種お問合せに関する回答につきましては、原則メールにて対応させていただきますが、お問い合わせの内容によりましては、お電話にて連絡させていただくことがございます。（メールアドレスは正確にご入力ください）</li>
                <li>弊社からの回答は、お問合せいただいたお客様の特定の質問にお答えするものです。弊社の許可無く、回答内容の一部もしくは全体を転用、二次利用、または当該お客様以外に開示することは固くお断りいたします。</li>
                <li>お問い合わせには、原則営業時間内に対応させていただきます。営業時間　10:00～19:00(土・日・祝日および夏季・年末年始の休業日を除く)</li>
                <li>お返事は原則24営業時間内としておりますが、内容によっては回答にお時間が掛かる場合がございます。 電話番号等の事項が不正確である場合や、お問合せの内容によっては、お返事を差し上げられない場合がございます。
                </li>
                <li>お客様の個人情報は、弊社規定に従い適切に管理いたします。詳細は
                    <a target="__blank" href="{{ config('app.company_privacy_url') }}">プライバシーポリシー</a>にてご確認ください。</li>
            </ul>
        </div>
    </div>
    <!--/.block-contact-->
    <div class="block-form">
        <form method="POST" action="{{ route('contact.add') }}" class="checkable-submit">
            {{ csrf_field() }}
            @include("component.user.error")
            <div class="block-form__box">
                <h2 class="title-center">
                    <span>お問い合わせ内容</span>
                </h2>
                <div class="block-form__sec pb15-ipt">
                    <p class="block-form__message">お問い合わせの前に
                        <a href="{{route('root.faq')}}">よくある質問</a>を読んでいただくと早く解決することがあります。ご確認ください。</p>
                    <div class="form-group">
                        <label class="sub-title">
                            <span>お問い合わせ内容</span>
                            <span class="sub-title__require">必須</span>
                        </label>
                        <div class="select-group">
                            <label>
                                @include("component.input.contact_types")
                            </label>
                        </div>
                    </div>
                    <!--/.form-group-->
                </div>
                <!--/.block-form__sec-->
                <div class="block-form__sec">
                    @include("component.user.textarea", [
                        "label" => "お問い合わせ詳細",
                        "name" => "description",
                        "required" => true,
                        "placeholder" => "内容を入力してください",
                        "value" => ""
                    ])
                    <!--/.form-group-->
                </div>
                <!--/.block-form__sec-->
            </div>
            <!--/.block-form__box-->
            <div class="block-form__box">
                <div class="block-form__sec pb15-ipt">
                    <h2 class="title-center">
                        <span>お客様情報</span>
                    </h2>
                    @include("component.user.input", [
                        "label" => "お名前（漢字）",
                        "name" => "name",
                        "required" => true,
                        "type" => "text",
                        "value" => Auth::guard("user")->check()? Auth::guard("user")->user()->name : null
                    ])
                    <!--/.form-group-->
                </div>
                <!--/.block-form__sec-->
                <div class="block-form__sec pb15-ipt">
                    @include("component.user.input", [
                        "label" => "メールアドレス",
                        "name" => "email",
                        "required" => true,
                        "type" => "email",
                        "value" => Auth::guard("user")->check()? Auth::guard("user")->user()->email : null
                    ])
                    <!--/.form-group-->
                </div>
                <!--/.block-form__sec-->
                <div class="block-form__sec">
                    @include("component.user.input", [
                        "label" => "電話番号",
                        "name" => "tel",
                        "required" => true,
                        "type" => "tel",
                        "value" => Auth::guard("user")->check()? Auth::guard("user")->user()->tel : null
                    ])
                    <!--/.form-group-->
                </div>
                <!--/.block-form__sec-->
            </div>
            <!--/.block-form__box-->

            @auth('user')
            <input type="hidden" name="term_agree" value="on">
            @else
            <div class="block-form__action">
                @auth("user")
                <input type="hidden" name="term_agree" value="true">
                @else
                <div class="block-form__btn-list">
                    <ul class="clearfix">
                        <li>
                            <a target="__blank" href="{{route('root.term')}}" class="btn btn--block btn--gray">利用規約を読む</a>
                        </li>
                        <li>
                            <a target="__blank" href="{{config('app.company_privacy_url')}}" class="btn btn--block btn--gray">プライバシーポリシーを読む</a>
                        </li>
                    </ul>
                </div>
                <!--/.block-form__btn-list-->
                <div class="checkbox-group">
                    <label class="term-label">
                        <input type="checkbox" name="term_agree" required>
                        <span>
                            <span>利用規約およびプライバシーポリシーを確認し、同意しました</span>
                        </span>
                    </label>
                </div>
                @endauth
                <!--/.checkbox-group-->
            </div>
            @endauth
            <!--/.block-form__sec-->
            <div class="block-form__btn-bottom">
                <button type="submit" class="btn btn--block btn--on">お問い合わせを送信する</button>
            </div>
            <!--/.block-form__btn-bottom-->
        </form>
    </div>
    <!--/.block-contact-->
</div>
@endsection
