<div class="uk-card uk-card-default uk-card-small uk-card-body">
    <h3>
        <a class="uk-link-reset" href="{{route('writer.mypage')}}">
        ライターメニュー
        </a>
    </h3>
    <ul class="uk-nav-default uk-nav-parent-icon" uk-nav="multiple: true">
        <li class="">
            <a href="{{route('writer.mypage')}}">
                <span uk-icon="icon: home"></span>
                トップページ
            </a>
        </li>
        <li class="uk-parent uk-open">
            <a href="#">
                <span uk-icon="icon: copy"></span>
                記事の管理
            </a>
            <ul class="uk-nav-sub">
                <li>
                    <a href="{{route('writer.articles.editings')}}">下書き中の記事</a>
                </li>
                <li>
                    <a href="{{route('writer.articles.waitings')}}">承認待ちの記事</a>
                </li>
                <li>
                    <a href="{{route('writer.articles')}}">記事検索</a>
                </li>
                <li>
                    <a href="{{route('writer.articles.add')}}">新規記事追加</a>
                </li>
            </ul>
        </li>
        <li class="uk-parent uk-open">
            <a href="#">
                <span uk-icon="icon: cog"></span>
                設定
            </a>
            <ul class="uk-nav-sub">
                <li>
                    <a href="{{route('writer.edit')}}">ライター情報の編集</a>
                </li>
            </ul>
        </li>
    </ul>
</div>