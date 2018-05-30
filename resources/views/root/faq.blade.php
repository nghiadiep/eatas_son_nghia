@extends('layouts.user.default')

@section('content')

<div class="qa-page">
    <h2 class="page-title">よくある質問</h2>
    <div class="content-center">
    <h2 class="title-center mt12 mb09-ipt">
        <span>カテゴリから探す</span>
    </h2>
    <div class="block-mypage">
        <ul class="block-mypage__menu">
            @foreach($faqCategories as $faqCategory) 
            <li>
                <a title="{{$faqCategory->label}}" onclick="scrollToSelector('#faq-category__{{$faqCategory->id}}')">
                    {{$faqCategory->label}}
                </a>
            </li>
            @endforeach
        </ul>
    </div>

    @foreach($faqCategories as $faqCategory)    
    <label class="sub-title mt25" for="new-password" id="faq-category__{{$faqCategory->id}}">
            <span>
                {{$faqCategory->label}}
            </span>
    </label>
    <div class="block-accordion">  
        @foreach( $faqCategory->faqs as $faq )
        <dl class="block-accordion__section">
            <dt class="block-accordion__title">
                <span class="block-accordion__title__des">
                    {{ $faq->question }}
                </span>
            </dt>
            <dd class="block-accordion__content">
                <p>
                    {!! $faq->answer !!}
                </p>
            </dd>
        </dl>
        @endforeach
    </div>
    @endforeach
</div>
@endsection
</div>
