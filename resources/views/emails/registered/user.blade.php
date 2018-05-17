@extends('emails.layouts.default')

@section('main')

@include('emails.layouts.header', ["name" => $user->nickname])

会員登録はまだ完了していません。
下記リンクを開き資料請求情報登録を完了させてください。
{{route("user.register.mailRegister", ["token" => $user->init_token])}}

今後ともどうぞよろしくお願い致します。

@endsection