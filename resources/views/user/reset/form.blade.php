@extends('layouts.user.default')

@section('content')

<h2 class="page-title">パスワード再設定</h2>
<div class="content-center">
    <div class="user-reset">
        <div class="block-form">
            <form method="POST" action="{{route('user.password.dosend')}}" class="checkable-submit">
                {{ csrf_field() }}
                @include("component.user.error")
                <div class="block-form__sec">
                    <label class="sub-title">
                        <span>メールアドレス</span>
                    </label>
                    <div class="form-group">
                        <p class="email-text">
                            <strong>
                                {{$email}}
                            </strong>
                        </p>
                        <input type="hidden" name="email" value="{{$email}}" />
                        <input type="hidden" name="token" value="{{$token}}" />
                    </div>
                </div>
                <!--/.block-form__sec-->
                <div class="block-form__sec">
                    @component("component.user.password_input", [
                        "label" => "新しいパスワード",
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
                        "label" => "新しいパスワード（確認用）",
                        "name" => "password_confirmation",
                        "required" => true,
                    ])
                        @slot('placeholder')
                            <span>パスワード</span>
                            <small>（確認用）</small>
                        @endslot
                    @endcomponent
                </div>
                
                <div class="block-form__btn-bottom">
                    <button type="submit" class="btn btn--block btn--black">パスワードを再設定する</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
