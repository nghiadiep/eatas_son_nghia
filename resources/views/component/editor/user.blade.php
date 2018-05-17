@inject('constantService', 'App\Services\ConstantService')

@if(!isset($form) || $form == "basic_only" )
<div uk-grid class="uk-grid-small">
    <div class="uk-width-1-2@s">
        <label class="uk-form-label" for="nickname">
            ニックネーム
        </label>
        <div class="uk-form-controls">
            <input class="uk-input" type="text" name="nickname" value="{{old('nickname', isset($user) ? $user->nickname: null )}}" required>
        </div>
    </div>
    <div class="uk-width-1-2@s">
        <label class="uk-form-label" for="email">
            メールアドレス
        </label>
        <div class="uk-form-controls">
            <input class="uk-input" type="email" name="email" value="{{old('email', isset($user) ? $user->email: null )}}" required>
        </div>
    </div>
    <div class="uk-width-1-1@s">
        <label>
            <input class="uk-checkbox" type="checkbox" name="mail_deliverable" value="1" {{isset($user) && $user->mail_deliverable==1? "checked" : null }}>
            EATASからのメールを受け取る。
        </label>
    </div>
</div>
@endif

@if(!isset($form) || $form == "detail_only" )

<input id="is_company" type="hidden" name="is_company" value="{{isset($user)? $user->is_company: 1}}">

<ul class="uk-subnav uk-subnav-pill uk-flex-right" uk-switcher="animation: uk-animation-fade; connect: #user_editor; toggle: .is_company-switcher; active: {{isset($user)? $user->is_company: 1}};">
    <li id="mode_0" class="is_company-switcher uk-text-center" onclick="switchCompany(0)">
        <a href="#">
            > 未開業・個人の方はこちら
        </a>
    </li>
    <li id="mode_1" class="is_company-switcher uk-text-center" onclick="switchCompany(1)">
        <a href="#">
            > 飲食店関係者の方はこちら
        </a>
    </li>
</ul>

