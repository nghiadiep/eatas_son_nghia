<div class="block-art-detail__subsidy">
    <h2 class="title">
      {{$product->name}}
    </h2>
    <p class="subtitle">
      @lined($product->lead_text)
    </p>
    @if($product->advertiser != null)
    <p class="text-bold mb14">
      {{$product->advertiser->company_name}}
    </p>
    <p class="mb05">
      〒{{$product->advertiser->post_code}}
    </p>
    <p class="des">
        {{$product->advertiser->all_address}}
    </p>
    <div class="block-art-detail__contact-info">

        @if($product->advertiser->fax != null)
        <dl>
            <dt>FAX</dt>
            <dd>
                {{$product->advertiser->fax}}
            </dd>
        </dl>
        @endif
    </div>
    @endif
    <p class="mt10">
        <a href="{{route('products.inquiry', ['product' => $product ])}}" title="{{ $product->filled_button_text }}" class="btn btn--block btn--black">
            {{ $product->filled_button_text }}
        </a>
    </p>
</div>