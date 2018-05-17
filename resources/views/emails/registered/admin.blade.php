@extends('emails.layouts.admin')

@section('main')

会員登録を受け付けました。
会員登録者の情報は以下になります。

@include("emails.part.user", ["user" => $user])

@endsection