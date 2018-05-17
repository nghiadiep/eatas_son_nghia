<article class="uk-card uk-card-default uk-card-body uk-card-small">
    <h3 class="uk-margin-small">
        {{$inquiry->product->name}}
    </h3>
    <div class="uk-grid-small" uk-grid>
        <div class="uk-width-expand">
            {{$inquiry->product->advertiser->company_name}}
        </div>
        <div class="uk-width-auto">
            請求日: 
            <time datetime="{{$inquiry->created_at}}">
                @date($inquiry->created_at)
            </time>
        </div>
    </div> 
    @include("component.part.inquiry_documents", ["inquiryDocuments" => $inquiry->product->inquiryDocuments ])
</article>