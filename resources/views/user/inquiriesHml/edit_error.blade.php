@extends('layouts.user.default')

@section('content')

<h2 class="page-title">資料請求</h2>
<div class="content-center">
    <div class="block-form">
        <p class="block-form__notice mb18-ipt">
            資料をお届けする先の登録と、簡単なアンケートへご協力ください。
        </p>
        <section>
            <h2 class="title-center">
                <span>お客様情報</span>
            </h2>
            <section class="block-alert mb14-ipt">
                <h2 class="block-alert__title">
                    <span>ご確認ください</span>
                </h2>
                <ul class="block-alert__list">
                    <li>屋号を入力してください。</li>
                    <li>会社の郵便番号を入力してください。</li>
                    <li>会社住所を入力してください。</li>
                    <li>代表電話番号を入力してください。</li>
                    <li>担当者名を入力してください。</li>
                    <li>担当者の性別を選択してください。</li>
                    <li>担当者の生年月日を選択してください。</li>
                    <li>担当者に連絡できる電話番号を入力してください。</li>
                    <li>職種を選択してください。</li>
                </ul>
            </section>
            <form method="POST" action="http://10.11.6.28:8000/user/inquiries/edit?product_id=1" class="checkable-submit">
                <input type="hidden" name="_token" value="3ATwNKVLHmEzPwlEP8O7cnw4AoBiirPWA4ZZosw1">
                                <div class="form-group">
    <ul class="group-radio-list">
        <li onclick="showInquiryTab(1, 'inquiry-base')">
            <label for="eatery-related-person">
                <input type="radio" id="eatery-related-person" name="related-person" checked="">
                <span>飲食店関係者</span>
            </label>
        </li>
        <li onclick="showInquiryTab(0, 'inquiry-base')">
            <label for="other-related-person">
                <input type="radio" id="other-related-person" name="related-person">
                <span>その他</span>
            </label>
        </li>
    </ul>
</div>

<div id="inquiry-base">
    <div id="inquiry-base__1" hidden="hidden">
        <input type="hidden" name="is_company" value="1" disabled="disabled">
        <!--/.form-group-->
        <div class="block-form__sec">
            <div class="form-group">

        <label class="sub-title" for="input-store_name">
        <span>屋号または会社名</span>
                <span class="sub-title__require">必須</span>
            </label>
    
    <div>
        <input type="text" class="form-control error" name="store_name" value="" placeholder="" required="" v-model="" v-bind:class="" disabled="disabled">
            </div>
</div>        </div>

        <div class="block-form__sec">
            <div class="form-group">

        <label class="sub-title" for="input-post_code">
        <span>会社郵便番号</span>
                <span class="sub-title__require">必須</span>
            </label>
    
    <div>
        <input type="text" class="form-control error" name="post_code" value="" placeholder="" required="" v-model="" v-bind:class="" disabled="disabled">
            </div>
