@extends('layouts.user.default')

@section('content')

<h2 class="page-title mb18-ipt">資料請求</h2>
<div class="block-form document-request-page">
    <p class="block-form__notice mt18 mb24-ipt">
        資料を請求しました。<br class="pc">下記よりご確認ください。
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
                            <div class="item-box__company mb17-ipt">
                                <div class="item-box__name">
                                    <p class="name">
                                        {{$inquiry->product->advertiser->company_name}}
                                    </p>
                                    <p class="des">
                                        {{$inquiry->product->name}}
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

                            @foreach( $combineds as $combined )
                            <div class="item-box__company mb17-ipt">
                                <div class="item-box__name">
                                    <p class="name">
                                        {{$combined->product->advertiser->company_name}}
                                    </p>
                                    <p class="des">
                                        {{$combined->product->name}}
                                    </p>
                                </div>
                                <!-- /.item-box__company -->
                                <div class="group_btn">
                                    @foreach($combined->product->inquiryDocuments as $document)
                                        @include("component.user.inquiry_document", [
                                            "inquiryDocument" => $document
                                        ]) 
                                    @endforeach
                                </div>
                                <!-- /.group_btn -->
                            </div>
                            @endforeach
                            <!-- /.item-box__company -->
                        </div>
                        <!-- /.item-box__content -->
                    </div>
                    <!-- /.item-box -->
                </li>
            </ul>
            <div class="block-inquiries-bottom"><a href="{{route('user.inquiries')}}" class="btn btn--block btn--default">過去に請求した資料一覧</a></div>
        </div>
    </section>
</div>

@endsection
