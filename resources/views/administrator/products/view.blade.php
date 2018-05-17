@extends('layouts.administrator_authed')

@section('content')
<h1>
    商材の詳細
</h1>
<div class="uk-margin">
    <a class="uk-button uk-button-primary" href="{{route('administrator.products.edit', ['product'=>$product])}}">
        この商材を編集
    </a>
</div>
<div class="uk-margin">
    <div class="uk-card uk-card-default uk-card-small uk-card-body">
        <div class="uk-margin-small uk-grid-small" uk-grid>
            <div class="uk-width-1-1">
                <dl class="uk-description-list">
                    <dt>商品カテゴリ</dt>
                    <dd>
                        {{$product->productCategory->label}}
                    </dd>
                </dl>
            </div>
            <div class="uk-width-1-3@s">
                <dl class="uk-description-list">
                    <dt>商材名</dt>
                    <dd>
                        {{$product->name}}
                    </dd>
                </dl>
            </div>
            <div class="uk-width-1-3@s">
                <dl class="uk-description-list">
                    <dt>提供会社</dt>
                    <dd>
                        {{$product->advertiser->company_name}}
                    </dd>
                </dl>
            </div>
            <div class="uk-width-1-3@s">
                <dl class="uk-description-list">
                    <dt>獲得ポイント</dt>
                    <dd>
                        {{$product->point}}
                    </dd>
                </dl>
            </div>
            <div class="uk-width-1-1">
                @include("component.part.inquiry_documents", ["inquiryDocuments" => $product->inquiryDocuments, "mode" => "admin" ])
            </div>
        </div>
    </div>
</div>
<h2>
    商材詳細ページ
</h2>
<hr/>
<section class="uk-margin sentence">
    {!! $product->description !!}
</section>
@endsection
