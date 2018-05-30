@extends('layouts.user.default')

@section('content')
<div class="page-inquiries">
<h2 class="page-title">資料請求履歴</h2>
<div class="content-center">
<div class="item-box-list item-box--requesthistory request-history-page">
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
</div>
</div>
@endsection
