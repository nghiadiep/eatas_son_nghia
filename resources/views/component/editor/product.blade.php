<div class="uk-margin-small">
    <label class="uk-form-label" for="product_category_id">
        提供会社
    </label>
    <div class="uk-form-controls">
        @include('component.input.advertisers', [ 'value' => old('advertiser_id', isset($product) ? $product->advertiser_id: null ) ])
    </div>
</div>


<div class="uk-margin-small">
    <label class="uk-form-label" for="name">
        商材名
    </label>
    <div class="uk-form-controls">
        <input class="uk-input" type="text" name="name" required value="{{old('name', isset($product) ? $product->name: null )}}">
    </div>
</div>

<div class="uk-grid-small" uk-grid>
    <div class="uk-width-1-2@s">
        <div class="uk-margin-small">
            <label class="uk-form-label" for="product_category_id">
                商品カテゴリ
            </label>
            <div class="uk-form-controls">
                @include('component.input.product_categories', [ 'value' => old('product_category_id', isset($product) ? $product->product_category_id: null ) ])
            </div>
        </div>
        <div class="uk-margin-small">
            <label class="uk-form-label" for="point">
                請求時の獲得ポイント
            </label>
            <div class="uk-form-controls">
                <input class="uk-input" type="number" name="point" value="{{old('tel', isset($product) ? $product->point: 0 )}}" required>
            </div>
        </div>
        <div class="uk-margin-small">
            <label class="uk-form-label" for="button_text">
                ボタンのテキスト
            </label>
            <div class="uk-form-controls">
                <input class="uk-input" type="text" name="button_text" value="{{old('button_text', isset($product) ? $product->button_text: null )}}">
            </div>
        </div>
    </div>
    <div class="uk-width-1-2@s">
        <label class="uk-form-label" for="lead_text">
            リード文
        </label>
        <div class="uk-form-controls">
            <textarea class="uk-textarea uk-height-small" name="lead_text">{{old('lead_text', isset($product) ? $product->lead_text: null )}}</textarea>
        </div>
    </div>
</div>

<div class="uk-margin-small">
    @component('component.input.inquiry_documents', [ 'inquiryDocuments' => isset($product) ? $product->inquiryDocuments: null, 'url' => route('api.administrator.inquiry_documents.add') ])
    @endcomponent
</div>
        

<div class="uk-margin-small">
    <label class="uk-form-label" for="description">
        紹介ページ
    </label>
    <div class="uk-form-controls">
        @include('component.wysiwyg', [ 'value' => old('description', isset($product) ? $product->description: null ), 'name' => 'description' ])
    </div>
</div>