@extends('layouts.administrator_authed')

@section('content')
<h1>
    ピックアップ
</h1>
<div class="uk-margin">
    <div class="uk-card uk-card-default uk-card-small uk-flex-middle uk-grid-collapse" uk-grid>
        @if( count($articles) > 0 )
        <div class="uk-width-medium@s">
            <div class="uk-margin-small">
                <div class="uk-position-relative uk-visible-toggle uk-heght-small" uk-slideshow="animation: slide">
                    <ul class="uk-slideshow-items">
                        @foreach ($articles as $article)
                        <li>
                            <img src="@include('component.part.image', ['image' => $article->articleImage])" alt="" uk-cover>
                            <div class="uk-overlay uk-overlay-default uk-position-bottom uk-text-center uk-padding-small">
                                <h5 class="uk-margin-remove">
                                    {{$article->title}}
                                </h5>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
                    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
                </div>
            </div>
        </div>
        @endif
        <div class="uk-width-expand uk-card-body">
            <div class="uk-margin uk-text-center">
                <h2 class="uk-inline uk-margin-remove">
                    トップページ
                </h2>
                <span>
                    のピックアップ
                </span>
            </div>
            <div class="uk-margin uk-text-center">
                <a class="uk-button uk-button-primary" href="{{route('administrator.picks.all')}}">
                    ピックアップを編集
                </a>
            </div>
        </div>
    </div>
</div>

@foreach ($categories as $category)

<div class="uk-margin">
    <div class="uk-card uk-card-default uk-card-small uk-flex-middle uk-grid-collapse" uk-grid>
        @if( count($category->picks) > 0 )
        <div class="uk-width-medium@s">
            <div class="uk-margin-small">
                <div class="uk-position-relative uk-visible-toggle uk-heght-small" uk-slideshow="animation: slide">
                    <ul class="uk-slideshow-items">
                        @foreach ($category->picks as $article)
                        <li>
                            <img src="@include('component.part.image', ['image' => $article->articleImage])" alt="" uk-cover>
                            <div class="uk-overlay uk-overlay-default uk-position-bottom uk-text-center uk-padding-small">
                                <h5 class="uk-margin-remove">
                                    {{$article->title}}
                                </h5>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
                    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
                </div>
            </div>
        </div>
        @endif
        <div class="uk-width-expand uk-card-body">
            <div class="uk-margin uk-text-center">
                <h2 class="uk-inline uk-margin-remove">
                    {{$category->label}}
                </h2>
                <span>
                    のピックアップ
                </span>
            </div>
            <div class="uk-margin uk-text-center">
                <a class="uk-button uk-button-primary" href="{{route('administrator.picks.view', ['category' => $category])}}">
                    ピックアップを編集
                </a>
            </div>
        </div>
    </div>
</div>

    
@endforeach

@endsection