</div>            <div>
                <p class="block-form__error">
                    <span id="post_code_error__1"></span>
                </p>
            </div>
            <!--/.form-group-->
            <div class="form-group form-group-btn">
                <button type="button" class="btn btn--block btn--yellow" onclick="onAutoAddress('post_code','prefecture_id','address', '#post_code_error__1', 'http://10.11.6.28:8000/api/rest/utils/post_code')">
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
            <div class="form-group">
    <label class="sub-title">
        <span>会社住所</span>
                <span class="sub-title__require">必須</span>
            </label>
    <div class="select-group">
        <label class="error">
            <select class="uk-select" name="prefecture_id" required="" disabled="disabled">
    <option value="">選択してください</option>
                        <optgroup label="北海道・東北地方">
        
                    <option value="1">
                北海道
            </option>
        
                    
                    <option value="2">
                青森県
            </option>
        
                    
                    <option value="3">
                岩手県
            </option>
        
                    
                    <option value="4">
                宮城県
            </option>
        
                    
                    <option value="5">
                秋田県
            </option>
        
                    
                    <option value="6">
                山形県
            </option>
        
                    
                    <option value="7">
                福島県
            </option>
        
                                </optgroup>
            <optgroup label="関東地方">
        
                    <option value="8">
                茨城県
            </option>
        
                    
                    <option value="9">
                栃木県
            </option>
        
                    
                    <option value="10">
                群馬県
            </option>
        
                    
                    <option value="11">
                埼玉県
            </option>
        
                    
                    <option value="12">
                千葉県
            </option>
        
                    
                    <option value="13">
                東京都
            </option>
        
                    
                    <option value="14">
                神奈川県
            </option>
        
                                </optgroup>
            <optgroup label="中部地方">
        
                    <option value="15">
                新潟県
            </option>
        
                    
                    <option value="16">
                富山県
            </option>
        
                    
                    <option value="17">
                石川県
            </option>
        
                    
                    <option value="18">
                福井県
            </option>
        
                    
                    <option value="19">
                山梨県
            </option>
        
                    
                    <option value="20">
                長野県
            </option>
        
                    
                    <option value="21">
                岐阜県
            </option>
        
                    
                    <option value="22">
                静岡県
            </option>
        
                    
                    <option value="23">
                愛知県
            </option>
        
                    
                    <option value="24">
                三重県
            </option>
        
                                </optgroup>
            <optgroup label="関西地方">
        
                    <option value="25">
                滋賀県
            </option>
        
                    
                    <option value="26">
                京都府
            </option>
        
                    
                    <option value="27">
                大阪府
            </option>
        
                    
                    <option value="28">
                兵庫県
            </option>
        
                    
                    <option value="29">
                奈良県
            </option>
        
                    
                    <option value="30">
                和歌山県
            </option>
        
                                </optgroup>
            <optgroup label="中国地方">
        
                    <option value="31">
                鳥取県
            </option>
        
                    
                    <option value="32">
                島根県
            </option>
        
                    
                    <option value="33">
                岡山県
            </option>
        
                    
                    <option value="34">
                広島県
            </option>
        
                    
                    <option value="35">
                山口県
            </option>
        
                                </optgroup>
            <optgroup label="四国地方">
        
                    <option value="36">
                徳島県
            </option>
        
                    
                    <option value="37">
                香川県
            </option>
        
                    
                    <option value="38">
                愛媛県
            </option>
        
                    
                    <option value="39">
                高知県
            </option>
        
                                </optgroup>
            <optgroup label="九州地方">
        
                    <option value="40">
                福岡県
            </option>
        
                    
                    <option value="41">
                佐賀県
            </option>
        
                    
                    <option value="42">
                長崎県
            </option>
        
                    
                    <option value="43">
                熊本県
            </option>
        
                    
                    <option value="44">
                大分県
            </option>
        
                    
                    <option value="45">
                宮崎県
            </option>
        
                    
                    <option value="46">
                鹿児島県
            </option>
        
                    
                    <option value="47">
                沖縄県
            </option>
        
                     </optgroup>
            </select>        </label>
    </div>
</div>
<!--/.form-group-->
<div class="form-group">

    
    <div>
        <input type="text" class="form-control " name="address" value="" placeholder="市区町村" required="" v-model="" v-bind:class="" disabled="disabled">
            </div>
</div><!--/.form-group-->
<div class="form-group">

    
    <div>
        <input type="text" class="form-control " name="address_detail" value="" placeholder="続きの住所" v-model="" v-bind:class="" disabled="disabled">
            </div>
</div><!--/.form-group-->
<div class="form-group">

    
    <div>
        <input type="text" class="form-control error" name="address_room" value="" placeholder="マンション名・部屋番号" v-model="" v-bind:class="" disabled="disabled">
            </div>
</div>        </div>
        <!--/.block-form__sec-->
        <div class="block-form__sec">
            <div class="form-group">

        <label class="sub-title" for="input-tel">
        <span>代表電話番号</span>
                <span class="sub-title__require">必須</span>
            </label>
    
    <div>
        <input type="text" class="form-control error" name="tel" value="" placeholder="" required="" v-model="" v-bind:class="" disabled="disabled">
            </div>
</div>            <!--/.form-group-->
        </div>
        <!--/.block-form__sec-->
        <div class="block-form__sec">
            <div class="form-group">

        <label class="sub-title" for="input-fax">
        <span>Fax番号</span>
            </label>
    
    <div>
        <input type="text" class="form-control " name="fax" value="" placeholder="" v-model="" v-bind:class="" disabled="disabled">
            </div>
