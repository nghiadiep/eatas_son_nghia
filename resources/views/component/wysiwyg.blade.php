<div class="block-art-detail">
    <div class="uk-height-large editor">
        {!! $value !!}
    </div>
    <input type="hidden" name="{{isset($name)? $name: 'sentence'}}" value="{{$value}}">
</div>

<script type="text/javascript">

@php
if(isset($articleId)){
    $urlKey = "?article_id=".$articleId;
}else{
    $urlKey = "?hash=".csrf_token();
}
@endphp

@auth("administrator")
var imageUploadUrl = "{{route('api.administrator.content_images.add')}}{{$urlKey}}";
var imageDeleteUrl = "{{route('api.administrator.content_images.delete')}}";
var movieUploadUrl = "{{route('api.administrator.content_movies.get')}}{{$urlKey}}";
var movieDeleteUrl = "{{route('api.administrator.content_movies.delete')}}";
@endauth

@auth("writer")
var imageUploadUrl = "{{route('api.writer.content_images.add')}}{{$urlKey}}";
var imageDeleteUrl = "{{route('api.writer.content_images.delete')}}";
var movieUploadUrl = "{{route('api.writer.content_movies.get')}}{{$urlKey}}";
var movieDeleteUrl = "{{route('api.writer.content_movies.delete')}}";
@endauth

</script>