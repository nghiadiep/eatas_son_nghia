@inject('constantService', 'App\Services\ConstantService')

<div class="uk-grid-small uk-child-width-auto uk-grid">
    @foreach ($constantService->getArticleStatus() as $status)
        @if(isset($value) && $value==$status->id )
            <label>
                <input class="uk-radio" type="radio" name="{{isset($name) ? $name: 'article_status_id'}}" checked value="{{$status->id}}">
                {{$status->label}}
            </label>
        @else
            <label>
                <input class="uk-radio" type="radio" name="{{isset($name) ? $name: 'article_status_id'}}" value="{{$status->id}}">
                {{$status->label}}
            </label>
        @endif
    @endforeach
</div>