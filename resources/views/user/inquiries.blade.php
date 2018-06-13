@extends('layouts.user.default')
@section('content')
<div class="page-inquiries">
    <h2 class="page-title">資料請求履歴</h2>
    <div class="content-center">
        <div class="item-box-list item-box--requesthistory request-history-page">
            <ul>
                @foreach($inquiries as $inquiry)
                @if(count($inquiry->product->inquiryDocuments))
                <li>
                    <div class="item-box">
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
                @endif
                @endforeach
            </ul>
            <nav>
                <ul class="uk-pagination uk-flex-center">
                    <li class="uk-active"><span>1</span></li>
                    <li><a href="">2</a></li>
                    <li><a href="">3</a></li>
                    <li><a href="">4</a></li>
                    <li><a href="">5</a></li>
                    <li class="uk-disabled"><span>...</span></li>
                    <li><a href=""><i class="fa fa-chevron-right" aria-hidden="true"></i></a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection
