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
                        <li><a href=""><i class="fa fa-facebook-square"></i></a></li>
                        <li><a href=""><i class="fa fa-twitter-square"></i></a></li>
                        <li><a href=""><i class="fa fa-instagram"></i></a></li>
                    </ul>
                    <div class="footer-link">
                        <ul>
                            <li><a href="">運営会社</a></li>
                            <li><a href="">プライバシーポリシー</a></li>
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
                            <li><a href="#">良くある質問</a></li>
                            <li>｜</li>
                            <li><a href="#">お問い合わせ</a></li>
                            <li>｜</li>
                            <li><a href="#">運営会社</a></li>
                            <li>｜</li>
                            <li><a href="#">利用規約</a></li>
                            <li>｜</li>
                            <li><a href="#">プライバシーポリシー</a></li>
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
                            <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                            <li><a href="#"><i class="fa fa-hatena"></i></a></li>
                            <li><a href="#"><i class="fab fa-line"></i></a></li>
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