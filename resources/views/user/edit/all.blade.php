@extends('layouts.user.default')

@section('content')

<h2 class="page-title">会員情報確認・編集</h2>
<div class="block-form">
    <section>
        <h2 class="title-center">
            <span>お客様情報</span>
        </h2>
        <form method="POST" action="{{route('user.edit')}}" class="checkable-submit">
            {{ csrf_field() }}
            @include("component.user.error")
            @include("component.user.inquiry", [
                "user" => $user
            ])
            <div class="block-form__btn-bottom">
                <button type="submit" class="btn btn--block">会員情報を編集する</button>
            </div>
            <!--/.block-form__btn-bottom-->
        </form>
    </section>
</div>

@endsection