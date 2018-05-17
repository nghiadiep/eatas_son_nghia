<div class="sidebar">
    <div class="sidebar__box">
        <div class="sidebar-point">
            <div class="sidebar-point__header"><p>○○○さん</p><p>現在のポイント数：○○ポイント</p></div>
            <div class="sidebar-point__button"><a href="#" class="btn-point">ポイント獲得/利用履歴</a></div>
        </div>
    </div>
    <div class="sidebar__box sidebar-menu">
        <ul>
            <li>
                <a href="{{route('user.inquiries')}}" title="資料請求履歴">資料請求履歴</a>
            </li>
            <li>
                <a href="{{route('user.stocks')}}" title="本棚を見る">本棚を見る</a>
            </li>
            <li>
                <a href="{{route('user.clips')}}" title="あとで読むを見る">あとで読むを見る</a>
            </li>
            <li>
                <a href="{{route('user.edit')}}" title="会員情報確認・編集">会員情報確認・編集</a>
            </li>
            <li>
                <form action="{{route('user.logout')}}" method="POST">
                    {{ csrf_field() }}
                    <button title="ログアウト">ログアウト</button>
                </form>
            </li>
            <li>
                <a href="{{route('contact.add')}}" title="お問い合わせ">お問い合わせ</a>
            </li>
        </ul>
    </div>
    <div class="sidebar__box">
        <div class="sidebar-usage-eatas">
            <a href="#">
                <span class="sidebar-usage-eatas__title">EATAS活用方法を見る</span>
                <span class="sidebar-usage-eatas__txt">EATASをビジネスに活かす<br>方法を簡単にご説明します。</span>
            </a>
        </div>
    </div>
    <div class="sidebar__box sidebar-ads">
        <ul>
            <li><a href=""><img src="{{asset('images/sidebar_ads.png')}}" alt=""></a></li>
            <li><a href=""><img src="{{asset('images/sidebar_ads.png')}}" alt=""></a></li>
            <li><a href=""><img src="{{asset('images/sidebar_ads.png')}}" alt=""></a></li>
        </ul>
    </div>
</div>
