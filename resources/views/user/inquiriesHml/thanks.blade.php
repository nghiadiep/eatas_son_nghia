@extends('layouts.user.default')

@section('content')

<h2 class="page-title mb18-ipt">資料請求</h2>
<div class="content-center">
    <div class="block-form document-request-page">
        <p class="block-form__notice mt18 mb24-ipt">
             資料を請求しました。<br class="sp">下記よりご確認ください。
        </p>
        <section>
            <h2 class="title-center">
                <span>お届けする資料</span>
            </h2>
            <div class="item-box-list item-box--requesthistory pb00-ipt">
                <ul>
                    <li>
                        <div class="item-box">
                            <div class="item-box__head">
                                <div class="item-box__des pb12-ipt">
                                    <h3 class="item-box__des_title">
                                        <a href="">
                                            薔薇薔薇薔薇薔薇薔薇薔薇薔薇薔薇薔薇薔薇薔薇薔薇薔薇薔薇
                                        </a>
                                    </h3>
                                </div>
                                <!-- /.item-box__des -->
                                <div class="item-box__arrow">
                                    <a href="">
                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <!-- /.item-box__arrow -->
                            </div>
                            <!-- /.item-box__head -->
                            <div class="item-box__content">
                                <div class="item-box__date clearfix">
                                    <span class="text">資料請求日</span>
                                    <span class="date">
                                        20.18.00.00
                                    </span>
                                </div>
                                <!-- /.item-box__date -->
                                <div class="item-box__company mb17-ipt">
                                    <div class="item-box__name">
                                        <p class="name">
                                            お届け企業名
                                        </p>
                                        <p class="des">
                                           企業名企業名企業名企業名企業名
                                        </p>
                                    </div>
                                    <!-- /.item-box__company -->
                                    <div class="group_btn">
                                        <a href="" target="_blank" class="btn btn--block btn--blue">
                                            <span class="btn__head">
                                                資料名資料名資料名資料名資料名資料名資料名資料名資料名
                                            </span>
                                            <span class="btn__bottom"> 企業サイトの情報ページを見る</span>
                                        </a>
                                        <a href="" target="_blank" class="btn btn--block btn--pink">
                                            <span class="btn__head">
                                                資料名資料名資料名資料名資料名資料名資料名資料名資料名
                                            </span>
                                            <span class="btn__bottom">資料を表示する</span>
                                        </a>
                                        <a class="btn btn--block btn--gray">
                                            <span class="btn__head">
                                                資料名資料名資料名資料名資料名資料名資料名資料名資料名
                                            </span>
                                            <span class="btn__bottom"> 郵送でお届けします</span>
                                        </a>
                                    </div>
                                    <!-- /.group_btn -->
                                </div>

                                <div class="item-box__company mb17-ipt">
                                    <div class="item-box__name">
                                        <p class="name">
                                            お届け企業名
                                        </p>
                                        <p class="des">
                                            企業名企業名企業名企業名企業名
                                        </p>
                                    </div>
                                    <!-- /.item-box__company -->
                                    <div class="group_btn">
                                        <a href="" target="_blank" class="btn btn--block btn--blue">
                                            <span class="btn__head">
                                                資料名資料名資料名資料名資料名資料名資料名資料名資料名
                                            </span>
                                            <span class="btn__bottom"> 企業サイトの情報ページを見る</span>
                                        </a>
                                        <a href="" target="_blank" class="btn btn--block btn--pink">
                                            <span class="btn__head">
                                                資料名資料名資料名資料名資料名資料名資料名資料名資料名
                                            </span>
                                            <span class="btn__bottom">資料を表示する</span>
                                        </a>
                                        <a class="btn btn--block btn--gray">
                                            <span class="btn__head">
                                                資料名資料名資料名資料名資料名資料名資料名資料名資料名
                                            </span>
                                            <span class="btn__bottom"> 郵送でお届けします</span>
                                        </a>
                                    </div>
                                    <!-- /.group_btn -->
                                </div>
                                <!-- /.item-box__company -->
                            </div>
                            <!-- /.item-box__content -->
                        </div>
                        <!-- /.item-box -->
                    </li>
                </ul>
                <div class="block-inquiries-bottom"><a href="{{route('user.inquiries')}}" class="btn btn--block btn--default btn">過去に請求した資料一覧</a></div>
            </div>
        </section>
    </div>
</div>
@endsection
