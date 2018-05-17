@extends('layouts.administrator_authed')

@section('content')
<h1>
    ピックアップ設定({{$category->label}})
</h1>
<div class="uk-margin uk-grid-small" uk-grid>
    <div class="uk-width-2-3@s">
        <form class="form-horizontal" method="POST" action="{{ route('administrator.picks.add', ['category'=>$category]) }}">
            {{ csrf_field() }}
            <label class="uk-form-label" for="title">
                記事検索
            </label>
            <div class="uk-form-controls">
                <div class="uk-grid-collapse" uk-grid>
                    <div class="uk-width-expand">
                        <input type="hidden" id="article_id" name="article_id">
                        <input type="text" class="uk-input autocomplete">
                    </div>
                    <div class="uk-width-auto">
                        <button id="add-submit" class="uk-button uk-button-primary" type="submit" disabled>
                            追加する
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="uk-width-1-3@s">
        <div id="article_base" class="uk-height-small image-wrapper uk-position-relative">
            <img id="article_image">
            <div class="uk-overlay uk-overlay-default uk-position-bottom uk-padding-small">
                <h5 class="uk-margin-remove" id="title">
                </h5>
            </div>
        </div>
    </div>
</div>

@if( count($category->picks) > 0 )
<form class="form-horizontal" method="POST" action="{{ route('administrator.picks.save', ['category'=>$category]) }}">
    {{ csrf_field() }}
    <div class="uk-margin uk-grid-small uk-child-width-1-3@m sortable" uk-grid uk-sortable="handle: .uk-sortable-handle">
        @foreach($category->picks as $article)
        <div id="picked_{{$article->id}}">
            <input type="hidden" class="input_on_top" name="on_category_top[]" value="{{$article->id}}">
            <div class="uk-height-small image-wrapper uk-position-relative">
                <img src="@include('component.part.image', ['image' => $article->articleImage])">
                <div class="uk-overlay uk-overlay-default uk-position-bottom uk-padding-small">
                    <h5 class="uk-margin-remove">
                        {{$article->title}}
                    </h5>
                </div>
                <div class="uk-position-top-left uk-padding-small">
                    <span class="uk-sortable-handle uk-margin-small-right" uk-icon="icon: table"></span>
                </div>
                <div class="uk-position-top-right uk-padding-small">
                    <button class="uk-icon-button uk-button-danger" uk-icon="icon: trash" onclick="deletePick({{$article->id}})">
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="uk-margin uk-text-right">
        <button class="uk-button uk-button-primary uk-width-1-1">
            保存する
        </button>
    </div>
</form>
@endif

<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
    $("#article_base").hide();
    $('.autocomplete').autocomplete({
        source: function( req, res ) {
            var url = "{{route('api.articles.search')}}?not_on_category_top=true&category_id={{$category->id}}&title=" + encodeURIComponent(req.term);
            window.axios.get(url).then(response => {
                res($.map(response.data.data, function (article, key) {
                    return {
                        label: article.title,
                        value: article.title,
                        data: article,
                    };
                }));
            });            
        },
        select : function( event, selected ){
            var articleId = selected.item.data.id;
            var title = selected.item.data.title;
            var summary = selected.item.data.summary;
            $("#article_id").val(articleId);
            $("#title").text(title);
            if(selected.item.data.article_image){
                $("#article_image").attr('src', "{{route('storage')}}/"+selected.item.data.article_image.url);
            }else{
                $("#article_image").attr('src', "{{route('noImage')}}");
            }
            $("#article_base").show();
            $("#add-submit").attr('disabled', false);
        },
        autoFocus: true,
        minLength: 0
    });
});

var deletePick = ($articleId) => {
    $("#picked_"+$articleId).remove();
} ;

</script>

@endsection
