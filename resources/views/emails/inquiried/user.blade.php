@extends('emails.layouts.default')

@section('main')

@include('emails.layouts.header', ["name" => $inquiry->user->nickname])

資料請求を承りました。
請求内容は以下になります。

@include("emails.part.user_detail", ["user" => $inquiry->user])

@include("emails.part.product", ["product" => $inquiry->product])

@if( isset($combineds) && $combineds != null && $combineds->count() > 0 )
@foreach($combineds as $combined)
@include("emails.part.product", ["product" => $combined->product])
@endforeach
@endif

請求された資料は近日中に改めて送付させていただきます。

その他の問い合わせ済みの内容に関しては下記のリンクからご確認頂けます。
{{route('user.inquiries')}}

今後ともどうぞよろしくお願い致します。

@endsection