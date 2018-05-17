@extends('layouts.writer_authed')

@section('content')
<h1>
    {{$heading}}
</h1>

@include("component.list.articles", [
    "articles" => $articles,
    "params" => $params,
    "mode" => "writer",
    "by_status" => true
])


@endsection
