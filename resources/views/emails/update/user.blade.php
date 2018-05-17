@extends('emails.layouts.default')

@section('main')

@include('emails.layouts.header', ["name" => $user->nickname])
メールアドレスの変更を受け付けました。

続けて下記リンク先から新しいメールアドレスを有効化してください。
{{route("user.validate", ["token" => $user->init_token])}}

今後ともどうぞよろしくお願い致します。

@endsection