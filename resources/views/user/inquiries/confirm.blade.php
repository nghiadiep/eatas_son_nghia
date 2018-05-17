@extends('layouts.user.default')

@section('content')


<h2 class="page-title">資料請求</h2>
<div class="block-form">
    <section class="block-form__confirm pt00-ipt">
        <p class="block-form__notice mb10-ipt">
            郵送の資料は登録されている住所へお届けします。
            <br>変更がある場合はマイページの「<a href="{{route('user.inquiries.edit', ['product_id' => $product->id ])}}" class="text-underline">会員情報確認・編集</a>」より変更してください。
        </p>
        <a href="{{route('user.inquiries.edit', ['product_id' => $product->id ])}}" class="btn btn--block btn--default mb20-ipt">会員情報確認・編集ページへ</a>
        <form action="{{route('user.inquiries.confirm')}}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="product_id" value="{{$product->id}}" />
            <h2 class="title-center">
                <span>お届け先情報</span>
            </h2>
            @if($user->is_company == 1)
            <div class="block-form__sec">
                <label class="sub-title">
                    <span>屋号または会社名</span>
                </label>
                <div class="form-group">
                    <p>
                        {{$user->store_name}}
                    </p>
                </div>
                <!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <label class="sub-title">
                    <span>会社郵便番号</span>
                </label>
                <div class="form-group">
                    <p>
                        {{$user->post_code}}
                    </p>
                </div>
                <!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <label class="sub-title">
                    <span>会社住所</span>
                </label>
                <div class="form-group">
                    <p>
                        {{$user->prefecture->label}}
                        {{$user->address}}
                        {{$user->address_detail}}
                        {{$user->address_room}}
                    </p>
                </div>
                <!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <label class="sub-title">
                    <span>代表電話番号</span>
                </label>
                <div class="form-group">
                    <p>
                        {{$user->tel}}
                    </p>
                </div>
                <!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <label class="sub-title">
                    <span>担当者名</span>
                </label>
                <div class="form-group">
                    <p>
                        {{$user->last_name}} {{$user->first_name}}
                    </p>
                </div>
                <!--/.form-group-->
            </div>
            @else
            <div class="block-form__sec">
                <label class="sub-title">
                    <span>氏名</span>
                </label>
                <div class="form-group">
                    <p>
                        {{$user->last_name}} {{$user->first_name}}
                    </p>
                </div>
                <!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <label class="sub-title">
                    <span>郵便番号</span>
                </label>
                <div class="form-group">
                    <p>
                        {{$user->post_code}}
                    </p>
                </div>
                <!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <label class="sub-title">
                    <span>住所</span>
                </label>
                <div class="form-group">
                    <p>
                        {{$user->prefecture->label}}
                        {{$user->address}}
                        {{$user->address_detail}}
                        {{$user->address_room}}
                    </p>
                </div>
                <!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <label class="sub-title">
                    <span>電話番号</span>
                </label>
                <div class="form-group">
                    <p>
                        {{$user->tel}}
                    </p>
                </div>
                <!--/.form-group-->
            </div>
            @endif

            <!--/.block-form__sec-->
            <h2 class="title-center">
                <span>お届けする資料</span>
            </h2>
            <div class="block-form__sec">
                <label class="sub-title">
                    <span>企業名</span>
                </label>
                <div class="form-group">
                    <p>
                        {{$product->advertiser->company_name}}
                    </p>
                </div>
                <!--/.form-group-->
            </div>
            @foreach($product->inquiryDocuments as $inquiryDocument)
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <label class="sub-title">
                    <span>資料名</span>
                </label>
                <div class="form-group">
                    <p>
                        {{$inquiryDocument->name}}
                    </p>
                </div>
                <!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            
            <div class="block-form__sec">
                <label class="sub-title">
                    <span>資料の形式</span>
                </label>
                <div class="form-group">
                    <p>
                        @php
                        switch($inquiryDocument->doc_type_id){
                        case $inquiryDocument::WEB :
                            echo "企業サイトの情報ページ";
                            break;
                        case $inquiryDocument::DL :
                            echo "資料をダウンロード";
                            break;
                        case $inquiryDocument::SEND :
                            echo "郵送でお届け";
                            break;
                        }
                        @endphp
                    </p>
                </div>
                <!--/.form-group-->
            </div>
            @endforeach()
            <!--/.block-form__sec-->
            @if( $relateds != null && $relateds->count() > 0)
            <h2 class="title-center">
                <span>似ている資料</span>
            </h2>
            <p class="mb20">
                似ている資料をまとめて請求することができます。
            </p>
            @foreach($relateds as $related )
                <label class="sub-title mb10-ipt">
                    <span>
                        {{$related->advertiser->company_name}}
                    </span>
                </label>
                <div class="form-group">
                    <div class="btn-checkbox-group">
                        <div class="btn btn--block">
                            <div class="btn__head">
                                <div class="checkbox-group">
                                    <label>
                                        <input name="combined_id[]" value="{{$related->id}}" type="checkbox" checked>
                                        <span>
                                            {{$related->name}}もまとめて請求する
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    @foreach( $related->inquiryDocuments as $document )
                        @include("component.user.selectable_document", [
                            "inquiryDocument" => $document
                        ])
                    @endforeach
                </div>
            </div>
            @endforeach

            @endif
            <div class="block-form__btn-bottom block-form__btn-bottom--completed">
                <button type="submit" class="btn btn--block btn--on">資料を請求する</button>
            </div>
            <!--/.block-form__btn-bottom-->
        </form>
    </section>
</div>
<!--/.block-form-->


@endsection