</div>            <!--/.form-group-->
        </div>
        <!--/.block-form__sec-->
        <div class="block-form__sec">
            <div class="form-group">

        <label class="sub-title">
        <span>担当者氏名</span>
                <span class="sub-title__require">必須</span>
            </label>
    
    <div class="form-controls">
                        <input type="text" class="form-control error" name="last_name" value="" placeholder="姓" required="" v-model="" v-bind:class="" disabled="disabled">
                        <input type="text" class="form-control error" name="first_name" value="" placeholder="名" required="" v-model="" v-bind:class="" disabled="disabled">
            </div>

    </div>            <!--/.form-group-->
        </div>
        <!--/.block-form__sec-->
        <div class="block-form__sec">
            <div class="form-group">
        <label class="sub-title" for="input-gender">
        <span>担当者性別</span>
            </label>
    
    <div class="select-group">
        <label>
            <select name="gender" v-model="" disabled="disabled">
                <option value="null">選択してください</option>

                                <option value="" selected="">
                    選択なし
                </option>
                                <option value="0">
                    男性
                </option>
                                <option value="1">
                    女性
                </option>
                
            </select>
        </label>
    </div>
</div>            <!--/.form-group-->
        </div>
        <!--/.block-form__sec-->
        <div class="block-form__sec">
            <div class="form-group">
        <label class="sub-title" for="input-birthday">
        <span>担当者生年月日</span>
                <span class="sub-title__require">必須</span>
            </label>
    
    <div class="block-form__date-list clearfix">
        <div class="block-form__date-list__year">
            <div class="select-group">
                <label>
                    <select name="birthday__year" onchange="changeDate('birthday')" disabled="disabled">
                        <option>年</option>
                                                <option value="1950">
                            1950年
                        </option>
                                                <option value="1951">
                            1951年
                        </option>
                                                <option value="1952">
                            1952年
                        </option>
                                                <option value="1953">
                            1953年
                        </option>
                                                <option value="1954">
                            1954年
                        </option>
                                                <option value="1955">
                            1955年
                        </option>
                                                <option value="1956">
                            1956年
                        </option>
                                                <option value="1957">
                            1957年
                        </option>
                                                <option value="1958">
                            1958年
                        </option>
                                                <option value="1959">
                            1959年
                        </option>
                                                <option value="1960">
                            1960年
                        </option>
                                                <option value="1961">
                            1961年
                        </option>
                                                <option value="1962">
                            1962年
                        </option>
                                                <option value="1963">
                            1963年
                        </option>
                                                <option value="1964">
                            1964年
                        </option>
                                                <option value="1965">
                            1965年
                        </option>
                                                <option value="1966">
                            1966年
                        </option>
                                                <option value="1967">
                            1967年
                        </option>
                                                <option value="1968">
                            1968年
                        </option>
                                                <option value="1969">
                            1969年
                        </option>
                                                <option value="1970">
                            1970年
                        </option>
                                                <option value="1971">
                            1971年
                        </option>
                                                <option value="1972">
                            1972年
                        </option>
                                                <option value="1973">
                            1973年
                        </option>
                                                <option value="1974">
                            1974年
                        </option>
                                                <option value="1975">
                            1975年
                        </option>
                                                <option value="1976">
                            1976年
                        </option>
                                                <option value="1977">
                            1977年
                        </option>
                                                <option value="1978">
                            1978年
                        </option>
                                                <option value="1979">
                            1979年
                        </option>
                                                <option value="1980">
                            1980年
                        </option>
                                                <option value="1981">
                            1981年
                        </option>
                                                <option value="1982">
                            1982年
                        </option>
                                                <option value="1983">
                            1983年
                        </option>
                                                <option value="1984">
                            1984年
                        </option>
                                                <option value="1985">
                            1985年
                        </option>
                                                <option value="1986">
                            1986年
                        </option>
                                                <option value="1987">
                            1987年
                        </option>
                                                <option value="1988">
                            1988年
                        </option>
                                                <option value="1989">
                            1989年
                        </option>
                                                <option value="1990">
                            1990年
                        </option>
                                                <option value="1991">
                            1991年
                        </option>
                                                <option value="1992">
                            1992年
                        </option>
                                                <option value="1993">
                            1993年
                        </option>
                                                <option value="1994">
                            1994年
                        </option>
                                                <option value="1995">
                            1995年
                        </option>
                                                <option value="1996">
                            1996年
                        </option>
                                                <option value="1997">
                            1997年
                        </option>
                                                <option value="1998">
                            1998年
                        </option>
                                                <option value="1999">
                            1999年
                        </option>
                                                <option value="2000">
                            2000年
                        </option>
                                                <option value="2001">
                            2001年
                        </option>
                                                <option value="2002">
                            2002年
                        </option>
                                                <option value="2003">
                            2003年
                        </option>
                                                <option value="2004">
                            2004年
                        </option>
                                                <option value="2005">
                            2005年
                        </option>
                                                <option value="2006">
                            2006年
                        </option>
                                                <option value="2007">
                            2007年
                        </option>
                                                <option value="2008">
                            2008年
                        </option>
                                                <option value="2009">
                            2009年
                        </option>
                                                <option value="2010">
                            2010年
                        </option>
                                                <option value="2011">
                            2011年
                        </option>
                                                <option value="2012">
                            2012年
                        </option>
                                                <option value="2013">
                            2013年
                        </option>
                                                <option value="2014">
                            2014年
                        </option>
                                                <option value="2015">
                            2015年
                        </option>
                                                <option value="2016">
                            2016年
                        </option>
                                                <option value="2017">
                            2017年
                        </option>
                                                <option value="2018" selected="">
                            2018年
                        </option>
                                            </select>
                </label>
            </div>
        </div>
        <!--/.block-form__date-list__year-->
        <div class="block-form__date-list__month">
            <div class="select-group">
                <label>
                    <select name="birthday__month" onchange="changeDate('birthday')" disabled="disabled">
                        <option>月</option>
                                                <option value="1">
                            1月
                        </option>
                                                <option value="2">
                            2月
                        </option>
                                                <option value="3">
                            3月
                        </option>
                                                <option value="4">
                            4月
                        </option>
                                                <option value="5">
                            5月
                        </option>
                                                <option value="6" selected="">
                            6月
                        </option>
                                                <option value="7">
                            7月
                        </option>
                                                <option value="8">
                            8月
                        </option>
                                                <option value="9">
                            9月
                        </option>
                                                <option value="10">
                            10月
                        </option>
                                                <option value="11">
                            11月
                        </option>
                                                <option value="12">
                            12月
                        </option>
                                            </select>
                </label>
            </div>
        </div>
        <!--/.block-form__date-list__month-->
        <div class="block-form__date-list__day">
            <div class="select-group">
                <label>
                    <select name="birthday__day" onchange="changeDate('birthday')" disabled="disabled">
                        <option>日</option>
                                                <option value="1" selected="">
                            1日
                        </option>
                                                <option value="2">
                            2日
                        </option>
                                                <option value="3">
                            3日
                        </option>
                                                <option value="4">
                            4日
                        </option>
                                                <option value="5">
                            5日
                        </option>
                                                <option value="6">
                            6日
                        </option>
                                                <option value="7">
                            7日
                        </option>
                                                <option value="8">
                            8日
                        </option>
                                                <option value="9">
                            9日
                        </option>
                                                <option value="10">
                            10日
                        </option>
                                                <option value="11">
                            11日
                        </option>
                                                <option value="12">
                            12日
                        </option>
                                                <option value="13">
                            13日
                        </option>
                                                <option value="14">
                            14日
                        </option>
                                                <option value="15">
                            15日
                        </option>
                                                <option value="16">
                            16日
                        </option>
                                                <option value="17">
                            17日
                        </option>
                                                <option value="18">
                            18日
                        </option>
                                                <option value="19">
                            19日
                        </option>
                                                <option value="20">
                            20日
                        </option>
                                                <option value="21">
                            21日
                        </option>
                                                <option value="22">
                            22日
                        </option>
                                                <option value="23">
                            23日
                        </option>
                                                <option value="24">
                            24日
                        </option>
                                                <option value="25">
                            25日
                        </option>
                                                <option value="26">
                            26日
                        </option>
                                                <option value="27">
                            27日
                        </option>
                                                <option value="28">
                            28日
                        </option>
                                                <option value="29">
                            29日
                        </option>
                                                <option value="30">
                            30日
                        </option>
                                                <option value="31">
                            31日
                        </option>
                                            </select>
                </label>
            </div>
        </div>
        <!--/.block-form__date-list__day-->
    </div>
    <!--/.block-form__date-list-->
    <input type="hidden" name="birthday" value="2018-06-01" v-model="" disabled="disabled">
