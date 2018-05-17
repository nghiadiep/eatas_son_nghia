@extends('emails.layouts.admin')

@section('main')

資料請求を受け付けました。
請求内容は以下になります。

@include("emails.part.user_detail", ["user" => $inquiry->user])

@include("emails.part.product", ["product" => $inquiry->product])

@if( isset($combineds) && $combineds != null && $combineds->count() > 0 )
@foreach($combineds as $combined)
@include("emails.part.product", ["product" => $combined->product])
@endforeach
@endif

@endsection