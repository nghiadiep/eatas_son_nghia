<div class="uk-card uk-card-default uk-card-small uk-grid-collapse  uk-flex-middle" uk-grid>
    @if( count($category->picks) > 0 )
    <div class="uk-card-media-left uk-cover-container uk-width-1-2">
        <a class="uk-link-reset" href="{{route('categories.view', ['category' => $category])}}">
            <div class="uk-position-relative uk-visible-toggle" uk-slideshow="animation: slide">
                <ul class="uk-slideshow-items">
                    @foreach($category->picks as $top)
                    <li>
                        <img src="@include('component.part.image', ['image'=> $top->articleImage])" alt="" uk-cover>
                        <div class="uk-overlay uk-overlay-default uk-position-bottom uk-text-center uk-padding-small">
                            <h5 class="uk-margin-remove">
                                {{$top->title}}
                            </h5>
                        </div>
                    </li>
                    @endforeach
                </ul>
                <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
                <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
            </div>
        </a>
    </div>
    @endif
    <div class="uk-width-expand">
        <div class="uk-card-body">
            <a class="uk-link-reset" href="{{route('categories.view', ['category' => $category])}}">
                <h3 class="uk-margin-remove uk-text-center">
                    {{$category->label}}
                </h3>
            </a>
            @if(isset($category->myFavorite))
            <div class="uk-margin-small">
                <a class="uk-button uk-button-primary uk-button-small uk-width-1-1" href="{{route('user.unfavorites.delete', ['unfavorite' => $category->myFavorite])}}">
                    Favoriteに追加
                </a>
            </div>
            @else
            <div class="uk-margin-small">
                <form action="{{route('user.unfavorites.add')}}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="category_id" value="{{$category->id}}">
                    <button class="uk-button uk-button-default uk-button-small uk-width-1-1" type="submit">
                        Favoriteを解除
                    </button>    
                </form>
            </div>
            @endif
        </div>
    </div>
</div>