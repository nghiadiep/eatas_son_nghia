@extends('layouts.user.default')

@section('content')
<div class="page-inquiries">
<h2 class="page-title">資料請求履歴</h2>
<div class="content-center">
<div class="item-box-list item-box--requesthistory request-history-page" style="display: none;">
    <ul>
        @foreach($inquiries as $inquiry)
        <li>
            <div class="item-box">
                <div class="item-box__head">
                    <div class="item-box__des">
                        <h3 class="item-box__des_title">
                            <a href="{{route('articles.view', ['article' => $inquiry->product->articles->first() ])}}">
                                {{$inquiry->product->name}}
                            </a>
                        </h3>
                    </div>
                    <!-- /.item-box__des -->
                    <div class="item-box__arrow">
                        <a href="{{route('articles.view', ['article' => $inquiry->product->articles->first() ])}}">
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
                            @userdate($inquiry->created_at)
                        </span>
                    </div>
                    <!-- /.item-box__date -->
                    <div class="item-box__company">
                        <div class="item-box__name">
                            <p class="name">
                                お届け企業名
                            </p>
                            <p class="des">
                                {{$inquiry->product->advertiser->company_name}}
                            </p>
                        </div>
                        <!-- /.item-box__company -->
                        <div class="group_btn">
                        @foreach($inquiry->product->inquiryDocuments as $document)
                            @include("component.user.inquiry_document", [
                                "inquiryDocument" => $document
                            ]) 
                        @endforeach
                        </div>
                        <!-- /.group_btn -->
                    </div>
                    <!-- /.item-box__company -->
                </div>
                <!-- /.item-box__content -->
            </div>
            <!-- /.item-box -->
        </li>
        @endforeach
    </ul>
