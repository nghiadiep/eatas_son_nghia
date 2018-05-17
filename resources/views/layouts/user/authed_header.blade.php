@inject("categoryService", App\Services\CategoryService)
@inject("tagService", App\Services\TagService)

<header class="header">
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
                <div class="header__middle__container__btn-user-active">
                    <a href="{{route('user.mypage')}}">マイページ</a>
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
                <a href="{{route('user.clips')}}">あとで読む一覧</a>
            </li>
            <li>
                <a href="{{route('user.stocks')}}">本棚を見る</a>
            </li>
            <li>
                <a href="{{route('root.faq')}}">よくある質問</a>
            </li>
            <li>
                <a href="{{route('contact.add')}}">お問い合わせ</a>
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
                                    <input type="radio" name="order" value="latest" checked="checked" >
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
</header>