</div>            <!--/.form-group-->
        </div>
        <!--/.block-form__sec-->
        <div class="block-form__sec">
            <div class="form-group">

        <label class="sub-title" for="input-mobile_tel">
        <span>担当者と連絡が取れる電話番号</span>
                <span class="sub-title__require">必須</span>
            </label>
    
    <div>
        <input type="text" class="form-control error" name="mobile_tel" value="" placeholder="" required="" v-model="" v-bind:class="" disabled="disabled">
            </div>
</div>            <!--/.form-group-->
        </div>
        <!--/.block-form__sec-->
        <div class="block-form__sec">
            <div class="form-group">
                <label class="sub-title">
                    <span>担当者職種</span>
                    <span class="sub-title__require">必須</span>
                </label>
                <div class="select-group">
                    <label class="error">
                        <select class="uk-select" name="job_id" required="" v-model="" disabled="disabled">
    <option value="">選択してください</option>
                        <option value="1">
                オーナー（法人経営）
            </option>
                                <option value="2">
                オーナー（個人事業主）
            </option>
                                <option value="3">
                店長
            </option>
                                <option value="4">
                料理長
            </option>
                                <option value="5">
                店舗社員
            </option>
                                <option value="6">
                アルバイト
            </option>
                                <option value="7">
                事務
            </option>
                                <option value="8">
                その他
            </option>
            </select>                    </label>
                </div>
            </div>
            <!--/.form-group-->
        </div>
        <!--/.block-form__sec-->
    </div>

    <div id="inquiry-base__0">
        <input type="hidden" name="is_company" value="0">
        <div class="block-form__sec">
            <div class="form-group">

        <label class="sub-title">
        <span>氏名</span>
                <span class="sub-title__require">必須</span>
            </label>
    
    <div class="form-controls">
                        <input type="text" class="form-control error" name="last_name" value="" placeholder="姓" required="" v-model="" v-bind:class="">
                        <input type="text" class="form-control error" name="first_name" value="" placeholder="名" required="" v-model="" v-bind:class="">
            </div>

    </div>            <!--/.form-group-->
        </div>
        <div class="block-form__sec">
            <div class="form-group">

        <label class="sub-title" for="input-post_code">
        <span>郵便番号</span>
                <span class="sub-title__require">必須</span>
            </label>
    
    <div>
        <input type="text" class="form-control error" name="post_code" value="" placeholder="" required="" v-model="" v-bind:class="">
            </div>