<ul class="uk-switcher uk-margin" id="user_editor">
    <li id="info-base_0">
        <div class="uk-grid-small" uk-grid>
            <div class="uk-width-1-2">
                <label class="uk-form-label" for="last_name">
                    姓
                </label>
                <div class="uk-form-controls">
                    <input class="uk-input" type="text" name="last_name" value="{{old('last_name', isset($user) ? $user->last_name: null )}}" required>
                </div>
            </div>
            <div class="uk-width-1-2">
                <label class="uk-form-label" for="first_name">
                    名
                </label>
                <div class="uk-form-controls">
                    <input class="uk-input" type="text" name="first_name" value="{{old('first_name', isset($user) ? $user->first_name: null )}}" required>
                </div>
            </div>
            <div class="uk-width-1-1">
                <label class="uk-form-label" for="address">
                    住所
                </label>
                <div class="uk-form-controls">
                    <div class="uk-grid-small" uk-grid>
                        <div class="uk-width-medium@s">
                            @include('component.input.prefectures', [ 'value' => old('prefecture_id', isset($user) ? $user->prefecture_id: null ) ])
                        </div>
                        <div class="uk-width-expand">
                            <input class="uk-input" type="text" name="address" value="{{old('address', isset($user) ? $user->address: null )}}"  required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="uk-width-1-3@s">
                <label class="uk-form-label" for="tel">
                    電話番号
                </label>
                <div class="uk-form-controls">
                    <input class="uk-input" type="text" name="tel" value="{{old('tel', isset($user) ? $user->tel: null )}}" required>
                </div>
            </div>
            <div class="uk-width-1-3@s">
                <label class="uk-form-label" for="mobile_tel">
                    携帯電話
                </label>
                <div class="uk-form-controls">
                    <input class="uk-input" type="text" name="mobile_tel" value="{{old('mobile_tel', isset($user) ? $user->mobile_tel: null )}}">
                </div>
            </div>
            <div class="uk-width-1-3@s">
                <label class="uk-form-label" for="fax">
                    Fax番号
                </label>
                <div class="uk-form-controls">
                    <input class="uk-input" type="text" name="fax" value="{{old('fax', isset($user) ? $user->fax: null )}}">
                </div>
            </div>
            <div class="uk-width-1-3@s">
                <label class="uk-form-label" for="gender">
                    性別
                </label>
                <div class="uk-form-controls">
                    <label class="uk-margin-small-right">
                        <input class="uk-radio" type="radio" name="gender" value="0" {{ old('gender_id', isset($user) && $user->is_company == 0 ? $user->gender_id: null ) == 0 ? "checked": null}}>
                        男性
                    </label>
                    <label class="uk-margin-small-right">
                        <input class="uk-radio" type="radio" name="gender" value="1" {{ old('gender_id', isset($user) && $user->is_company == 0 ? $user->gender_id: null ) == 1 ? "checked": null}}>
                        女性
                    </label>
                </div>
            </div>
            <div class="uk-width-1-3@s">
                <label class="uk-form-label" for="birthday">
                    生年月日
                </label>
                <div class="uk-form-controls">
                    <input class="uk-input datepicker" type="date" name="birthday" value="@if(isset($user))@date($user->birthday)@endif" required>
                </div>
            </div>
            <div class="uk-width-1-3@s">
                <label class="uk-form-label" for="user_status_id">
                    ご要望
                </label>
                <div class="uk-form-controls">
                    @include('component.input.user_statuses', [ 'value' => old('user_status_id', isset($user) ? $user->user_status_id: null ) ])
                </div>
            </div>
        </div>
    </li>
    <li id="info-base_1">
        <h3>
            会社情報
        </h3>
        <div class="uk-grid-small" uk-grid>
            <div class="uk-width-1-2@s">
                <label class="uk-form-label" for="store_name">
                    屋号または会社名
                </label>
                <div class="uk-form-controls">
                    <input class="uk-input" type="text" name="store_name" value="{{old('store_name', isset($user) ? $user->store_name: null )}}" required>
                </div>
            </div>
            <div class="uk-width-1-1">
                <label class="uk-form-label" for="address">
                    会社住所
                </label>
                <div class="uk-form-controls">
                    <div class="uk-grid-small" uk-grid>
                        <div class="uk-width-medium@s">
                            @include('component.input.prefectures', [ 'value' => old('prefecture_id', isset($user) ? $user->prefecture_id: null ) ])
                        </div>
                        <div class="uk-width-expand">
                            <input class="uk-input" type="text" name="address" value="{{old('address', isset($user) ? $user->address: null )}}"  required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="uk-width-1-3@s">
                <label class="uk-form-label" for="tel">
                    代表番号
                </label>
                <div class="uk-form-controls">
                    <input class="uk-input" type="text" name="tel" value="{{old('tel', isset($user) ? $user->tel: null )}}" required>
                </div>
            </div>
            <div class="uk-width-1-3@s">
                <label class="uk-form-label" for="fax">
                    Fax番号
                </label>
                <div class="uk-form-controls">
                    <input class="uk-input" type="text" name="fax" value="{{old('fax', isset($user) ? $user->fax: null )}}">
                </div>
            </div>
            <div class="uk-width-1-3@s">
                <label class="uk-form-label" for="user_status_id">
                    ご要望
                </label>
                <div class="uk-form-controls">
                    @include('component.input.user_statuses', [ 'value' => old('user_status_id', isset($user) ? $user->user_status_id: null ) ])
                </div>
            </div>
        </div>
        <h3>
            担当者様の情報
        </h3>
        <div class="uk-grid-small" uk-grid>
            <div class="uk-width-1-2">
                <label class="uk-form-label" for="last_name">
                    姓
                </label>
                <div class="uk-form-controls">
                    <input class="uk-input" type="text" name="last_name" value="{{old('last_name', isset($user) ? $user->last_name: null )}}" required>
                </div>
            </div>
            <div class="uk-width-1-2">
                <label class="uk-form-label" for="first_name">
                    名
                </label>
                <div class="uk-form-controls">
                    <input class="uk-input" type="text" name="first_name" value="{{old('first_name', isset($user) ? $user->first_name: null )}}" required>
                </div>
            </div>
            <div class="uk-width-1-2@s">
                <label class="uk-form-label" for="gender">
                    性別
                </label>
                <div class="uk-form-controls">
                    <label class="uk-margin-small-right">
                        <input class="uk-radio" type="radio" name="gender" value="0" {{ old('gender_id', isset($user) && $user->is_company == 1 ? $user->gender_id: null ) == 0 ? "checked": null}}>
                        男性
                    </label>
                    <label class="uk-margin-small-right">
                        <input class="uk-radio" type="radio" name="gender" value="1" {{ old('gender_id', isset($user) && $user->is_company == 1 ? $user->gender_id: null ) == 1 ? "checked": null}}>
                        女性
                    </label>
                </div>
            </div>
            <div class="uk-width-1-2@s">
                <label class="uk-form-label" for="birthday">
                    生年月日
                </label>
                <div class="uk-form-controls">
                    <input class="uk-input datepicker" type="date" name="birthday" value="@if(isset($user))@date($user->birthday)@endif" required>
                </div>
            </div>
            <div class="uk-width-1-2@s">
                <label class="uk-form-label" for="mobile_tel">
                    携帯電話番号
                </label>
                <div class="uk-form-controls">
                    <input class="uk-input" type="text" name="mobile_tel" value="{{old('mobile_tel', isset($user) ? $user->mobile_tel: null )}}" required>
                </div>
            </div>
            <div class="uk-width-1-2@s">
                <label class="uk-form-label" for="job_id">
                    職種
                </label>
                <div class="uk-form-controls">
                    @include('component.input.jobs', [ 'value' => old('job_id', isset($user) ? $user->job_id: null ) ])
                </div>
            </div>
        </div>
    </li>
</ul>


<script type="text/javascript">
//法人・個人の切り替え
var switchCompany = (is_company) => {
    $("#is_company").val(is_company);
    $("#info-base_" + is_company).find('*[name]').each(function(index, el) {
        $(el).attr('disabled', false);
    });
    $("#info-base_" + (1 - is_company) ).find('*[name]').each(function(index, el) {
        $(el).attr('disabled', true);
    });

    $(".is_company-switcher").show();
    $("#mode_"+is_company).hide();
};
//ロード時に初期化
document.addEventListener('DOMContentLoaded', function() {
    switchCompany({{isset($user)? $user->is_company: 1}});
});
</script>
@endif

@if(!isset($form) || $form == "password_only" )
<div uk-grid class="uk-grid-small">
    <div class="uk-width-1-2@s">
        <label class="uk-form-label" for="password">
            パスワード
        </label>
        <div class="uk-form-controls">
            <input class="uk-input" id="password
            " type="password" name="password" required>
        </div>
    </div>
    <div class="uk-width-1-2@s">
        <label class="uk-form-label" for="password_confirmation">
            パスワードの確認
        </label>
        <div class="uk-form-controls">
            <input class="uk-input" id="password_confirmation
            " type="password" name="password_confirmation" required>
        </div>
    </div>
</div>
@endif