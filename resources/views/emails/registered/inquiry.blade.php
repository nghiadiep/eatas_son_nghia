@extends('emails.layouts.default')

@section('main')

@include('emails.layouts.header', ["name" => $user->nickname])

資料請求はまだ完了していません。
下記リンクを開き請求を完了させてください。
{{route("user.register.mailRegister", ["token" => $user->init_token, "product_id" => $productId])}}

今後ともどうぞよろしくお願い致します。

@endsection