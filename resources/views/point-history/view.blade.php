@extends('layouts.user.default')

@section('content')
<div class="content-center">
    <nav>
        <ol class="breadcrumb clearfix">
            <li class="breadcrumb__item"><a href="{{route('root.index')}}">Top</a></li>
            <li class="breadcrumb__item">ポイント履歴</li>
        </ol>
    </nav><!--/.breadcrumb-->
    <div class="block-point-number">
        <div class="block-point-number__icon">

        </div>
        <dl>
            <dt>保有ポイント数</dt>
            <dd>
                <strong>10</strong><span>ポイント</span>
            </dd>
        </dl>
    </div><!--/.block-point-number-->
</div>
@endsection
