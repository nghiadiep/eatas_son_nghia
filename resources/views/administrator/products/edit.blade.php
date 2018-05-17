@extends('layouts.administrator_authed')

@section('content')
<h1>
    商材の更新
</h1>
<div class="uk-margin">
    <form class="uk-display-inline-block" method="POST" action="{{ route('administrator.products.delete', ['product' => $product]) }}" onSubmit="confirmDelete(event)">
        {{ csrf_field() }}
        <button class="uk-button uk-button-danger">
            商材を削除する
        </button>
    </form>
</div>
<div class="uk-margin uk-card uk-card-default uk-card-small uk-card-body">
    <form class="form-horizontal" method="POST" action="{{ route('administrator.products.edit', ['product' => $product]) }}">
        {{ csrf_field() }}
        @component('component.editor.product', ['product' => $product])@endcomponent
        <div class="uk-margin-small">
            <button class="uk-button uk-button-primary uk-width-1-1" type="submit">
                更新
            </button>
        </div>
    </form>
</div>
@endsection
