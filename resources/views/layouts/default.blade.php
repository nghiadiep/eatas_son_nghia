@inject('categoryService', 'App\Services\CategoryService')
@extends('layouts.app')

@section('base')

<nav class="uk-navbar-container uk-navbar-transparent uk-overlay-default" uk-navbar uk-sticky="show-on-up: true">
    <div class="uk-navbar-center">
        <div class="uk-navbar-center-left uk-visible@m">
            <div>
                <ul class="uk-navbar-nav">
                    <li>
                        <a href="{{route('articles.index')}}">
                            新着記事
                        </a>
                    </li>
                    <li>
                        <a href="#">カテゴリを選ぶ</a>
                        <div class="uk-navbar-dropdown">
                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                @foreach($categoryService->getAll() as $category )
                                    <li>
                                        <a href="{{route('categories.view', ['category' => $category])}}">
                                            {{$category->label}}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <a class="uk-navbar-item uk-logo" href="{{route('root.index')}}">
            @component('cell.logo')@endcomponent
        </a>

        <div class="uk-navbar-center-right uk-visible@m">
            <div>
                <ul class="uk-navbar-nav">
                    <li><a href="{{route('articles.search')}}">記事検索</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="uk-navbar-right">
        @guest('user')
            <div class="uk-navbar-item uk-visible@m">
                <a class="uk-button uk-button-primary" href="{{ route('user.intro') }}">
                    新規会員登録
                </a>
                <a class="uk-button uk-button-default" href="{{ route('user.login') }}">
                    ログイン
                </a>
            </div>
        @endguest
        @auth('user')
            <ul class="uk-navbar-nav uk-visible@m">
                <li>
                    <a href="#">
                        <span class="uk-icon-button uk-button-primary uk-margin-small-right" uk-icon="icon: user"></span>
                        {{Auth::user()->nickname}}
                    </a>
                    <div class="uk-navbar-dropdown uk-navbar-dropdown-width-2">
                        <div class="uk-navbar-dropdown-grid uk-child-width-1-2" uk-grid>
                            <div>
                                <div class="uk-margin">
                                    <a class="uk-button uk-button-default uk-width-1-1" href="{{ route('user.unfavorites') }}">
                                        Favorite一覧
                                    </a>
                                </div>
                                <div class="uk-margin">
                                    <a class="uk-button uk-button-default uk-width-1-1" href="{{ route('user.stocks') }}">
                                        STOCK一覧
                                    </a>
                                </div>
                                <div class="uk-margin">
                                    <a class="uk-button uk-button-default uk-width-1-1" href="{{ route('user.clips') }}">
                                        あとで読む一覧
                                    </a>
                                </div>
                                <div class="uk-margin">
                                    <a class="uk-button uk-button-default uk-width-1-1" href="{{ route('user.inquiries') }}">
                                        資料請求一覧
                                    </a>
                                </div>
                            </div>
                            <div>
                                <div class="uk-margin">
                                    <a class="uk-button uk-button-default uk-width-1-1" href="{{ route('user.edit') }}">
                                        個人設定
                                    </a>
                                </div>
                                <div class="uk-margin">
                                    <form action="{{route('user.logout')}}" method="POST">
                                        {{ csrf_field() }}
                                        <button class="uk-button uk-button-text uk-width-1-1">ログアウト</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        @endauth
        <ul class="uk-navbar-nav uk-hidden@m">
            <li>
                <div class="uk-navbar-item">
                @guest('user')
                    <a href="#" class="uk-link-reset" uk-toggle="target: #menu-offcanvas;">
                        <span uk-navbar-toggle-icon></span>
                    </a>
                @endguest
                @auth('user')
                    <a href="#" class="uk-icon-button uk-button-primary" uk-toggle="target: #menu-offcanvas;">
                        <span uk-icon="icon: user"></span>
                    </a>
                @endauth
                </div>
            </li>
        </ul>
    </div>
</nav>

<div id="menu-offcanvas" uk-offcanvas="overlay: true;flip: true;">
    <div class="uk-offcanvas-bar">
        <div class="uk-margin">
            <h4 class="uk-margin-small">
                カテゴリ
            </h4>
            @foreach($categoryService->getAll() as $category )
            <div class="uk-margin-small">
                <a class="uk-button uk-button-text uk-width-1-1" href="{{ route('categories.view', ['category' => $category]) }}">
                    {{$category->label}}
                </a>
            </div>
            @endforeach
        </div>
        <div class="uk-margin">
            <div class="uk-margin-small">
                <a class="uk-button uk-button-default uk-width-1-1" href="{{ route('articles.search') }}">
                    記事を検索
                </a>
            </div>
            <div class="uk-margin-small">
                <a class="uk-button uk-button-default uk-width-1-1" href="{{route('articles.index')}}">
                    新着記事
                </a>
            </div>
        </div>
        <hr/>
        @guest
        <div class="uk-margin">
            <div class="uk-margin-small">
                <a class="uk-button uk-button-default uk-width-1-1" href="{{ route('user.intro') }}">
                    新規会員登録
                </a>
            </div>
            <div class="uk-margin-small">
                <a class="uk-button uk-button-text uk-width-1-1" href="{{ route('user.login') }}">
                    ログイン
                </a>
            </div>
        </div>
        @else
        <div class="uk-margin">
            <div class="uk-margin-small">
                <a class="uk-button uk-button-default uk-width-1-1" href="{{ route('user.unfavorites') }}">
                    Favorite一覧
                </a>
            </div>
            <div class="uk-margin-small">
                <a class="uk-button uk-button-default uk-width-1-1" href="{{ route('user.stocks') }}">
                    STOCK一覧
                </a>
            </div>
            <div class="uk-margin-small">
                <a class="uk-button uk-button-default uk-width-1-1" href="{{ route('user.clips') }}">
                    あとで読む一覧
                </a>
            </div>
            <div class="uk-margin-small">
                <a class="uk-button uk-button-default uk-width-1-1" href="{{ route('user.inquiries') }}">
                    資料請求一覧
                </a>
            </div>
            <hr/>
            <div class="uk-margin-small">
                <a class="uk-button uk-button-text uk-width-1-1" href="{{ route('user.edit') }}">
                    個人設定
                </a>
            </div>
            <div class="uk-margin-small">
                <a class="uk-button uk-button-text uk-width-1-1" href="{{ route('user.logout') }}">
                    ログアウト
                </a>
            </div>
        </div>
        @endguest
        <div class="uk-margin">
            <a class="uk-button uk-button-text uk-width-1-1" href="{{ route('contact.add') }}">
                お問い合わせ
            </a>
        </div>
    </div>
</div>

@yield('content')

<div class="uk-position-small uk-position-fixed uk-position-bottom-left uk-position-z-index uk-hidden@s">
    <a href="tel:{{config('app.company_tel')}}" class="uk-button uk-button-danger" style="opacity: 0.8;">
        <span uk-icon="icon: whatsapp"></span>
        {{config('app.company_tel')}}
    </a>
</div>

@endsection
