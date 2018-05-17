@php
if(!isset($shareUrl)){
    $shareUrl = route("articles.view", ["article" => $article]);
}
$lineUrl = "line://msg/text/?「".$article->title."」".$shareUrl;
@endphp

<ul class="text-right">
    <li>
        <a onclick="shareToLine('{{$shareUrl}}', '{{$article->title}}')" title="Line">
            <img src="{{asset('images/ico_social/icon-line.png')}}" alt="">
        </a>
    </li>
    <li>
        <a onclick="shareToTwitter('{{$shareUrl}}', '{{$article->title}}')" title="Twitter" target="_blank">
            <img src="{{asset('images/ico_social/icon-twitter.png')}}" alt="">
        </a>
    </li>
    <li>
        <a onclick="shereToFacebock('{{$shareUrl}}')" title="Facebook" target="_blank">
            <img src="{{asset('images/ico_social/icon-facebook.png')}}" alt="">
        </a>
    </li>
    <li>
        <a onclick="shareToHatena('{{$shareUrl}}')" title="Hatena" target="_blank">
            <img src="{{asset('images/ico_social/icon_hatena.png')}}" alt="">
        </a>
    </li>
</ul>