</div>            <div>
                <p class="block-form__error">
                    <span id="post_code_error__2"></span>
                </p>
            </div>
            <!--/.form-group-->
            <div class="form-group form-group-btn">
                <button type="button" class="btn btn--block btn--yellow" onclick="onAutoAddress('post_code','prefecture_id','address', '#post_code_error__2', 'http://10.11.6.28:8000/api/rest/utils/post_code')">
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
            <div class="form-group">
    <label class="sub-title">
        <span>住所</span>
                <span class="sub-title__require">必須</span>
            </label>
    <div class="select-group">
        <label class="error">
            <select class="uk-select" name="prefecture_id" required="">
    <option value="">選択してください</option>
                        <optgroup label="北海道・東北地方">
        
                    <option value="1">
                北海道
            </option>
        
                    
                    <option value="2">
                青森県
            </option>
        
                    
                    <option value="3">
                岩手県
            </option>
        
                    
                    <option value="4">
                宮城県
            </option>
        
                    
                    <option value="5">
                秋田県
            </option>
        
                    
                    <option value="6">
                山形県
            </option>
        
                    
                    <option value="7">
                福島県
            </option>
        
                                </optgroup>
            <optgroup label="関東地方">
        
                    <option value="8">
                茨城県
            </option>
        
                    
                    <option value="9">
                栃木県
            </option>
        
                    
                    <option value="10">
                群馬県
            </option>
        
                    
                    <option value="11">
                埼玉県
            </option>
        
                    
                    <option value="12">
                千葉県
            </option>
        
                    
                    <option value="13">
                東京都
            </option>
        
                    
                    <option value="14">
                神奈川県
            </option>
        
                                </optgroup>
            <optgroup label="中部地方">
        
                    <option value="15">
                新潟県
            </option>
        
                    
                    <option value="16">
                富山県
            </option>
        
                    
                    <option value="17">
                石川県
            </option>
        
                    
                    <option value="18">
                福井県
            </option>
        
                    
                    <option value="19">
                山梨県
            </option>
        
                    
                    <option value="20">
                長野県
            </option>
        
                    
                    <option value="21">
                岐阜県
            </option>
        
                    
                    <option value="22">
                静岡県
            </option>
        
                    
                    <option value="23">
                愛知県
            </option>
        
                    
                    <option value="24">
                三重県
            </option>
        
                                </optgroup>
            <optgroup label="関西地方">
        
                    <option value="25">
                滋賀県
            </option>
        
                    
                    <option value="26">
                京都府
            </option>
        
                    
                    <option value="27">
                大阪府
            </option>
        
                    
                    <option value="28">
                兵庫県
            </option>
        
                    
                    <option value="29">
                奈良県
            </option>
        
                    
                    <option value="30">
                和歌山県
            </option>
        
                                </optgroup>
            <optgroup label="中国地方">
        
                    <option value="31">
                鳥取県
            </option>
        
                    
                    <option value="32">
                島根県
            </option>
        
                    
                    <option value="33">
                岡山県
            </option>
        
                    
                    <option value="34">
                広島県
            </option>
        
                    
                    <option value="35">
                山口県
            </option>
        
                                </optgroup>
            <optgroup label="四国地方">
        
                    <option value="36">
                徳島県
            </option>
        
                    
                    <option value="37">
                香川県
            </option>
        
                    
                    <option value="38">
                愛媛県
            </option>
        
                    
                    <option value="39">
                高知県
            </option>
        
                                </optgroup>
            <optgroup label="九州地方">
        
                    <option value="40">
                福岡県
            </option>
        
                    
                    <option value="41">
                佐賀県
            </option>
        
                    
                    <option value="42">
                長崎県
            </option>
        
                    
                    <option value="43">
                熊本県
            </option>
        
                    
                    <option value="44">
                大分県
            </option>
        
                    
                    <option value="45">
                宮崎県
            </option>
        
                    
                    <option value="46">
                鹿児島県
            </option>
        
                    
                    <option value="47">
                沖縄県
            </option>
        
                     </optgroup>
            </select>        </label>
    </div>
