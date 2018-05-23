@extends('layouts.user.default')

@section('content')

<!-- <div class="main__content my-page"> -->
<h2 class="page-title">マイページ</h2>
<div class="content-center">
    <div class="main__content my-page">
        <div class="block-mypage">
            <ul class="block-mypage__menu">
                <li>
                    <a href="{{route('user.inquiries')}}" title="資料請求履歴">資料請求履歴</a>
                </li>
                <li>
                    <a href="{{route('user.stocks')}}" title="本棚を見る">本棚を見る</a>
                </li>
                <li>
                    <a href="{{route('user.clips')}}" title="あとで読むを見る">あとで読むを見る</a>
                </li>
                <li>
                    <a href="{{route('user.edit')}}" title="会員情報確認・編集">会員情報確認・編集</a>
                </li>
                <li>
                    <form action="{{route('user.logout')}}" method="POST">
                        {{ csrf_field() }}
                        <button title="ログアウト">ログアウト</button>
                    </form>
                </li>
                <li>
                    <a href="{{route('contact.add')}}" title="お問い合わせ">お問い合わせ</a>
                </li>
            </ul>
            <div class="block-mypage__menu-pc">
                <ul class="clearfix">
                    <li>
                        <a href="{{route('user.inquiries')}}" title="資料請求履歴" class="btn btn--block btn--default">資料請求履歴</a>
                    </li>
                    <li>
                        <a href="{{route('user.stocks')}}" title="本棚を見る" class="btn btn--block btn--default">本棚を見る</a>
                    </li>
                </ul>
                <ul class="clearfix">
                    <li>
                        <a href="{{route('user.clips')}}" title="あとで読むを見る" class="btn btn--block btn--default">あとで読むを見る</a>
                    </li>
                    <li>
                        <a href="{{route('user.edit')}}" title="会員情報確認・編集" class="btn btn--block btn--default">会員情報確認・編集</a>
                    </li>
                </ul>
                <ul class="clearfix">
                    <li>
                        <form action="{{route('user.logout')}}" method="POST">
                            {{ csrf_field() }}
                            <button title="ログアウト" class="btn btn--block btn--default">ログアウト</button>
                        </form>
                    </li>
                    <li>
                        <a href="{{route('contact.add')}}" title="お問い合わせ" class="btn btn--block btn--default">お問い合わせ</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--/.block-menu-->
</div>

@endsection
