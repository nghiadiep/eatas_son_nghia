@extends('layouts.administrator_authed')

@section('content')
<h1>
    商材設定
</h1>
<div class="uk-margin uk-card uk-card-default uk-card-small uk-card-body">
    <h2 class="uk-margin-small">
        {{$article->title}}
    </h2>
    <p class="uk-margin-small">
        @lined($article->summary)
    </p>
</div>

<div class="uk-margin uk-card uk-card-default uk-card-small uk-card-body">
    <div class="uk-margin-small uk-width-large@s">
        <label class="uk-form-label" for="close_date">
            商材検索
        </label>
        <div class="uk-form-controls">
            <input type="text" class="uk-input autocomplete">
        </div>
    </div>
    <form class="form-horizontal" method="POST" action="{{ route('administrator.articles.products', ['article'=>$article]) }}">
        {{ csrf_field() }}
        <table class="uk-table uk-margin-small">
            <thead>
                <tr>
                    <th class="uk-table-expand">商材名</th>
                    <th class="uk-width-small">広告主名</th>
                    <th class="uk-width-auto"></th>
                </tr>
            </thead>
            <tbody id="product_body">
                <tr id="template" class="uk-hidden">
                    <input type="hidden" class="product_form">
                    <td class="product_name">
                    </td>
                    <td class="company_name">
                    </td>
                    <td>
                        <button class="uk-icon-button uk-button-danger" uk-icon="icon: trash" type="button" onclick="deleteRow(this)"></button>
                    </td>
                </tr>
                @foreach($article->products as $product)
                <tr>
                    <input type="hidden" class="product_form" name="product_id[]" value="{{$product->id}}">
                    <td class="product_name">
                        {{$product->name}}
                    </td>
                    <td class="company_name">
                        {{$product->advertiser->company_name}}
                    </td>
                    <td>
                        <button class="uk-icon-button uk-button-danger" uk-icon="icon: trash" type="button" onclick="deleteRow(this)"></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="uk-margin-small">
            <button type="submit" class="uk-width-1-1 uk-button uk-button-primary">
                保存する
            </button>
        </div>
    </form>
</div>

<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
    $('.autocomplete').autocomplete({
        source: function( req, res ) {
            window.axios.get("{{route('api.products.search')}}?name=" + encodeURIComponent(req.term)).then(response => {
                res($.map(response.data.data, function (product, key) {
                    return {
                        label: product.name,
                        value: product.name,
                        data: product,
                    };
                }));
            });
        },
        select: function(event, selected){
            addRow(selected.item.data);
        },
        autoFocus: true,
        minLength: 0
    });
});

var addRow = function(product) {
    var newRow = $("#template").clone();
    newRow.attr('id', null);
    newRow.attr('class', null);
    newRow.find(".product_form").attr("name", "product_id[]");
    newRow.find(".product_form").val(product.id);
    newRow.find(".product_name").text(product.name);
    newRow.find(".company_name").text(product.advertiser.company_name);
    newRow.appendTo("#product_body");
}

var deleteRow = function(element) {
    $(element).parent().parent().remove();
};
</script>

@endsection