</div>
<!--/.form-group-->
<div class="form-group">

    
    <div>
        <input type="text" class="form-control error" name="address" value="" placeholder="市区町村" required="" v-model="" v-bind:class="">
            </div>
</div><!--/.form-group-->
<div class="form-group">

    
    <div>
        <input type="text" class="form-control error" name="address_detail" value="" placeholder="続きの住所" v-model="" v-bind:class="">
            </div>
</div><!--/.form-group-->
<div class="form-group">

    
    <div>
        <input type="text" class="form-control error" name="address_room" value="" placeholder="マンション名・部屋番号" v-model="" v-bind:class="">
            </div>
</div>        </div>
        <div class="block-form__sec">
            <div class="form-group">

        <label class="sub-title" for="input-tel">
        <span>電話番号</span>
                <span class="sub-title__require">必須</span>
            </label>
    
    <div>
        <input type="text" class="form-control error" name="tel" value="" placeholder="" required="" v-model="" v-bind:class="">
            </div>
</div>            <!--/.form-group-->
        </div>
        <div class="block-form__sec">
            <div class="form-group">

        <label class="sub-title" for="input-mobile_tel">
        <span>携帯番号</span>
            </label>
    
    <div>
        <input type="text" class="form-control " name="mobile_tel" value="" placeholder="" v-model="" v-bind:class="">
            </div>
</div>            <!--/.form-group-->
        </div>
        <div class="block-form__sec">
            <div class="form-group">

        <label class="sub-title" for="input-fax">
        <span>Fax番号</span>
            </label>
    
    <div>
        <input type="text" class="form-control " name="fax" value="" placeholder="" v-model="" v-bind:class="">
            </div>
</div>            <!--/.form-group-->
        </div>
        <div class="block-form__sec">
            <div class="form-group">
        <label class="sub-title" for="input-gender">
        <span>性別</span>
            </label>
    
    <div class="select-group">
        <label>
            <select name="gender" v-model="">
                <option value="null">選択してください</option>

                                <option value="">
                    選択なし
                </option>
                                <option value="0" selected="">
                    男性
                </option>
                                <option value="1">
                    女性
                </option>
                
            </select>
        </label>
    </div>