</div>
<div class="item-box-list item-box--requesthistory request-history-page">
    <ul>
        <li>
            <div class="item-box">
                <div class="item-box__head">
                    <div class="item-box__des">
                        <h3 class="item-box__des_title">
                            <a href="#">薔薇薔薇薔薇薔薇薔薇薔薇薔薇薔薇薔薇薔薇薔薇薔薇薔薇薔薇</a>
                        </h3>
                    </div>
                    <!-- /.item-box__des -->
                    <div class="item-box__arrow">
                        <a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                    </div>
                    <!-- /.item-box__arrow -->
                </div>
                <!-- /.item-box__head -->
                <div class="item-box__content">
                    <div class="item-box__date clearfix">
                        <span class="text">資料請求日</span>
                        <span class="date">2018.00.00</span>
                    </div>
                    <!-- /.item-box__date -->
                    <div class="item-box__company">
                        <div class="item-box__name">
                            <p class="name">お届け企業名</p>
                            <p class="des">企業名企業名企業名企業名企業名</p>
                        </div>
                        <!-- /.item-box__company -->
                        <div class="group_btn">
                            <div class="clearfix mb12">
                                <a href="" title="" class="btn btn--block btn--blue">
                                    <span class="btn--head">
                                        資料名資料名資料名資料名資料名資料名資料名資料名資料名
                                    </span>
                                    <span class="btn--border_blue"></span>
                                    <span class="btn--bottom">
                                        企業サイトの情報ページを見る
                                    </span>
                                </a>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <a href="" title="" class="btn btn--block btn--pink">
                                        <span class="btn--head btn--txt__left">
                                            資料名資料名資料名資料名資料名資料名資料名資料名資料名
                                        </span>
                                        <span class="btn--border_pink"></span>
                                        <span class="btn--bottom">
                                            資料を表示する
                                        </span>
                                    </a>
                                </div>
                                <div class="col-2">
                                    <a href="" title="" class="btn btn--block btn--gray">
                                        <span class="btn--head btn--txt__left">
                                            資料名資料名資料名資料名資料名資料名資料名資料名資料名
                                        </span>
                                        <span class="btn--border_gray"></span>
                                        <span class="btn--bottom">
                                            郵送でお届けします
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- /.group_btn -->
                    </div>
                    <!-- /.item-box__company -->
                    <div class="item-box__company">
                        <div class="item-box__name">
                            <p class="name">お届け企業名</p>
                            <p class="des">企業名企業名企業名企業名企業名</p>
                        </div>
                        <!-- /.item-box__company -->
                        <div class="group_btn">
                            <div class="clearfix mb12">
                                <a href="" title="" class="btn btn--block btn--blue">
                                    <span class="btn--head">
                                        資料名資料名資料名資料名資料名資料名資料名資料名資料名
                                    </span>
                                    <span class="btn--border_blue"></span>
                                    <span class="btn--bottom">
                                        企業サイトの情報ページを見る
                                    </span>
                                </a>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <a href="" title="" class="btn btn--block btn--pink">
                                        <span class="btn--head btn--txt__left">
                                            資料名資料名資料名資料名資料名資料名資料名資料名資料名
                                        </span>
                                        <span class="btn--border_pink"></span>
                                        <span class="btn--bottom">
                                            資料を表示する
                                        </span>
                                    </a>
                                </div>
                                <div class="col-2">
                                    <a href="" title="" class="btn btn--block btn--gray">
                                        <span class="btn--head btn--txt__left">
                                            資料名資料名資料名資料名資料名資料名資料名資料名資料名
                                        </span>
                                        <span class="btn--border_gray"></span>
                                        <span class="btn--bottom">
                                            郵送でお届けします
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- /.group_btn -->
                    </div>
                    <!-- /.item-box__company -->
                </div>
                <!-- /.item-box__content -->
            </div>
            <!-- /.item-box -->
        </li>
        <li>
            <div class="item-box">
                <div class="item-box__head">
                    <div class="item-box__des">
                        <h3 class="item-box__des_title">
                            <a href="#">薔薇薔薇薔薇薔薇薔薇薔薇薔薇薔薇薔薇薔薇薔薇薔薇薔薇薔薇</a>
                        </h3>
                    </div>
                    <!-- /.item-box__des -->
                    <div class="item-box__arrow">
                        <a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                    </div>
                    <!-- /.item-box__arrow -->
                </div>
                <!-- /.item-box__head -->
                <div class="item-box__content">
                    <div class="item-box__date clearfix">
                        <span class="text">資料請求日</span>
                        <span class="date">2018.00.00</span>
                    </div>
                    <!-- /.item-box__date -->
                    <div class="item-box__company">
                        <div class="item-box__name">
                            <p class="name">お届け企業名</p>
                            <p class="des">企業名企業名企業名企業名企業名</p>
                        </div>
                        <!-- /.item-box__company -->
                        <div class="group_btn">
                            <div class="clearfix mb12">
                                <a href="" title="" class="btn btn--block btn--blue">
                                    <span class="btn--head">
                                        資料名資料名資料名資料名資料名資料名資料名資料名資料名
                                    </span>
                                    <span class="btn--border_blue"></span>
                                    <span class="btn--bottom">
                                        企業サイトの情報ページを見る
                                    </span>
                                </a>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <a href="" title="" class="btn btn--block btn--pink">
                                        <span class="btn--head btn--txt__left">
                                            資料名資料名資料名資料名資料名資料名資料名資料名資料名
                                        </span>
                                        <span class="btn--border_pink"></span>
                                        <span class="btn--bottom">
                                            資料を表示する
                                        </span>
                                    </a>
                                </div>
                                <div class="col-2">
                                    <a href="" title="" class="btn btn--block btn--gray">
                                        <span class="btn--head btn--txt__left">
                                            資料名資料名資料名資料名資料名資料名資料名資料名資料名
                                        </span>
                                        <span class="btn--border_gray"></span>
                                        <span class="btn--bottom">
                                            郵送でお届けします
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- /.group_btn -->
                    </div>
                    <!-- /.item-box__company -->
                    <div class="item-box__company">
                        <div class="item-box__name">
                            <p class="name">お届け企業名</p>
                            <p class="des">企業名企業名企業名企業名企業名</p>
                        </div>
                        <!-- /.item-box__company -->
                        <div class="group_btn">
                            <div class="clearfix mb12">
                                <a href="" title="" class="btn btn--block btn--blue">
                                    <span class="btn--head">
                                        資料名資料名資料名資料名資料名資料名資料名資料名資料名
                                    </span>
                                    <span class="btn--border_blue"></span>
                                    <span class="btn--bottom">
                                        企業サイトの情報ページを見る
                                    </span>
                                </a>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <a href="" title="" class="btn btn--block btn--pink">
                                        <span class="btn--head btn--txt__left">
                                            資料名資料名資料名資料名資料名資料名資料名資料名資料名
                                        </span>
                                        <span class="btn--border_pink"></span>
                                        <span class="btn--bottom">
                                            資料を表示する
                                        </span>
                                    </a>
                                </div>
                                <div class="col-2">
                                    <a href="" title="" class="btn btn--block btn--gray">
                                        <span class="btn--head btn--txt__left">
                                            資料名資料名資料名資料名資料名資料名資料名資料名資料名
                                        </span>
                                        <span class="btn--border_gray"></span>
                                        <span class="btn--bottom">
                                            郵送でお届けします
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- /.group_btn -->
                    </div>
                    <!-- /.item-box__company -->
                </div>
                <!-- /.item-box__content -->
            </div>
            <!-- /.item-box -->
        </li>
        <li>
            <div class="item-box">
                <div class="item-box__head">
                    <div class="item-box__des">
                        <h3 class="item-box__des_title">
                            <a href="#">薔薇薔薇薔薇薔薇薔薇薔薇薔薇薔薇薔薇薔薇薔薇薔薇薔薇薔薇</a>
                        </h3>
                    </div>
                    <!-- /.item-box__des -->
                    <div class="item-box__arrow">
                        <a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                    </div>
                    <!-- /.item-box__arrow -->
                </div>
                <!-- /.item-box__head -->
                <div class="item-box__content">
                    <div class="item-box__date clearfix">
                        <span class="text">資料請求日</span>
                        <span class="date">2018.00.00</span>
                    </div>
                    <!-- /.item-box__date -->
                    <div class="item-box__company">
                        <div class="item-box__name">
                            <p class="name">お届け企業名</p>
                            <p class="des">企業名企業名企業名企業名企業名</p>
                        </div>
                        <!-- /.item-box__company -->
                        <div class="group_btn">
                            <div class="clearfix mb12">
                                <a href="" title="" class="btn btn--block btn--blue">
                                    <span class="btn--head">
                                        資料名資料名資料名資料名資料名資料名資料名資料名資料名
                                    </span>
                                    <span class="btn--border_blue"></span>
                                    <span class="btn--bottom">
                                        企業サイトの情報ページを見る
                                    </span>
                                </a>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <a href="" title="" class="btn btn--block btn--pink">
                                        <span class="btn--head btn--txt__left">
                                            資料名資料名資料名資料名資料名資料名資料名資料名資料名
                                        </span>
                                        <span class="btn--border_pink"></span>
                                        <span class="btn--bottom">
                                            資料を表示する
                                        </span>
                                    </a>
                                </div>
                                <div class="col-2">
                                    <a href="" title="" class="btn btn--block btn--gray">
                                        <span class="btn--head btn--txt__left">
                                            資料名資料名資料名資料名資料名資料名資料名資料名資料名
                                        </span>
                                        <span class="btn--border_gray"></span>
                                        <span class="btn--bottom">
                                            郵送でお届けします
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- /.group_btn -->
                    </div>
                    <!-- /.item-box__company -->
                    <div class="item-box__company">
                        <div class="item-box__name">
                            <p class="name">お届け企業名</p>
                            <p class="des">企業名企業名企業名企業名企業名</p>
                        </div>
                        <!-- /.item-box__company -->
                        <div class="group_btn">
                            <div class="clearfix mb12">
                                <a href="" title="" class="btn btn--block btn--blue">
                                    <span class="btn--head">
                                        資料名資料名資料名資料名資料名資料名資料名資料名資料名
                                    </span>
                                    <span class="btn--border_blue"></span>
                                    <span class="btn--bottom">
                                        企業サイトの情報ページを見る
                                    </span>
                                </a>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <a href="" title="" class="btn btn--block btn--pink">
                                        <span class="btn--head btn--txt__left">
                                            資料名資料名資料名資料名資料名資料名資料名資料名資料名
                                        </span>
                                        <span class="btn--border_pink"></span>
                                        <span class="btn--bottom">
                                            資料を表示する
                                        </span>
                                    </a>
                                </div>
                                <div class="col-2">
                                    <a href="" title="" class="btn btn--block btn--gray">
                                        <span class="btn--head btn--txt__left">
                                            資料名資料名資料名資料名資料名資料名資料名資料名資料名
                                        </span>
                                        <span class="btn--border_gray"></span>
                                        <span class="btn--bottom">
                                            郵送でお届けします
                                        </span>
                                    </a>
                                </div>
                            </div>
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
</div>
</div>
</div>
@endsection
