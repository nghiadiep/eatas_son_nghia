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
    <meta property="og:title" content="@if(isset($title)){{ $title." | "}}@endif{{ config('app.name', 'EATAS') }}" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:site_name" content="{{ config('app.name', 'EATAS') }}" />
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
        @if(isset($title)){{ $title." | "}}@endif{{ config('app.name', 'EATAS') }}
    </title>

    <meta name="description" content="@if(isset($description)){{$description}}@else{{ config('app.description', '') }}@endif">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <link href="{{ mix('css/user.css') }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">

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


    <div class="wrapper">
            
        @auth('user')
        @include("layouts.user.authed_header")
        @else
        @include("layouts.user.header")
        @endauth
        <main class="main">
            <div class="main__content">
                @yield("content")
            </div>
            <!--/.main__content-->
        </main>
        <!--/.main-->
        
        <!--/.footer-->
        @include("layouts.user.footer")
        <!--.modal-search-->
    </div>

    @include("layouts.user.modal")

    <script src="https://www.promisejs.org/polyfills/promise-6.1.0.min.js"></script>

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>

    <script type="text/javascript">
        $('input[data-toggle="nav-mod-search"]').prop('checked',false);
        $('input[data-toggle="nav-menu-toggle"]').prop('checked',false);
    </script>

    <!-- custom js -->
    <script src="{{ mix('js/user.js') }}"></script>

    <!-- custom js -->
    <script src="{{ mix('js/app.js') }}"></script>

    @include("layouts.vue_mixin")

    @if(isset($errors)  && $errors->has('auth'))
    <script>
        $.fancybox.open({
            src  : '#modalLogin',type : 'inline'
        });
    </script>
    @endif
</body>
</html>
