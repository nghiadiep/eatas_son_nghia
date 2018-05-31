@extends('layouts.user.default')

@section('content')

<h2 class="page-title">お問い合わせ</h2>
<div class="content-center">
    <div class="block-form">
        <section class="block-form__confirm">
            <h3 class="block-form__confirm__title">
                お問い合わせを受け付けました
                <br>ありがとうございました
            </h3>

            @if(isset($contact)) 
            <div class="block-form__sec">
                <label class="sub-title">
                    <span>お問い合わせ内容</span>
                </label>
                <div class="form-group">
                    <p>
                        {{$contact->contactType->label}}
                    </p>
                </div>
                <!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            
            <div class="block-form__sec">
                <label class="sub-title">
                    <span>お問い合わせ詳細</span>
                </label>
                <div class="form-group">
                    <p>
                        @lined($contact->description)
                    </p>
                </div>
                <!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <label class="sub-title">
                    <span>お名前（漢字）</span>
                </label>
                <div class="form-group">
                    <p>
                        {{$contact->name}}
                    </p>
                </div>
                <!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <label class="sub-title">
                    <span>メールアドレス</span>
                </label>
                <div class="form-group">
                    <p>xxxx@xx.xx.com</p>
                </div>
                <!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <label class="sub-title">
                    <span>電話番号</span>
                </label>
                <div class="form-group">
                    <p>
                        {{$contact->email}}
                    </p>
                </div>
                <!--/.form-group-->
            </div>
            @endif
            <!--/.block-form__sec-->
            <div class="block-form__btn-bottom block-form__btn-bottom__thanks">
                <a href="{{route('root.index')}}" class="btn btn--block btn--default">トップページへ</a>
            </div>
            <!--/.block-form__btn-bottom-->
        </section>
        <!--/.block-form__confirm-->
    </div>
    <!--/.block-form-->
</div>
@endsection
