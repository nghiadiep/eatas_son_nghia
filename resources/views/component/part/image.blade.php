@if(isset($image))
    @imageUrl($image->url)
@else
    {{route('noImage')}}
@endif