</div>        </div>
        <div class="block-form__sec">
            <div class="form-group">
        <label class="sub-title" for="input-birthday">
        <span>生年月日</span>
                <span class="sub-title__require">必須</span>
            </label>
    
    <div class="block-form__date-list clearfix">
        <div class="block-form__date-list__year">
            <div class="select-group">
                <label>
                    <select name="birthday__year" onchange="changeDate('birthday')">
                        <option>年</option>
                                                <option value="1950">
                            1950年
                        </option>
                                                <option value="1951">
                            1951年
                        </option>
                                                <option value="1952">
                            1952年
                        </option>
                                                <option value="1953">
                            1953年
                        </option>
                                                <option value="1954">
                            1954年
                        </option>
                                                <option value="1955">
                            1955年
                        </option>
                                                <option value="1956">
                            1956年
                        </option>
                                                <option value="1957">
                            1957年
                        </option>
                                                <option value="1958">
                            1958年
                        </option>
                                                <option value="1959">
                            1959年
                        </option>
                                                <option value="1960">
                            1960年
                        </option>
                                                <option value="1961">
                            1961年
                        </option>
                                                <option value="1962">
                            1962年
                        </option>
                                                <option value="1963">
                            1963年
                        </option>
                                                <option value="1964">
                            1964年
                        </option>
                                                <option value="1965">
                            1965年
                        </option>
                                                <option value="1966">
                            1966年
                        </option>
                                                <option value="1967">
                            1967年
                        </option>
                                                <option value="1968">
                            1968年
                        </option>
                                                <option value="1969">
                            1969年
                        </option>
                                                <option value="1970">
                            1970年
                        </option>
                                                <option value="1971">
                            1971年
                        </option>
                                                <option value="1972">
                            1972年
                        </option>
                                                <option value="1973">
                            1973年
                        </option>
                                                <option value="1974">
                            1974年
                        </option>
                                                <option value="1975">
                            1975年
                        </option>
                                                <option value="1976">
                            1976年
                        </option>
                                                <option value="1977">
                            1977年
                        </option>
                                                <option value="1978">
                            1978年
                        </option>
                                                <option value="1979">
                            1979年
                        </option>
                                                <option value="1980">
                            1980年
                        </option>
                                                <option value="1981">
                            1981年
                        </option>
                                                <option value="1982">
                            1982年
                        </option>
                                                <option value="1983">
                            1983年
                        </option>
                                                <option value="1984">
                            1984年
                        </option>
                                                <option value="1985">
                            1985年
                        </option>
                                                <option value="1986">
                            1986年
                        </option>
                                                <option value="1987">
                            1987年
                        </option>
                                                <option value="1988">
                            1988年
                        </option>
                                                <option value="1989">
                            1989年
                        </option>
                                                <option value="1990">
                            1990年
                        </option>
                                                <option value="1991">
                            1991年
                        </option>
                                                <option value="1992">
                            1992年
                        </option>
                                                <option value="1993">
                            1993年
                        </option>
                                                <option value="1994">
                            1994年
                        </option>
                                                <option value="1995">
                            1995年
                        </option>
                                                <option value="1996">
                            1996年
                        </option>
                                                <option value="1997">
                            1997年
                        </option>
                                                <option value="1998">
                            1998年
                        </option>
                                                <option value="1999">
                            1999年
                        </option>
                                                <option value="2000">
                            2000年
                        </option>
                                                <option value="2001">
                            2001年
                        </option>
                                                <option value="2002">
                            2002年
                        </option>
                                                <option value="2003">
                            2003年
                        </option>
                                                <option value="2004">
                            2004年
                        </option>
                                                <option value="2005">
                            2005年
                        </option>
                                                <option value="2006">
                            2006年
                        </option>
                                                <option value="2007">
                            2007年
                        </option>
                                                <option value="2008">
                            2008年
                        </option>
                                                <option value="2009">
                            2009年
                        </option>
                                                <option value="2010">
                            2010年
                        </option>
                                                <option value="2011">
                            2011年
                        </option>
                                                <option value="2012">
                            2012年
                        </option>
                                                <option value="2013">
                            2013年
                        </option>
                                                <option value="2014">
                            2014年
                        </option>
                                                <option value="2015">
                            2015年
                        </option>
                                                <option value="2016">
                            2016年
                        </option>
                                                <option value="2017">
                            2017年
                        </option>
                                                <option value="2018" selected="">
                            2018年
                        </option>
                                            </select>
                </label>
            </div>
        </div>
        <!--/.block-form__date-list__year-->
        <div class="block-form__date-list__month">
            <div class="select-group">
                <label>
                    <select name="birthday__month" onchange="changeDate('birthday')">
                        <option>月</option>
                                                <option value="1">
                            1月
                        </option>
                                                <option value="2">
                            2月
                        </option>
                                                <option value="3">
                            3月
                        </option>
                                                <option value="4">
                            4月
                        </option>
                                                <option value="5">
                            5月
                        </option>
                                                <option value="6" selected="">
                            6月
                        </option>
                                                <option value="7">
                            7月
                        </option>
                                                <option value="8">
                            8月
                        </option>
                                                <option value="9">
                            9月
                        </option>
                                                <option value="10">
                            10月
                        </option>
                                                <option value="11">
                            11月
                        </option>
                                                <option value="12">
                            12月
                        </option>
                                            </select>
                </label>
            </div>
        </div>
        <!--/.block-form__date-list__month-->
        <div class="block-form__date-list__day">
            <div class="select-group">
                <label>
                    <select name="birthday__day" onchange="changeDate('birthday')">
                        <option>日</option>
                                                <option value="1" selected="">
                            1日
                        </option>
                                                <option value="2">
                            2日
                        </option>
                                                <option value="3">
                            3日
                        </option>
                                                <option value="4">
                            4日
                        </option>
                                                <option value="5">
                            5日
                        </option>
                                                <option value="6">
                            6日
                        </option>
                                                <option value="7">
                            7日
                        </option>
                                                <option value="8">
                            8日
                        </option>
                                                <option value="9">
                            9日
                        </option>
                                                <option value="10">
                            10日
                        </option>
                                                <option value="11">
                            11日
                        </option>
                                                <option value="12">
                            12日
                        </option>
                                                <option value="13">
                            13日
                        </option>
                                                <option value="14">
                            14日
                        </option>
                                                <option value="15">
                            15日
                        </option>
                                                <option value="16">
                            16日
                        </option>
                                                <option value="17">
                            17日
                        </option>
                                                <option value="18">
                            18日
                        </option>
                                                <option value="19">
                            19日
                        </option>
                                                <option value="20">
                            20日
                        </option>
                                                <option value="21">
                            21日
                        </option>
                                                <option value="22">
                            22日
                        </option>
                                                <option value="23">
                            23日
                        </option>
                                                <option value="24">
                            24日
                        </option>
                                                <option value="25">
                            25日
                        </option>
                                                <option value="26">
                            26日
                        </option>
                                                <option value="27">
                            27日
                        </option>
                                                <option value="28">
                            28日
                        </option>
                                                <option value="29">
                            29日
                        </option>
                                                <option value="30">
                            30日
                        </option>
                                                <option value="31">
                            31日
                        </option>
                                            </select>
                </label>
            </div>
        </div>
        <!--/.block-form__date-list__day-->
    </div>
    <!--/.block-form__date-list-->
    <input type="hidden" name="birthday" value="2018-06-01" v-model="">
