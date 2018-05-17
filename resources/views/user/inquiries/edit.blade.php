@extends('layouts.user.default')

@section('content')

<h2 class="page-title">資料請求</h2>
<div class="block-form">
    <p class="block-form__notice mb18-ipt">
        資料をお届けする先の登録と、簡単なアンケートへご協力ください。
    </p>
    <section>
        <h2 class="title-center">
            <span>お客様情報</span>
        </h2>
        <form method="POST" action="{{route('user.inquiries.edit', ['product_id' => $product->id])}}" class="checkable-submit">
            {{ csrf_field() }}
            @include("component.user.error")
            @include("component.user.inquiry", [
                "user" => $user
            ])
            <div class="block-form__btn-bottom">
                <button type="submit" class="btn btn--block">お問い合わせを送信する</button>
            </div>
            <!--/.block-form__btn-bottom-->
        </form>
    </section>
</div>

@endsection