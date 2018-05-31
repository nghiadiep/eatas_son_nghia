<footer class="footer">
    <div class="sp">
        <div id="footer-control" class="footer__top">
            <div class="container">
                <a onclick="scrollToTop()" class="btn-page-top">
                    <i class="fa fa-angle-up" aria-hidden="true"></i>
                </a>
                <div class="footer-row clearfix">
                    <div class="footer-tel">
                        <a class="footer__top__btn-tel" href="tel:{{ config('app.company_tel') }}">{{ config('app.company_tel') }}</a>
                    </div>
                    <ul class="footer-social">
                        <li class="icon-facebook"><a href="#" title="Facebook"><img src="{{ asset('images/icon_facebook_sp.png') }}" alt="Facebook"></a></li>
                        <li class="icon-twitter"><a href="#" title="Twitter"><img src="{{ asset('images/icon_twitter_sp.png') }}" alt="Twitter"></a></li>
                        <li class="icon-hatena"><a href="#" title="Hatena"><img src="{{ asset('images/icon_hatena_sp.png') }}" alt="Hatena"></a></li>
                        <li class="icon-line"><a href="#" title="Line"><img src="{{ asset('images/icon_line_sp.png') }}" alt="Line"></a></li>
                    </ul>
                    <div class="footer-link">
                        <ul>
                            <li><a href="https://eatas.co.jp" target="_blank">運営会社</a></li>
                            <li><a href="https://glug.co.jp/privacy.php" target="_blank">プライバシーポリシー</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.footer__top-->
        <div class="footer__bottom">
            <div class="container">
                <p>Copyright&copy; 2017 EATAS, Inc. All Rights Reserved.</p>
            </div>
            <!--/.container-->
        </div>
        <!--/.footer__bottom-->
    </div>
    <div class="pc">
        <div class="container">
        <div class="footer__top top">
            <div class="table">
                <div class="top__logo">
                    <a href="">
                        <img src="{{ asset('images/logo_footer_pc.png') }}" alt="EATAS">
                    </a>
                </div>
                <div class="top__menu">
                    <div class="clearfix">
                        <ul>
                            <li><a href="{{ route('root.faq') }}">良くある質問</a></li>
                            <li>｜</li>
                            <li><a href="{{ route('contact.add') }}">お問い合わせ</a></li>
                            <li>｜</li>
                            <li><a href="https://eatas.co.jp/">運営会社</a></li>
                            <li>｜</li>
                            <li><a href="https://eatas.jp/term">利用規約</a></li>
                            <li>｜</li>
                            <li><a href="https://glug.co.jp/privacy.php">プライバシーポリシー</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__bottom bottom">
            <div class="table">
                <div class="bottom__copyright">
                    <p>Copyright© 2017EATAS Co., Ltd. All Rights Reserved.</p>
                </div>
                <div class="bottom__social">
                    <div class="clearfix">
                        <ul>
                            <li class="icon-facebook"><a href="#" title="Facebook"><img src="{{ asset('images/icon_facebook.png') }}" alt="Facebook"></a></li>
                            <li class="icon-twitter"><a href="#" title="Twitter"><img src="{{ asset('images/icon_twitter.png') }}" alt="Twitter"></a></li>
                            <li class="icon-hatena"><a href="#" title="Hatena"><img src="{{ asset('images/icon_hatena.png') }}" alt="Hatena"></a></li>
                            <li class="icon-line"><a href="#" title="Line"><img src="{{ asset('images/icon_line.png') }}" alt="Line"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer__top-button">
            <div>
                <a href="#">
                    <i class="fa fa-angle-up"></i>
                </a>
            </div>
        </div>
    </div>
    </div>
</footer>