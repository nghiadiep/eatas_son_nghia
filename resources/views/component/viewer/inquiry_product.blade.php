<section class="product">
    <h1 class="uk-text-center uk-text-primary">
        {{$product->name}}
    </h1>
    <p class="uk-text-center">
        @lined($product->lead_text)
    </p>
    <div class="uk-text-center">
        @auth("user")
        <a class="uk-button uk-button-large uk-button-primary uk-width-large@s" href="{{route('user.inquiries.confirm', ['product_id' => $product->id])}}">
            今すぐ無料でお問い合わせ
        </a>
        @endauth
        @guest("user")
        <a class="uk-button uk-button-large uk-button-primary uk-width-large@s" href="{{route('products.inquiry', ['product' => $product])}}">
            今すぐ無料でお問い合わせ
        </a>
        @endguest
    </div>        
</section>

<div id="files-modal_{{$product->id}}" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-margin-auto-vertical">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h2 class="uk-modal-title">
                ファイルダウンロード
            </h2>
        </div>
        <div class="uk-modal-body">
            @foreach($product->inquiryDocuments as $document)
            <div class="uk-margin-small">
                <a href="{{route('user.inquiryDocuments.download', ['inquiryDocument' => $document ])}}" target="_blank">
                    {{$document->name}}
                </a>
            </div>
            @endforeach
        </div>
        <div class="uk-modal-footer uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close" type="button">閉じる</button>
        </div>
    </div>
</div>