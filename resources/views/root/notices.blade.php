@extends('layouts.user.default')

@section('content')

<div class="notice-page">

    <h2 class="page-title">EATASからのお知らせ</h2>
    <div class="block-accordion">
        <dl class="block-accordion__section">
            @foreach($notices as $notice)
            <dt class="block-accordion__title">
                <span class="block-accordion__date">
                    @userdate($notice->publish_date)
                </span>
                <span class="block-accordion__title__des">
                    {{$notice->title}}
                </span>
            </dt>
            <dd class="block-accordion__content">
                <p>
                    @lined($notice->description)
                </p>
            </dd>
            @endforeach
        </dl>
        <!--/.block-accordion__section-->
    </div>
    <!--/.block-accordion-->

</div>
@endsection
