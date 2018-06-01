@inject("categoryService", App\Services\CategoryService)
@inject("tagService", App\Services\TagService)
<header class="header">
    <div class="pc">
        <input id="modal-search-input-pc" type="checkbox" class="nav-unshown" data-toggle="nav-mod-search">
        <div class="wrapper_fixed">
            <div class="header__top top">
                <div class="container">
                    <div class="wrapper">
                        <div class="top__slogan">
                            <p>飲食店成功のカギに出会えるサイト</p>
                        </div>
                        <div class="top__quick-help">
                            <ul>
                                <li>
                                    <a href="">
                                        <img src="{{asset('images/icon_bookmark.png')}}" alt="bookmark">
                                        <span>ご利用ガイド</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="fa fa-envelope"></i>
                                        <span>お問い合わせ</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('root.faq')}}">
                                        <i class="fa fa-question-circle"></i>
                                        <span>良くある質問</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .header_top END -->
            <div class="header__middle middle">
                <div class="container">
                    <div class="wrapper">
                        <div class="middle__search search">
                            <div class="search__logo">
                                <a href="{{route('root.index')}}"><img src="{{asset('images/logo_pc.png')}}" alt="EATAS"></a>
                            </div>
                            <div class="search__search-container">
                                <input type="text" name="search-word" id="search-word">
                                <label for="modal-search-input-pc"><div class="drop-down"><span>詳細検索</span> <i class="fa fa-sort-down"></i></div></label>
                            </div>
                            <div class="search__search-button-container">
                                <div class="outer"><a href="">
                                    <img src="{{asset('images/btn_search_pc.png')}}" alt="Search button">
                                </a></div>
                            </div>
                        </div>
                        <div class="middle__contact contact clearfix">
                            <div class="contact__container">
                                <p class="mobile-number">
                                    <i class="fa fa-mobile"></i>
                                    <span>03-5797-7760</span>
                                </p>
                                <p class="title">電話でお問合わせ</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .header_middle END -->
            <div class="header__bottom bottom">
                <div class="container">
                        <div class="wrapper">
                            <p>
                                <span>検索ワード：</span>
                                <a href=""><span class="tag">インバウンド</span></a>
                                <a href=""><span class="tag">豆知識</span></a>
                                <a href=""><span class="tag">採用</span></a>
                                <a href=""><span class="tag">集客</span></a>
                                <a href=""><span class="tag">接客</span></a>
                                <a href=""><span class="tag">オーダーシステム</span></a>
                            </p>
                        </div>
                </div>
            </div>
            <!-- .header-bottom END -->
        </div>
        <label class="modal-search-close" for="modal-search-input-pc"></label>
        <div class="modal-search-pc">
            <div class="modal-search-pc__inner">
                <form action="{{route('articles.search')}}" method="GET">
                    
                    <section>
                        <h2 class="modal-search-pc__title">
                            <span>詳細検索</span>
                        </h2>
                        <div class="modal-search-pc__form-group">
                            <h3 class="modal-search-pc__sub-title">
                                <span>カテゴリ検索</span>
                            </h3>
                            <ul class="modal-search-pc__input-list clearfix">
                                @foreach( $categoryService->getAll() as $category )
                                <li>
                                    <label>
                                        <input type="checkbox" name="category_id[]" value="{{$category->id}}">
                                        <span>
                                            {{$category->label}}
                                        </span>
                                    </label>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="modal-search-pc__form-group">
                            <h3 class="modal-search-pc__sub-title">
                                <span>タグ検索</span>
                            </h3>
                            <ul class="modal-search-pc__radio">
                                <li>
                                    <label>
                                        <input type="radio" name="order" value="latest" checked="checked">
                                        <span>新着順</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="order" value="stock">
                                        <span>本棚数が多い順</span>
                                    </label>
                                </li>
                            </ul>
                            <ul class="modal-search-pc__input-list clearfix">
                                @foreach($tagService->getFamous(9) as $tag)
                                <li>
                                    <label>
                                        <input type="checkbox" name="tag_id[]" value="{{$tag->id}}">
                                        <span>
                                            {{$tag->label}}
                                        </span>
                                    </label>
                                </li>
                                @endforeach
                            </ul>
                            <button class="modal-search-pc__btn-search">検索する</button>
                        </div>
                    </section>
                </form>
                <!--/form-->
            </div>
            <!--/.modal-search__inner-->
        </div>
        <!--/.mod-search-->
    </div>
    <div class="sp">
        <input id="nav-input" type="checkbox" class="nav-unshown" data-toggle="nav-menu-toggle">
    <input id="modal-search-input" type="checkbox" class="nav-unshown" data-toggle="nav-mod-search">
    <div class="header__middle">
        <div class="header__middle__container">
            <div class="clearfix">
                <div class="header__middle__container__btn-menu">
                    <div class="header__middle__container__btn-menu__icon">
                        <label id="nav-open" for="nav-input">
                            <span></span>
                            <span></span>
                            <span></span>
                        </label>
                    </div>
                    <!--/.header__middle__container__btn-menu__icon-->
                    <label for="nav-input">メニュー</label>
                </div>
                <!--/.header__middle__container__btn-menu-->
                <div class="header__middle__container__btn-search">
                    <label for="modal-search-input">
                        <img src="{{asset('images/btn_search.png')}}" alt="EATAS">
                    </label>
                </div>
                <!--/.header__middle__container__btn-search-->
                <div class="header__middle__container__logo">
                    <a href="{{route('root.index')}}">
                        <img src="{{asset('images/logo_sp.png')}}" alt="EATAS">
                    </a>
                </div>
                <!--/.header__middle__container__logo-->
                <div class="header__middle__container__btn-user">
                    <a data-fancybox="modalLogin" data-src="#modalLogin" href="#">ログイン</a>
                </div>
                <!--/.header__middle__container_btn-user-->
            </div>
        </div>
        <!--/.header__middle__container-->
    </div>
    <!--/.header__middle-->
    <label class="nav-close" for="nav-input"></label>
    <div class="nav-header-menu">
        <ul>
            <li>
                <a onclick="onAuthedAction()">あとで読む一覧</a>
            </li>
            <li>
                <a onclick="onAuthedAction()">本棚を見る</a>
            </li>
            <li>
                <a href="{{route('root.faq')}}">良くある質問</a>
            </li>
            <li>
                <a href="{{route('contact.add')}}">お問い合わせ</a>
            </li>
            <li>
                <a href="{{route('root.notices')}}">お知らせ</a>
            </li>
        </ul>
    </div>
    <!--/.nav-header-menu-->
    <label class="modal-search-close" for="modal-search-input"></label>
    <div class="modal-search">
        <div class="modal-search__inner">
            <form action="{{route('articles.search')}}" method="GET">
                <div class="modal-search__form-group01">
                    <input type="text" name="freeword" placeholder="検索する言葉" class="search-words" value="">
                    <button class="modal-search__btn-search">検索する</button>
                </div>
                <section>
                    <h2 class="modal-search__title">
                        <span>詳細検索</span>
                    </h2>
                    <div class="modal-search__form-group">
                        <h3 class="modal-search__sub-title">
                            <span>カテゴリ検索</span>
                        </h3>
                        <ul class="modal-search__input-list clearfix">
                            @foreach( $categoryService->getAll() as $category )
                            <li>
                                <label>
                                    <input type="checkbox" name="category_id[]" value="{{$category->id}}">
                                    <span>
                                        {{$category->label}}
                                    </span>
                                </label>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="modal-search__form-group">
                        <h3 class="modal-search__sub-title">
                            <span>タグ検索</span>
                        </h3>
                        <ul class="modal-search__radio">
                            <li>
                                <label>
                                    <input type="radio" name="order" value="latest" checked="checked">
                                    <span>新着順</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio" name="order" value="stock">
                                    <span>本棚数が多い順</span>
                                </label>
                            </li>
                        </ul>
                        <ul class="modal-search__input-list clearfix">
                            @foreach($tagService->getFamous(9) as $tag)
                            <li>
                                <label>
                                    <input type="checkbox" name="tag_id[]" value="{{$tag->id}}">
                                    <span>
                                        {{$tag->label}}
                                    </span>
                                </label>
                            </li>
                            @endforeach
                        </ul>
                        <button class="modal-search__btn-search">検索する</button>
                    </div>
                </section>
            </form>
            <!--/form-->
        </div>
        <!--/.modal-search__inner-->
    </div>
    <!--/.mod-search-->
    </div>
</header>

