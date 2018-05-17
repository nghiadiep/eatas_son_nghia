@extends('layouts.writer_authed')

@section('content')
<h1>
    ライターページ
</h1>
<p>
    {{$writer->pen_name}}さんこんにちは。
</p>

@endsection
