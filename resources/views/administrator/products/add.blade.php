@extends('layouts.administrator_authed')

@section('content')
<h1>
    商材の追加
</h1>
<div class="uk-margin uk-card uk-card-small uk-card-default uk-card-body">
    <form class="form-horizontal" method="POST" action="{{ route('administrator.products.add') }}">
        {{ csrf_field() }}
        @component('component.editor.product')@endcomponent
        <div class="uk-margin-small">
            <button class="uk-button uk-button-primary uk-width-1-1" type="submit">
                新規作成
            </button>
        </div>
    </form>
</div>
@endsection
