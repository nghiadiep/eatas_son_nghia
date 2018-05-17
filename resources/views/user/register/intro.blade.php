@extends('layouts.user.default')

@section('content')

<h2 class="page-title">新規会員登録</h2>
<div class="block-form member-registration-page">
    <p class="mb12">会員登録をすると便利なマイページをご利用できます。</p>
    <div class="block-form__sec">
        <div class="form-group">
            <a class="btn btn--block btn--default" href="{{route('root.about')}}">会員登録するとできること</a>
        </div>
        <div class="form-group">
            <form method="GET" action="{{route('user.register')}}">
                <button class="btn btn--block btn--on">
                    新規会員登録（無料）
                </button>
                <input type="hidden" name="inquiring_product_id" class="inquiering_product" value="{{$inquiring_product_id}}" />
            </form>
        </div>
    </div>
    <div class="block-form__sec">
        <p>
            <a href="{{route('root.faq')}}" class="text-underline">設定方法/よくある質問</a>
        </p>
    </div>
    <div class="block-form__btn-bottom">
        <button onclick="onOpenLogin({{ $inquiring_product_id }})" class="btn btn--block btn--default">ログインはこちら</button>
    </div>
</div>



@endsection
