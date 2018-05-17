@if ( !isset($form) || $form != "password_only")
<div class="uk-margin-small">
    <label class="uk-form-label" for="pen_name">
        ライターネーム
    </label>
    <div class="uk-form-controls">
        <input class="uk-input" type="text" name="pen_name" required value="{{old('pen_name', isset($writer) ? $writer->pen_name: null )}}">
    </div>
</div>
<div class="uk-margin-small">
    <label class="uk-form-label" for="email">
        メールアドレス
    </label>
    <div class="uk-form-controls">
        <input class="uk-input" type="email" name="email" required value="{{old('email', isset($writer) ? $writer->email: null )}}">
    </div>
</div>
@endif

@if ( !isset($form) || $form != "attribute_only")
<div class="uk-margin-small">
    <label class="uk-form-label" for="password">
        パスワード
    </label>
    <div class="uk-form-controls">
        <input class="uk-input" type="password" name="password" required>
    </div>
</div>
<div class="uk-margin-small">
    <label class="uk-form-label" for="password_confirmation">
        パスワードの確認
    </label>
    <div class="uk-form-controls">
        <input class="uk-input" type="password" name="password_confirmation" required>
    </div>
</div>
@endif