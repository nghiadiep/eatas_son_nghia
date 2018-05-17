<div class="uk-card uk-card-default uk-card-small uk-card-body">
    <h3>
        <a class="uk-link-reset" href="{{route('administrator.mypage')}}">
        管理者メニュー
        </a>
    </h3>
    <ul class="uk-nav-default uk-nav-parent-icon" uk-nav="multiple: true">
        <li class="">
            <a href="{{route('administrator.mypage')}}">
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
                    <a href="#">
                        ステータス別一覧
                    </a>
                    <ul class="uk-nav-sub">
                        <li>
                            <a href="{{route('administrator.articles.editings')}}">
                            下書き</a>
                        </li>
                        <li>
                            <a href="{{route('administrator.articles.approval')}}">
                            承認待ち</a>
                        </li>
                        <li>
                            <a href="{{route('administrator.articles.waitings')}}">
                            公開待ち</a>
                        </li>
                        <li>
                            <a href="{{route('administrator.articles.opens')}}">
                            会員・一般公開中</a>
                        </li>
                        <li>
                            <a href="{{route('administrator.articles.closes')}}">
                            公開終了・非公開</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('administrator.articles')}}">記事検索・編集</a>
                </li>
                <li>
                    <a href="{{route('administrator.articles.add')}}">新規記事追加</a>
                </li>
                <li>
                    <a href="{{route('administrator.picks')}}">ピックアップ</a>
                </li>
            </ul>
        </li>
        <li class="uk-parent uk-open">
            <a href="#">
                <span uk-icon="icon: thumbnails"></span>
                広告の管理
            </a>
            <ul class="uk-nav-sub">
                <li>
                    <a href="{{route('administrator.advertisers')}}">
                        広告主の管理
                    </a>
                </li>
                <li>
                    <a href="{{route('administrator.products')}}">商材一覧・編集</a>
                </li>
            </ul>
        </li>
        <li class="">
             <a href="{{route('administrator.notices')}}">
                <span uk-icon="icon: info"></span>
                お知らせの設定
            </a>
        </li>
        <li class="uk-parent uk-open">
            <a href="#">
                <span uk-icon="icon: cog"></span>
                設定
            </a>
            <ul class="uk-nav-sub">
                <li>
                    <a href="{{route('administrator.edit')}}">管理者情報の編集</a>
                </li>
                <li class="">
                    <a href="{{route('administrator.administrators')}}">
                        管理者の管理
                    </a>
                </li>
                <li class="">
                    <a href="{{route('administrator.writers')}}">
                        ライターの管理
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>