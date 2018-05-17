@extends('emails.layouts.default')

@section('main')

@include('emails.layouts.header', ["name" => $user->nickname])
パスワードのリセットを受け付けました。

続けて下記リンク先からパスワードのリセットをおこなってください。
{{route("user.password.reset", ["token" => $token, "email" => $user->email])}}

今後ともどうぞよろしくお願い致します。

@endsection