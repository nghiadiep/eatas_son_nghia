@extends('emails.layouts.admin')

@section('main')


お問い合わせを受け付けました。
問い合わせ内容は以下になります。

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