</div>            <!--/.form-group-->
        </div>

        <div class="block-form__sec">
            <div class="form-group">

        <label class="sub-title" for="input-company_name">
        <span>会社名</span>
            </label>
    
    <div>
        <input type="text" class="form-control " name="company_name" value="" placeholder="" v-model="" v-bind:class="">
            </div>
</div>            <!--/.form-group-->
        </div>
    </div>
</div>


<!--/.block-form__sec-->
<div class="block-form__sec">
    <div class="block-form__btn-list">
        <ul>
            <li>
                <a target="__blank" href="http://10.11.6.28:8000/term" class="btn btn--block btn--gray">利用規約を読む</a>
            </li>
            <li>
                <a target="__blank" href="https://glug.co.jp/privacy.php" class="btn btn--block btn--gray">プライバシーポリシーを読む</a>
            </li>
        </ul>
    </div>
    <!--/.block-form__btn-list-->
    <div class="checkbox-group">
        <label class="term-label">
            <input type="checkbox" name="term_agree" required="">
            <span>
                <span>利用規約およびプライバシーポリシーを確認し、同意しました</span>
            </span>
        </label>
    </div>
    <!--/.checkbox-group-->
</div>

<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
    var defMode = 1;
    showInquiryTab(defMode, 'inquiry-base');
});
</script>                <div class="block-form__btn-bottom">
                    <button type="submit" class="btn btn--block btn--off" disabled="disabled">お問い合わせを送信する</button>
                </div>
                <!--/.block-form__btn-bottom-->
            </form>
        </section>
    </div>
</div>
@endsection