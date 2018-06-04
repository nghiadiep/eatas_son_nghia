<div class="form-group">
    <ul class="group-radio-list">
        <li onclick="showInquiryTab(1, 'inquiry-base')">
            <label for="eatery-related-person">
                <input type="radio" id="eatery-related-person" name="related-person" {{(!isset($user) || $user->is_company == 1) ? 'checked' : null}}>
                <span>飲食店関係者</span>
            </label>
        </li>
        <li onclick="showInquiryTab(0, 'inquiry-base')">
            <label for="other-related-person">
                <input type="radio" id="other-related-person" name="related-person" {{(isset($user) && $user->is_company == 0) ? 'checked' : null}}>
                <span>その他</span>
            </label>
        </li>
    </ul>
</div>

<div id="inquiry-base">
    <div id="inquiry-base__1">
        <input type="hidden" name="is_company" value="1">
        <!--/.form-group-->
        <div class="block-form__sec">
            @include("component.user.input", [
                "label" => "屋号または会社名",
                "name" => "store_name",
                "required" => true,
                "type" => "text",
                "value" => old("store_name", isset($user)? $user->store_name : null )
            ])
        </div>

        <div class="block-form__sec">
            @include("component.user.input", [
                "label" => "会社郵便番号",
                "name" => "post_code",
                "required" => true,
                "type" => "text",
                "value" => old("post_code", isset($user)? $user->post_code : null )
            ])
            <div>
                <p class="block-form__error">
                    <span id="post_code_error__1"></span>
                </p>
            </div>
            <!--/.form-group-->
            <div class="form-group form-group-btn">
                <button type="button" class="btn btn--block btn--yellow" onclick="onAutoAddress('post_code','prefecture_id','address', '#post_code_error__1', '{{route('api.utils.post_codes')}}')">
                    郵便番号から住所を入力する
                </button>
            </div>
            <p style="text-align:right; margin-top: -12px;margin-bottom: -12px;">
                <a href="https://developer.yahoo.co.jp/about">
                    <img src="https://s.yimg.jp/images/yjdn/yjdn_attbtn1_125_17.gif" title="Webサービス by Yahoo! JAPAN" alt="Web Services by Yahoo! JAPAN" width="125" height="17" border="0" style="margin:15px 15px 15px 15px">
                </a>
            </p>
            <!--/.form-group-->
        </div>
        <!--/.block-form__sec-->
        <div class="block-form__sec">
            @include("component.user.address_input", [
                "label" => "会社住所",
                "required" => true,
                "value" => [
                    "prefecture_id" => old("prefecture_id", isset($user)? $user->prefecture_id : null ),
                    "address" => old("address", isset($user)? $user->address : null ),
                    "address_detail" => old("address_detail", isset($user)? $user->address_detail : null ),
                    "address_room" => old("address_room", isset($user)? $user->address_room : null ),
                ]
            ])
        </div>
        <!--/.block-form__sec-->
        <div class="block-form__sec">
            @include("component.user.input", [
                "label" => "代表電話番号",
                "name" => "tel",
                "required" => true,
                "type" => "tel",
                "value" => old("tel", isset($user)? $user->tel : null )
            ])
            <!--/.form-group-->
        </div>
        <!--/.block-form__sec-->
        <div class="block-form__sec">
            @include("component.user.input", [
                "label" => "Fax番号",
                "name" => "fax",
                "required" => false,
                "type" => "tel",
                "value" => old("fax", isset($user)? $user->fax : null )
            ])
            <!--/.form-group-->
        </div>
        <!--/.block-form__sec-->
        <div class="block-form__sec">
            @include("component.user.inputs", [
                "label" => "担当者氏名",
                "inputs" => [
                    [
                        "name" => "last_name",
                        "value" => "",
                        "placeholder" => "姓",
                        "type" => "text",
                        "value" => old("last_name", isset($user)? $user->last_name : null )
                    ],[
                        "name" => "first_name",
                        "value" => "",
                        "placeholder" => "名",
                        "type" => "text",
                        "value" => old("first_name", isset($user)? $user->first_name : null )
                    ],
                ],
                "required" => true,
            ])
            <!--/.form-group-->
        </div>
        <!--/.block-form__sec-->
        <div class="block-form__sec">
            @include("component.user.select", [
                "label" => "担当者性別",
                "name" => "gender",
                "required" => false,
                "init" => old("gender", isset($user)? $user->gender : null ),
                "options" => [
                    [ "label" => "選択なし", "value" => null ],
                    [ "label" => "男性", "value" => 0 ],
                    [ "label" => "女性", "value" => 1 ]
                ]
            ])
            <!--/.form-group-->
        </div>
        <!--/.block-form__sec-->
        <div class="block-form__sec">
            @include("component.user.date", [
                "label" => "担当者生年月日",
                "name" => "birthday",
                "value" => old("birthday", isset($user)? $user->birthday : null ),
                "required" => true,
            ])
            <!--/.form-group-->
        </div>
        <!--/.block-form__sec-->
        <div class="block-form__sec">
            @include("component.user.input", [
                "label" => "担当者と連絡が取れる電話番号",
                "name" => "mobile_tel",
                "required" => true,
                "type" => "tel",
                "value" => old("mobile_tel", isset($user)? $user->mobile_tel : null )
            ])
            <!--/.form-group-->
        </div>
        <!--/.block-form__sec-->
        <div class="block-form__sec">
            <div class="form-group">
                <label class="sub-title">
                    <span>担当者職種</span>
                    <span class="sub-title__require">必須</span>
                </label>
                <div class="select-group">
                    <label>
                        @include("component.input.jobs", [
                            "name" => "job_id",
                            "value" => "",
                            "required" => true,
                            "value" => old("job_id", isset($user)? $user->job_id : null )
                        ])
                    </label>
                </div>
            </div>
            <!--/.form-group-->
        </div>
        <!--/.block-form__sec-->
    </div>

    <div id="inquiry-base__0">
        <input type="hidden" name="is_company" value="0">
        <div class="block-form__sec">
            @include("component.user.inputs", [
                "label" => "氏名",
                "inputs" => [
                    [
                        "name" => "last_name",
                        "placeholder" => "姓",
                        "type" => "text",
                        "value" => old("last_name", isset($user)? $user->last_name : null )
                    ],[
                        "name" => "first_name",
                        "placeholder" => "名",
                        "type" => "text",
                        "value" => old("first_name", isset($user)? $user->first_name : null )
                    ],
                ],
                "required" => true,
            ])
            <!--/.form-group-->
        </div>
        <div class="block-form__sec">
            @include("component.user.input", [
                "label" => "郵便番号",
                "name" => "post_code",
                "value" => old("post_code", isset($user)? $user->post_code : null ),
                "required" => true,
                "type" => "text"
            ])
            <div >
                <p class="block-form__error">
                    <span id="post_code_error__2"></span>
                </p>
            </div>
            <!--/.form-group-->
            <div class="form-group form-group-btn">
                <button type="button" class="btn btn--block btn--yellow" onclick="onAutoAddress('post_code','prefecture_id','address', '#post_code_error__2', '{{route('api.utils.post_codes')}}')">
                    郵便番号から住所を入力する
                </button>
            </div>
            <p style="text-align:right; margin-top: -12px;margin-bottom: -12px;">
                <a href="https://developer.yahoo.co.jp/about">
                    <img src="https://s.yimg.jp/images/yjdn/yjdn_attbtn1_125_17.gif" title="Webサービス by Yahoo! JAPAN" alt="Web Services by Yahoo! JAPAN" width="125" height="17" border="0" style="margin:15px 15px 15px 15px">
                </a>
            </p>
            <!--/.form-group-->
        </div>
        <div class="block-form__sec">
            @include("component.user.address_input", [
                "label" => "住所",
                "required" => true,
                "value" => [
                    "prefecture_id" => old("prefecture_id", isset($user)? $user->prefecture_id : null ),
                    "address" => old("address", isset($user)? $user->address : null ),
                    "address_detail" => old("address_detail", isset($user)? $user->address_detail : null ),
                    "address_room" => old("address_room", isset($user)? $user->address_room : null ),
                ]
            ])
        </div>
        <div class="block-form__sec">
            @include("component.user.input", [
                "label" => "電話番号",
                "name" => "tel",
                "value" => old("tel", isset($user)? $user->tel : null ),
                "required" => true,
                "type" => "tel"
            ])
            <!--/.form-group-->
        </div>
        <div class="block-form__sec">
            @include("component.user.input", [
                "label" => "携帯番号",
                "name" => "mobile_tel",
                "value" => old("mobile_tel", isset($user)? $user->mobile_tel : null ),
                "required" => false,
                "type" => "tel"
            ])
            <!--/.form-group-->
        </div>
        <div class="block-form__sec">
            @include("component.user.input", [
                "label" => "Fax番号",
                "name" => "fax",
                "value" => old("fax", isset($user)? $user->fax: null ),
                "required" => false,
                "type" => "tel"
            ])
            <!--/.form-group-->
        </div>
        <div class="block-form__sec">
            @include("component.user.select", [
                "label" => "性別",
                "name" => "gender",
                "required" => false,
                "init" => old("gender", isset($user)? $user->gender : 0 ),
                "options" => [
                    [ "label" => "選択なし", "value" => null ],
                    [ "label" => "男性", "value" => 0 ],
                    [ "label" => "女性", "value" => 1 ]
                ]
            ])
        </div>
        <div class="block-form__sec">
            @include("component.user.date", [
                "label" => "生年月日",
                "name" => "birthday",
                "value" => old("birthday", isset($user)? $user->birthday : null ),
                "required" => true,
            ])
            <!--/.form-group-->
        </div>

        <div class="block-form__sec">
            @include("component.user.input", [
                "label" => "会社名",
                "name" => "company_name",
                "value" => old("company_name", isset($user)? $user->company_name: null ),
                "required" => false,
                "type" => "tel"
            ])
            <!--/.form-group-->
        </div>
    </div>
</div>


@auth('user')
<input type="hidden" name="term_agree" value="on">
@else
<!--/.block-form__sec-->
<div class="block-form__sec">
    <div class="block-form__btn-list">
        <ul>
            <li>
                <a target="__blank" href="{{route('root.term')}}" class="btn btn--block btn--gray">利用規約を読む</a>
            </li>
            <li>
                <a target="__blank" href="{{config('app.company_privacy_url')}}" class="btn btn--block btn--gray">プライバシーポリシーを読む</a>
            </li>
        </ul>
    </div>
    <!--/.block-form__btn-list-->
    <div class="checkbox-group">
        <label class="term-label">
            <input type="checkbox" name="term_agree" required>
            <span>
                <span>利用規約およびプライバシーポリシーを確認し、同意しました</span>
            </span>
        </label>
    </div>
    <!--/.checkbox-group-->
</div>
@endauth

<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
    var defMode = {{isset($user)? $user->is_company: 1}};
    showInquiryTab(defMode, 'inquiry-base');
});
</script>