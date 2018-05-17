@extends('layouts.administrator_authed')

@section('content')
<h1>
    管理者情報の編集
</h1>
<div class="uk-margin">

    <form class="form-horizontal" method="POST" action="{{ route('administrator.edit')}}">
        {{ csrf_field() }}
        <div class="uk-card uk-card-default uk-card-small uk-card-body">
            <div class="uk-grid-small" uk-grid>
                <div class="uk-width-1-1">
                    <label class="uk-form-label" for="name">
                        管理者氏名
                    </label>
                    <div class="uk-form-controls">
                        <input class="uk-input" id="name
                        " type="text" name="name" required value="{{$user->name}}">
                    </div>
                </div>
                <div class="uk-width-1-1">
                    <label class="uk-form-label" for="email">
                        メールアドレス
                    </label>
                    <div class="uk-form-controls">
                        <input class="uk-input" id="email
                        " type="email" name="email" required value="{{$user->email}}">
                    </div>
                </div>
                <div class="uk-width-1-2">
                    <label class="uk-form-label" for="password">
                        パスワード
                    </label>
                    <div class="uk-form-controls">
                        <input class="uk-input" id="password
                        " type="password" name="password" required>
                    </div>
                </div>
                <div class="uk-width-1-2">
                    <label class="uk-form-label" for="password_confirmation">
                        パスワードの確認
                    </label>
                    <div class="uk-form-controls">
                        <input class="uk-input" id="password_confirmation
                        " type="password" name="password_confirmation" required>
                    </div>
                </div>
                <div class="uk-width-1-1">
                    <button class="uk-button uk-button-primary uk-width-1-1" type="submit">
                        更新
                    </button>
                </div>
            </div>
            
        </div>
    </form>

</div>

@endsection
