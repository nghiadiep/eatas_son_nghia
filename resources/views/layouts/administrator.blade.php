@extends('layouts.app')

@section('base')

<nav class="uk-navbar-container uk-navbar-transparent uk-overlay-default" uk-navbar uk-sticky>
    <div class="uk-navbar-left">
        <a class="uk-navbar-item uk-logo" href="{{route('administrator.mypage')}}">
            @component('cell.logo')
            @endcomponent
        </a>
        管理ページ
    </div>
    <div class="uk-navbar-right">
        @guest
            <div class="uk-navbar-item uk-visible@s">
                <a class="uk-button uk-button-primary" href="{{ route('administrator.login') }}">
                    ログイン
                </a>
            </div>
        @else
            <div class="uk-navbar-item uk-visible@s">
                <a class="uk-button uk-button-primary" href="{{ route('administrator.mypage') }}">
                    管理ページトップ
                </a>
                <a class="uk-button uk-button-default" href="{{ route('administrator.logout') }}">
                    ログアウト
                </a>
            </div>
        @endguest
        <ul class="uk-navbar-nav uk-hidden@s">
            <li>
                <a href="#" uk-toggle="target: #menu-offcanvas;">
                    <span uk-navbar-toggle-icon></span>
                </a>
            </li>
        </ul>
    </div>
</nav>

<div id="menu-offcanvas" uk-offcanvas="overlay: true;flip: true;">
    <div class="uk-offcanvas-bar">
        @guest
            <div class="uk-margin">
                <div class="uk-margin-small">
                    <a class="uk-button uk-button-text uk-width-1-1" href="{{ route('administrator.login') }}">
                        ログイン
                    </a>
                </div>
            </div>
        @else
            <div class="uk-margin">
                <div class="uk-margin-small">
                    <a class="uk-button uk-button-default uk-width-1-1" href="{{ route('administrator.mypage') }}">
                        管理ページトップ
                    </a>
                </div>
                <div class="uk-margin-small">
                    <a class="uk-button uk-button-text uk-width-1-1" href="{{ route('administrator.logout') }}">
                        ログアウト
                    </a>
                </div>
            </div>
        @endguest
    </div>
</div>


@yield('content')

@endsection


@section('link')


    <!-- jquery-ui -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.min.css">

    <!-- datepicker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.14/jquery.datetimepicker.min.css">


    <!-- taginput -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-tagsinput/1.3.6/jquery.tagsinput.min.css" />

    <!-- quill -->
    <link href="{{ asset('lib/quill/quill.snow.css') }}" rel="stylesheet">

@endsection

@section('script')
    <!-- jquery-ui -->
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <!-- datepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.14/jquery.datetimepicker.full.min.js"></script>

    <!-- table sort -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.29.0/js/jquery.tablesorter.min.js"></script>

    <!-- taginput -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-tagsinput/1.3.6/jquery.tagsinput.min.js"></script>

    <!-- quill -->
    <script src="{{ asset('lib/quill/quill.min.js') }}"></script>

@endsection
