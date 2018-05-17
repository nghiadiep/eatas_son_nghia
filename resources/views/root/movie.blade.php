<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://vjs.zencdn.net/6.6.3/video-js.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <!-- video js -->
    <script src="https://vjs.zencdn.net/6.6.3/video.js"></script>
</head>
<body>

    <video id="video" class="video-js vjs-default-skin" style="width:100%; height:400px;" controls preload="none">
        @if($blobUrl != null)
        <source src="{{$blobUrl}}" type="application/x-mpegURL" />    
        @endif
        <source src="{{$url}}" type="application/x-mpegURL" />
    </video>


    <script src="{{ asset('lib/videojs/videojs-contrib-media-sources.min.js') }}"></script>
    <script src="{{ asset('lib/videojs/videojs-contrib-hls.min.js') }}"></script>

    <!-- custom js -->
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            var video = document.querySelector("video");
            var player = videojs(video);
            player.play();
        });
    </script>

</body>
</html>
