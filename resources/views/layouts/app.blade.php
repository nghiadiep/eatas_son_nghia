<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    @if(config('services.tag-manager.id'))
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','{{config("services.tag-manager.id")}}');</script>
    <!-- End Google Tag Manager -->
    @endif

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="auth-type" content="{{ session('auth.type') }}">
    <meta name="auth-token" content="{{ session('auth.data.access_token') }}">
    <meta name="refresh-token" content="{{ session('auth.data.refresh_token') }}">

    <!-- OGP -->
    <meta property="og:title" content="@if(isset($title)){{ $title." | "}}@endif{{ config('app.name', 'Laravel') }}" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:site_name" content="{{ config('app.name', 'Laravel') }}" />
    <meta property="og:description" content="@if(isset($description)){{$description}}@else{{ config('app.description', '') }}@endif" />
    @if(isset($aritcle) && $aritcle->articleImage != null )
    <meta property="og:image" content="{{$article->articleImage->url}}" />
    @endif
    @if(isset($aritcle))
    <meta property="og:type" content="article" />
    @else
    <meta property="og:type" content="website" />
    @endif    

    <meta property="fb:app_id" content="{{config('app.social.facebook.app_id')}}" />

    <title>
        @if(isset($title)){{ $title." | "}}@endif{{ config('app.name', 'Laravel') }}
    </title>

    <meta name="description" content="@if(isset($description)){{$description}}@else{{ config('app.description', '') }}@endif">

    @yield('link')

    <link href="https://vjs.zencdn.net/6.6.3/video-js.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

</head>
<body>
    @if(config('services.tag-manager.id'))
    <noscript><iframe src="//www.googletagmanager.com/ns.html?id={{config('services.tag-manager.id')}}"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    @endif

    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId : {{config('app.social.facebook.app_id')}},
          autoLogAppEvents : true, xfbml : true, version : 'v2.12'
        });
      };
      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "https://connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
    </script>

    <div class="uk-offcanvas-content">
        <div class="base"> 
            @yield('base')
        </div>
        @include("layouts.footer")
    </div>

    <div class="uk-position-small uk-position-fixed uk-position-bottom-right uk-position-z-index">
        <a uk-scroll class="uk-icon-button">
            <span uk-icon="icon: triangle-up"></span>
        </a>
    </div>

    @if(isset($errors))
    <div class="uk-position-fixed uk-position-bottom-center uk-width-large@s">
    @foreach ($errors->all() as $message)
        <div class="uk-display-inline-block uk-width-1-1 uk-margin-small uk-alert-danger" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p>
                {{$message}}
            </p>
        </div>
    @endforeach
    </div>
    @endif

    <div id="loading-modal" class="uk-flex-top" uk-modal>
        <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical uk-text-center">
            アップロード中...
        </div>
    </div>
    
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

    <!-- uikit -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.38/js/uikit.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.38/js/uikit-icons.min.js"></script>

    <!-- lazy-load -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/layzr.js/2.0.2/layzr.min.js"></script>

    <!-- video js -->
    <script src="https://vjs.zencdn.net/6.6.3/video.js"></script>

    @yield('script')

    <!-- custom js -->
    <script src="{{ mix('js/app.js') }}"></script>

    @include("layouts.vue_mixin")

</body>
</html>
