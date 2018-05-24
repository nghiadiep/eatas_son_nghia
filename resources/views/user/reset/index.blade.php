@extends('layouts.user.default')

@section('content')

<h2 class="page-title">パスワード再設定</h2>
<div class="content-center">
    <div class="password-forgotten password-forgotten-page">
        <div class="password-forgotten__content">
            <form method="POST" action="{{ route('user.password.email') }}" class="checkable-submit">
                {{ csrf_field() }}
                <p class="password-forgotten__text">登録しているメールアドレスを入力してください。
                    <br>パスワード再設定の案内をメールで送信します。</p>
                <p>
                    <input type="email" required name="email" class="form-control" placeholder="メールアドレス">
                </p>
                <div class="password-forgotten__note">
                    <p class="password-forgotten__note__asterisk">メールは「<a href="mailto:info@eatas.jp">info@eatas.jp</a>」から送信されます。<br class="pc">受信できるようにフィルタリングを設定してから送信してください。</p>
                </div>
                <div>
                    <button type="submit" class="btn btn--block btn--black">メールを送信する</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
