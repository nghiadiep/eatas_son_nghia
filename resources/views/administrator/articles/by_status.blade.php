@extends('layouts.administrator_authed')

@section('content')
<h1>
    {{$heading}}
</h1>

@include("component.list.articles", [
    "articles" => $articles,
    "params" => $params,
    "mode" => "administrator",
    "by_status" => true
])


@endsection
