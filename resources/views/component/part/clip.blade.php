<article class="uk-card uk-card-default uk-card-small uk-grid-collapse uk-grid-match" uk-grid>
    <div class="uk-card-media-left">
        <a class="uk-link-reset" href="{{route('articles.view', ['article' => $clip->article])}}" target="_blank">
            <div class="uk-width-small uk-height-1-1 image-wrapper">
                <img src="@include('component.part.image', ['image'=> $clip->article->articleImage])" alt="" uk-cover>
            </div>
        </a>

        <div class="uk-position-bottom-left">
            <a class="uk-button uk-button-small uk-button-danger" href="{{route('user.clips.delete', ['clip' => $clip->id])}}" uk-icon="icon: trash">
            </a>
        </div>
    </div>
    <div class="uk-width-expand">
        <div class="uk-card-body">
            <a class="uk-link-reset" href="{{route('articles.view', ['article' => $clip->article])}}" target="_blank">
                <h3 class="uk-margin-remove">
                    {{$clip->article->title}}
                </h3>
                <div class="uk-grid-collapse" uk-grid>
                    <div class="uk-width-expand">
                        {{$clip->article->category->label}}
                    </div>
                    <div class="uk-width-auto">
                        <time datetime="{{$clip->article->publish_date}}">
                            @date($clip->article->publish_date)
                        </time>
                    </div>
                </div>
            </a>
        </div>
    </div>
</article>