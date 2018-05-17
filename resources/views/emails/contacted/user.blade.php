@extends('emails.layouts.default')

@section('main')

@include('emails.layouts.header', ["name" => $contact->name])

お問い合わせいただきありがとうございます。
お問い合わせの内容は以下になります。

----------------------------------
メールアドレス: 
{{$contact->email}}

電話番号: 
{{$contact->tel}}

問い合わせ種別: 
{{$contact->contactType->label}}

内容: 
{{$contact->description}}
----------------------------------

@endsection