@if ( !isset($form) || $form != "password_only")
<div class="uk-margin-small">
    <label class="uk-form-label" for="company_name">
        会社名
    </label>
    <div class="uk-form-controls">
        <input class="uk-input" type="text" name="company_name" required value="{{old('company_name', isset($advertiser) ? $advertiser->company_name: null )}}">
    </div>
</div>
<div class="uk-margin-small">
    <label class="uk-form-label" for="prefecture_id">
        都道府県
    </label>
    <div class="uk-form-controls">
        @include('component.input.prefectures', [ 'value' => old('prefecture_id', isset($advertiser) ? $advertiser->prefecture_id: null ) ])
    </div>
</div>
<div class="uk-margin-small">
    <label class="uk-form-label" for="post_code">
        郵便番号
    </label>
    <div class="uk-form-controls">
        <input class="uk-input" type="text" name="post_code" required value="{{old('post_code', isset($advertiser) ? $advertiser->post_code: null )}}">
    </div>
</div>
<div class="uk-margin-small">
    <label class="uk-form-label" for="address">
        住所
    </label>
    <div class="uk-form-controls">
        <input class="uk-input" type="text" name="address" required value="{{old('address', isset($advertiser) ? $advertiser->address: null )}}">
    </div>
</div>
<div class="uk-margin-small">
    <label class="uk-form-label" for="tel">
        電話番号
    </label>
    <div class="uk-form-controls">
        <input class="uk-input" type="text" name="tel" required value="{{old('tel', isset($advertiser) ? $advertiser->tel: null )}}">
    </div>
</div>
<div class="uk-margin-small">
    <label class="uk-form-label" for="fax">
        Fax番号
    </label>
    <div class="uk-form-controls">
        <input class="uk-input" type="text" name="fax" value="{{old('fax', isset($advertiser) ? $advertiser->fax: null )}}">
    </div>
</div>
@endif
