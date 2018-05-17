@extends('layouts.administrator_authed')

@section('content')
<div class="uk-margin">
    <h1 class="uk-inline uk-margin-remove">
        商材の一覧
    </h1>
    <a class="uk-margin-left uk-button uk-button-primary" href="{{route('administrator.products.add')}}">
        追加
    </a>
</div>

<form class="form-horizontal" method="GET">
    <div class="uk-margin uk-grid-small uk-flex-bottom" uk-grid>
        <div class="uk-width-small@s">
            <label class="uk-form-label" for="notice_status_id">
                商品カテゴリ
            </label>
            <div class="uk-form-controls">
                @include('component.input.product_categories', [ 'value' => isset($params['product_category_id']) ? $params['product_category_id']: null, "required" => false ])
            </div>
        </div>
        <div class="uk-width-small@s">
            <label class="uk-form-label" for="notice_status_id">
                提供会社
            </label>
            <div class="uk-form-controls">
                @include('component.input.advertisers', [ 'value' => isset($params['advertiser_id']) ? $params['advertiser_id']: null, "required" => false ])
            </div>
        </div>
        <div class="uk-width-large@s">
            <label class="uk-form-label" for="name">
                商材名
            </label>
            <div class="uk-form-controls">
                <div class="uk-grid-collapse" uk-grid>
                    <div class="uk-width-expand">
                        <input class="uk-input" type="text" name="name" value="{{ isset($params['name']) ? $params['name']: null }}">
                    </div>
                    <div class="uk-width-auto">
                        <button type="submit" class="uk-button uk-button-primary">
                            検索
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="uk-width-auto">
            <a class="uk-button uk-button-default" href="?">
                クリア
            </a>
        </div>
    </div>
</form>

<div class="uk-margin uk-overflow-auto">
    <table class="uk-table uk-table-small uk-table-divider uk-table-striped">
        <thead>
            <tr>
                <th>
                    @include("component.part.sorter", ["order" => "product_category_id", "label" => "商品カテゴリ", "params" => $params])
                </th>
                <th>
                    @include("component.part.sorter", ["order" => "advertiser_id", "label" => "提供会社", "params" => $params])
                </th>
                <th>
                    @include("component.part.sorter", ["order" => "name", "label" => "商材名", "params" => $params])
                </th>
                <th>
                    @include("component.part.sorter", ["order" => "point", "label" => "ポイント", "params" => $params])
                </th>
                <th>
                    付属ファイル
                </th>
                <th class="uk-width-auto">
                    操作
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>
                    {{$product->productCategory->label}}
                </td>
                <td>
                    {{$product->advertiser->company_name}}
                </td>
                <td>
                    {{$product->name}}
                </td>
                <td>
                    {{$product->point}}
                </td>
                <td>
                    @foreach($product->inquiryDocuments as $document)
                        @if($document->doc_type_id == $document::DL)
                            <a class="uk-button uk-button-link" href="{{route('administrator.inquiryDocuments.download', ['inquiryDocument'=>$document])}}" target="_blank">
                                {{$document->name}}
                            </a><br/>
                        @elseif($document->doc_type_id == $document::WEB)
                            <a class="uk-button uk-button-link" href="{{$document->link}}" target="_blank">
                                {{$document->name}}
                            </a><br/>
                        @else
                            {{$document->name}}<br/>
                        @endif
                    @endforeach
                </td>
                <td>
                    <span class="uk-margin-small-right">
                        <a class="uk-icon-button uk-button-default" uk-icon="icon: info" href="{{route('administrator.products.view', ['product'=>$product])}}">
                        </a>
                    </span>
                    <span class="uk-margin-small-right">
                        <a class="uk-icon-button uk-button-default" uk-icon="icon: file-edit" href="{{route('administrator.products.edit', ['product'=>$product])}}">
                        </a>
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="uk-margin">
    {{ $products->appends(isset($params)? $params: [])->links() }}
</div>

@endsection
