@inject('constantService', 'App\Services\ConstantService')

@extends('layouts.user.default')

@section('content')

<div class="edit-info-member-page" id="user-editor">

    <h2 class="page-title">会員情報確認・編集</h2>
    <div class="block-form edit-info-member">
        <h2 class="title-center">
            <span>ユーザー情報</span>
        </h2>
        <div class="block-form__sec">

            <div class="form-group">
                <label class="sub-title">
                    <span>ニックネーム</span>
                    <span class="sub-title__require">必須</span>
                </label>
                <div class="list-inline">
                    <p class="list-inline__left">
                        <strong v-text="user.nickname"></strong>
                    </p>
                    <p class="list-inline__right">
                        <button v-if="!editing.nickname" v-on:click="toggle('nickname')" type="button" class="btn btn--block btn--yellow" >編集する</button>
                        <button v-if="editing.nickname" v-on:click="toggle('nickname')" type="button" class="btn btn--block btn--gray-btm" >編集する</button>
                    </p>
                </div>
            </div>

            <div v-if="editing.nickname">
                <!--/.form-group-->
                @include("component.user.input", [
                    "name" => "nickname",
                    "required" => true,
                    "type" => "text",
                    "model" => "inputs.nickname",
                    "error_model" => "errors.nickname"
                ])
                <!--/.form-group-->
                <div class="form-group">
                    <div class="row-btn">
                        <p class="row-btn__pull-left">
                            <button v-on:click="cancel('nickname')|toggle('nickname')" class="btn btn--block btn--gray">キャンセル</button>
                        </p>
                        <p class="row-btn__pull-right">
                            <button v-on:click="edit('nickname')" v-bind:disabled="!submitRequired('nickname')" v-bind:class="{'btn':true, 'btn--block':true, 'btn--approve':submitRequired('nickname'), 'btn--yellow': submitRequired('nickname'), 'btn--off':!submitRequired('nickname') }">編集を登録する</button>
                        </p>
                    </div>
                </div>   
            </div>
            <!--/.form-group-->
        </div>
        <div class="block-form__sec">
            <div class="form-group">
                <label class="sub-title">
                    <span>メールアドレス</span>
                    <span class="sub-title__require">必須</span>
                </label>
                <div class="list-inline">
                    <p class="list-inline__left">
                        <strong v-text="user.email"></strong>
                    </p>
                    <p class="list-inline__right">
                        <button v-if="!editing.new_email" v-on:click="toggle('new_email')" type="button" class="btn btn--block btn--yellow" >編集する</button>
                        <button v-if="editing.new_email" v-on:click="toggle('new_email')" type="button" class="btn btn--block btn--gray-btm" >編集する</button>
                    </p>
                </div>
            </div>
            <div v-if="editing.new_email">
                <!--/.form-group-->
                @include("component.user.input", [
                    "name" => "new_email",
                    "required" => true,
                    "type" => "email",
                    "placeholder" => "新しいメールアドレス",
                    "model" => "inputs.new_email",
                    "error_model" => "errors.new_email"
                ])
                <!--/.form-group-->
                <div class="block-note">
                    <p class="block-note__txt">
                        新しいメールアドレスに、登録用アドレスを記載したメールを送信します。メール内の更新用リンクにアクセスしてメールアドレスの変更を行ってください。
                    </p>
                    <p class="pl15">
                        <a href="{{route('root.faq')}}" title="メールが届かない場合" class="text-underline">メールが届かない場合</a>
                    </p>
                </div>
                <!--/.form-group-->
                <div class="form-group">
                    <div class="row-btn">
                        <p class="row-btn__pull-left">
                            <button v-on:click="cancel('new_email')|toggle('new_email')" class="btn btn--block btn--gray">キャンセル</button>
                        </p>
                        <p class="row-btn__pull-right">
                            <button v-on:click="edit('new_email')" v-bind:disabled="!submitRequired('new_email')" v-bind:class="{'btn':true, 'btn--block':true, 'btn--approve':submitRequired('new_email'), 'btn--yellow': submitRequired('new_email'), 'btn--off':!submitRequired('new_email') }">編集を登録する</button>
                        </p>
                    </div>
                </div>
            </div>
            <!--/.form-group-->
        </div>
        <div class="block-form__sec">
            <div class="form-group">
                <label class="sub-title">
                    <span>パスワード</span>
                    <span class="sub-title__require">必須</span>
                </label>
                <div class="list-inline">
                    <p class="list-inline__left">
                        <strong>*********</strong>
                    </p>
                    <p class="list-inline__right">
                        <button v-if="!editing.password" v-on:click="toggle('password')" type="button" class="btn btn--block btn--yellow" >編集する</button>
                        <button v-if="editing.password" v-on:click="toggle('password')" type="button" class="btn btn--block btn--gray-btm" >編集する</button>
                    </p>
                </div>
            </div>
            <div v-if="editing.password">
                @component("component.user.password_input", [
                    "name" => "current_password",
                    "required" => true,
                    "model" => "inputs.current_password",
                    "error_model" => "errors.current_password"
                ])
                    @slot('placeholder')
                        <span>現在のパスワード</span>
                    @endslot
                @endcomponent

                <!--/.form-group-->
                @component("component.user.password_input", [
                    "name" => "password",
                    "required" => true,
                    "model" => "inputs.password",
                    "error_model" => "errors.password"
                ])
                    @slot('placeholder')
                        <span>新しいパスワード</span>
                        <small>（半角英数字8～16文字）</small>
                    @endslot
                @endcomponent
                <!--/.form-group-->
                @component("component.user.password_input", [
                    "name" => "password_confirmation",
                    "required" => true,
                    "model" => "password_confirmation",
                    "error_model" => "errors.password_confirmation"
                ])
                    @slot('placeholder')
                        <span>新しいパスワード</span>
                        <small>（確認）</small>
                    @endslot
                @endcomponent

                <!--/.form-group-->
                <div class="form-group">
                    <div class="row-btn">
                        <p class="row-btn__pull-left">
                            <button v-on:click="clearPassword() |toggle('password')" class="btn btn--block btn--gray">キャンセル</button>
                        </p>
                        <p class="row-btn__pull-right">
                            <button v-on:click="editPassword" v-bind:disabled="!submitPassword()" v-bind:class="{'btn':true, 'btn--block':true, 'btn--approve':submitPassword(), 'btn--yellow': submitPassword(), 'btn--off':!submitPassword() }">編集を登録する</button>
                        </p>
                    </div>
                </div>
            </div>
            <!--/.form-group-->
        </div>
        
        <div class="block-form__sec sec-state">
            <div class="form-group">
                <label class="sub-title">
                    <span>状態</span>
                    <span class="sub-title__require">必須</span>
                </label>
                <div class="list-inline">
                    <p class="list-inline__left">
                        <strong v-text="user.is_company==0 ? 'その他' : '飲食店関係者'"></strong>
                    </p>
                    <p class="list-inline__right">
                        <button v-if="!editing.is_company" v-on:click="toggle('is_company')" type="button" class="btn btn--block btn--yellow" >編集する</button>
                        <button v-if="editing.is_company" v-on:click="toggle('is_company')" type="button" class="btn btn--block btn--gray-btm" >編集する</button>
                    </p>
                </div>
            </div>
            <div class="form-group" v-if="editing.is_company">
                <ul class="group-radio-list">
                    <li>
                        <label>
                            <input type="radio" name="is_company" value="1" v-model="inputs.is_company">
                            <span>飲食店関係者</span>
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" id="other-related-person" name="is_company" value="0" v-model="inputs.is_company">
                            <span>その他</span>
                        </label>
                    </li>
                </ul>
                <div class="row-btn">
                    <p class="row-btn__pull-left">
                        <button v-on:click="cancel('is_company')|toggle('is_company')" class="btn btn--block btn--gray">キャンセル</button>
                    </p>
                    <p class="row-btn__pull-right">
                        <button v-on:click="edit('is_company')" class="btn btn--block btn--yellow btn--approve">編集を登録する</button>
                    </p>
                </div>
            </div>
            <!--/.form-group-->
        </div>
        <!--/.block-form__sec-->
        <h2 class="title-center">
            <span>お届け先情報</span>
        </h2>

        <div v-if="user.is_company==0">
            <div class="block-form__sec">
                <div class="form-group">
                    <label class="sub-title">
                        <span>氏名</span>
                        <span class="sub-title__require">必須</span>
                    </label>
                    <div class="list-inline">
                        <p class="list-inline__left">
                            <strong v-text="user.last_name"></strong>
                            <strong v-text="user.first_name"></strong>
                        </p>
                        <p class="list-inline__right">
                            <button v-if="!editing.name" v-on:click="toggle('name')" type="button" class="btn btn--block btn--yellow" >編集する</button>
                            <button v-if="editing.name" v-on:click="toggle('name')" type="button" class="btn btn--block btn--gray-btm" >編集する</button>
                        </p>
                    </div>
                </div>
                <div v-if="editing.name">
                    <!--/.form-group-->
                    <div class="form-group">
                        @include("component.user.inputs", [
                            "inputs" => [
                                [
                                    "name" => "last_name",
                                    "placeholder" => "姓",
                                    "type" => "text",
                                    "model" => "inputs.last_name",
                                    "error_model" => "errors.last_name"
                                ],[
                                    "name" => "first_name",
                                    "placeholder" => "名",
                                    "type" => "text",
                                    "model" => "inputs.first_name",
                                    "error_model" => "errors.first_name"
                                ],
                            ],
                            "required" => true,
                        ])
                    </div>
                    <!--/.form-group-->
                    <div class="form-group">
                        <div class="row-btn">
                            <p class="row-btn__pull-left">
                                <button v-on:click="cancel(['first_name', 'last_name'])|toggle('name')" class="btn btn--block btn--gray">キャンセル</button>
                            </p>
                            <p class="row-btn__pull-right">
                                <button v-on:click="edit(['first_name', 'last_name'], null, 'name')" v-bind:disabled="!submitRequired(['first_name', 'last_name'])" v-bind:class="{'btn':true, 'btn--block':true, 'btn--approve':submitRequired(['first_name', 'last_name']), 'btn--yellow': submitRequired(['first_name', 'last_name']), 'btn--off':!submitRequired(['first_name', 'last_name']) }">編集を登録する</button>
                            </p>
                        </div>
                    </div>
                </div>
                <!--/.form-group-->
            </div>
            <div class="block-form__sec sec-info sec-zip-address">
                <div class="form-group">
                    <label class="sub-title">
                        <span>郵便番号・住所</span>
                        <span class="sub-title__require">必須</span>
                    </label>
                    <div class="list-inline">
                        <p class="list-inline__left">
                            <strong v-text="user.post_code"></strong>
                            <strong v-text="user.prefecture.label"></strong>
                            <strong v-text="user.address"></strong>
                            <strong v-text="user.address_detail"></strong>
                            <strong v-text="user.address_room"></strong>
                        </p>
                        <p class="list-inline__right">
                            <button v-if="!editing.post_code" v-on:click="toggle('post_code')" type="button" class="btn btn--block btn--yellow" >編集する</button>
                            <button v-if="editing.post_code" v-on:click="toggle('post_code')" type="button" class="btn btn--block btn--gray-btm" >編集する</button>
                        </p>
                    </div>
                </div>
                <div v-if="editing.post_code">
                    <!--/.form-group-->
                    <div class="form-group">
                        @include("component.user.input", [
                            "name" => "post_code",
                            "required" => true,
                            "type" => "text",
                            "model" => "inputs.post_code",
                            "error_model" => "errors.post_code",
                            "placeholder" => "郵便番号"
                        ])
                    </div>
                    <!--/.form-group-->
                    <div class="zip-box">
                        <button class="btn btn--block btn--yellow btn--approve" v-on:click="checkPostCode">郵便番号から住所を入力する</button>
                        <p style="text-align:right">
                            <a href="https://developer.yahoo.co.jp/about">
                                <img src="https://s.yimg.jp/images/yjdn/yjdn_attbtn1_125_17.gif" title="Webサービス by Yahoo! JAPAN" alt="Web Services by Yahoo! JAPAN" width="125" height="17" border="0" style="margin:15px 15px 15px 15px">
                            </a>
                        </p>
                    </div>

                    <!--/.form-group-->
                    <div class="form-group">
                        <div class="select-group">
                            <label>
                                <select class="fs12-ipt" name="prefecture_id" v-model="inputs.prefecture_id">
                                    <option>都道府県</option>
                                    @foreach ($constantService->getPrefectures() as $prefecture)
                                    <option v-bind:value="{{$prefecture->id}}">
                                        {{$prefecture->label}}
                                    </option>
                                    @endforeach
                                </select>
                            </label>
                        </div>
                    </div>
                    <!--/.form-group-->
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="市区町村" name="address" v-model="inputs.address">
                    </div>
                    <!--/.form-group-->
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="続きの住所" name="address_detail" v-model="inputs.address_detail">
                    </div>
                    <!--/.form-group-->
                    <div class="form-group">
                        <input type="text" class="form-control fs14-ipt" placeholder="マンション名、部屋番号" name="address_room" v-model="inputs.address_room">
                    </div>
                    <!--/.form-group-->
                    <div class="form-group">
                        <div class="row-btn">
                            <p class="row-btn__pull-left">
                                <button v-on:click="cancel(['post_code', 'prefecture_id', 'address', 'address_detail', 'address_room'])|toggle('post_code')" class="btn btn--block btn--gray">キャンセル</button>
                            </p>
                            <p class="row-btn__pull-right">
                                <button v-on:click="edit(['post_code', 'prefecture_id', 'address', 'address_detail', 'address_room'], null, 'post_code')" v-bind:disabled="!submitRequired(['post_code', 'prefecture_id', 'address'])" v-bind:class="{'btn':true, 'btn--block':true, 'btn--approve': submitRequired(['post_code', 'prefecture_id', 'address']), 'btn--yellow': submitRequired(['post_code', 'prefecture_id', 'address']), 'btn--off':!submitRequired(['post_code', 'prefecture_id', 'address']) }">編集を登録する</button>
                            </p>
                        </div>
                    </div>
                </div>
                <!--/.form-group-->
            </div>
            <div class="block-form__sec sec-info">
                <div class="form-group">
                    <label class="sub-title">
                        <span>電話番号</span>
                        <span class="sub-title__require">必須</span>
                    </label>
                    <div class="list-inline">
                        <p class="list-inline__left">
                            <strong v-text="user.tel"></strong>
                        </p>
                        <p class="list-inline__right">
                            <button v-if="!editing.tel" v-on:click="toggle('tel')" type="button" class="btn btn--block btn--yellow" >編集する</button>
                            <button v-if="editing.tel" v-on:click="toggle('tel')" type="button" class="btn btn--block btn--gray-btm" >編集する</button>
                        </p>
                    </div>
                </div>

                <div v-if="editing.tel">
                    <!--/.form-group-->
                    @include("component.user.input", [
                        "name" => "tel",
                        "required" => true,
                        "type" => "tel",
                        "placeholder" => "電話番号",
                        "model" => "inputs.tel",
                        "error_model" => "errors.tel"
                    ])
                    <!--/.form-group-->
                    <div class="form-group">
                        <div class="row-btn">
                            <p class="row-btn__pull-left">
                                <button v-on:click="cancel('tel')|toggle('tel')" class="btn btn--block btn--gray">キャンセル</button>
                            </p>
                            <p class="row-btn__pull-right">
                                <button v-on:click="edit('tel')" v-bind:disabled="!submitRequired('tel')" v-bind:class="{'btn':true, 'btn--block':true, 'btn--approve':submitRequired('tel'), 'btn--yellow': submitRequired('tel'), 'btn--off':!submitRequired('tel') }">編集を登録する</button>
                            </p>
                        </div>
                    </div>
                </div>
                <!--/.form-group-->
            </div>
            <div class="block-form__sec sec-info">
                <div class="form-group">
                    <label class="sub-title">
                        <span>携帯番号</span>
                    </label>
                    <div class="list-inline">
                        <p class="list-inline__left">
                            <strong v-text="user.mobile_tel"></strong>
                        </p>
                        <p class="list-inline__right">
                            <button v-if="!editing.mobile_tel" v-on:click="toggle('mobile_tel')" type="button" class="btn btn--block btn--yellow" >編集する</button>
                            <button v-if="editing.mobile_tel" v-on:click="toggle('mobile_tel')" type="button" class="btn btn--block btn--gray-btm" >編集する</button>
                        </p>
                    </div>
                </div>

                <div v-if="editing.mobile_tel">
                    <!--/.form-group-->
                    @include("component.user.input", [
                        "name" => "mobile_tel",
                        "required" => false,
                        "type" => "tel",
                        "placeholder" => "新しい携帯番号",
                        "model" => "inputs.mobile_tel",
                        "error_model" => "errors.mobile_tel"
                    ])
                    <!--/.form-group-->
                    <div class="form-group">
                        <div class="row-btn">
                            <p class="row-btn__pull-left">
                                <button v-on:click="cancel('mobile_tel')|toggle('mobile_tel')" class="btn btn--block btn--gray">キャンセル</button>
                            </p>
                            <p class="row-btn__pull-right">
                                <button v-on:click="edit('mobile_tel')" class="btn btn--block btn--yellow btn--approve">編集を登録する</button>
                            </p>
                        </div>
                    </div>
                </div>
                <!--/.form-group-->
            </div>
            <div class="block-form__sec sec-info">
                <div class="form-group">
                    <label class="sub-title">
                        <span>Fax番号</span>
                    </label>
                    <div class="list-inline">
                        <p class="list-inline__left">
                            <strong v-text="user.fax"></strong>
                        </p>
                        <p class="list-inline__right">
                            <button v-if="!editing.fax" v-on:click="toggle('fax')" type="button" class="btn btn--block btn--yellow" >編集する</button>
                            <button v-if="editing.fax" v-on:click="toggle('fax')" type="button" class="btn btn--block btn--gray-btm" >編集する</button>
                        </p>
                    </div>
                </div>
                <div v-if="editing.fax">
                    <!--/.form-group-->
                    @include("component.user.input", [
                        "name" => "fax",
                        "required" => false,
                        "type" => "tel",
                        "placeholder" => "新しいFax番号",
                        "model" => "inputs.fax",
                        "error_model" => "errors.fax"
                    ])
                    <!--/.form-group-->
                    <div class="form-group">
                        <div class="row-btn">
                            <p class="row-btn__pull-left">
                                <button v-on:click="cancel('fax')|toggle('fax')" class="btn btn--block btn--gray">キャンセル</button>
                            </p>
                            <p class="row-btn__pull-right">
                                <button v-on:click="edit('fax')" class="btn btn--block btn--yellow btn--approve">編集を登録する</button>
                            </p>
                        </div>
                    </div>
                </div>
                <!--/.form-group-->
            </div>
            <div class="block-form__sec sec-info">
                <div class="form-group">
                    <label class="sub-title">
                        <span>性別</span>
                    </label>
                    <div class="list-inline">
                        <p class="list-inline__left">
                            <strong v-text="genderText(user.gender)"></strong>
                        </p>
                        <p class="list-inline__right">
                            <button v-if="!editing.gender" v-on:click="toggle('gender')" type="button" class="btn btn--block btn--yellow" >編集する</button>
                            <button v-if="editing.gender" v-on:click="toggle('gender')" type="button" class="btn btn--block btn--gray-btm" >編集する</button>
                        </p>
                    </div>
                </div>
                <div v-if="editing.gender">
                    <!--/.form-group-->
                    @include("component.user.select", [
                        "name" => "gender",
                        "required" => true,
                        "model" => "inputs.gender",
                        "init" => "",
                        "options" => [
                            [ "label" => "選択なし", "value" => null ],
                            [ "label" => "男性", "value" => 0 ],
                            [ "label" => "女性", "value" => 1 ]
                        ]
                    ])
                    <!--/.form-group-->
                    <div class="form-group">
                        <div class="row-btn">
                            <p class="row-btn__pull-left">
                                <button v-on:click="cancel('gender')|toggle('gender')" class="btn btn--block btn--gray">キャンセル</button>
                            </p>
                            <p class="row-btn__pull-right">
                                <button v-on:click="edit('gender')" class="btn btn--block btn--yellow btn--approve">編集を登録する</button>
                            </p>
                        </div>
                    </div>
                </div>
                <!--/.form-group-->
            </div>
            
            <div class="block-form__sec">
                <div class="form-group">
                    <label class="sub-title">
                        <span>生年月日</span>
                        <span class="sub-title__require">必須</span>
                    </label>
                    <div class="list-inline">
                        <p class="list-inline__left">
                            <strong v-text="toBirthdayString(user.birthday)"></strong>
                        </p>
                        <p class="list-inline__right">
                            <button v-if="!editing.birthday" v-on:click="toggle('birthday')" type="button" class="btn btn--block btn--yellow" >編集する</button>
                            <button v-if="editing.birthday" v-on:click="toggle('birthday')" type="button" class="btn btn--block btn--gray-btm" >編集する</button>
                        </p>
                    </div>
                </div>
                <div v-if="editing.birthday">
                    <!--/.form-group-->
                    <div class="form-group">
                        <div class="block-form__date-list clearfix">
                            <div class="block-form__date-list__year">
                                <div class="select-group">
                                    <label>
                                        <select v-model="inputs.birthday.year" name="birthday__year" @change="onChange()">
                                            <option>年</option>
                                            @php
                                            for( $year = 1950; $year <= ( Carbon\Carbon::now())->year; $year++ ){
                                            @endphp
                                            <option v-bind:value="{{$year}}">
                                                {{$year."年"}}
                                            </option>
                                            @php
                                            }
                                            @endphp
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <!--/.block-form__date-list__year-->
                            <div class="block-form__date-list__month">
                                <div class="select-group">
                                    <label>
                                        <select v-model="inputs.birthday.month" @change="onChange()">
                                            <option>月</option>
                                            @php
                                            for( $month = 1; $month <= 12; $month++ ){
                                            @endphp
                                            <option v-bind:value="{{$month}}" >
                                                {{$month."月"}}
                                            </option>
                                            @php
                                            }
                                            @endphp
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <!--/.block-form__date-list__month-->
                            <div class="block-form__date-list__day">
                                <div class="select-group">
                                    <label>
                                        <select v-model="inputs.birthday.date" @change="onChange()">
                                            <option>日</option>
                                            @php
                                            for( $day = 1; $day <= 31; $day++ ){
                                            @endphp
                                            <option v-bind:value="{{$day}}">
                                                {{$day."日"}}
                                            </option>
                                            @php
                                            }
                                            @endphp
                                        </select>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <!--/.form-group-->
                    <div class="form-group">
                        <div class="row-btn">
                            <p class="row-btn__pull-left">
                                <button v-on:click="clearDate('birthday')|toggle('birthday')" class="btn btn--block btn--gray">キャンセル</button>
                            </p>
                            <p class="row-btn__pull-right">
                                <button v-on:click="editDate('birthday')" v-bind:disabled="!submitDate('birthday')" v-bind:class="{'btn':true, 'btn--block':true, 'btn--approve':submitDate('birthday'), 'btn--yellow': submitDate('birthday'), 'btn--off':!submitDate('birthday') }">編集を登録する</button>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="block-form__sec">
                <div class="form-group">
                    <label class="sub-title">
                        <span>会社名</span>
                    </label>
                    <div class="list-inline">
                        <p class="list-inline__left">
                            <strong v-text="user.company_name"></strong>
                        </p>
                        <p class="list-inline__right">
                            <button v-if="!editing.company_name" v-on:click="toggle('company_name')" type="button" class="btn btn--block btn--yellow" >編集する</button>
                            <button v-if="editing.company_name" v-on:click="toggle('company_name')" type="button" class="btn btn--block btn--gray-btm" >編集する</button>
                        </p>
                    </div>
                </div>

                <div v-if="editing.company_name">
                    <!--/.form-group-->
                    @include("component.user.input", [
                        "name" => "company_name",
                        "required" => false,
                        "type" => "text",
                        "model" => "inputs.company_name",
                        "error_model" => "errors.company_name"
                    ])
                    <!--/.form-group-->
                    <div class="form-group">
                        <div class="row-btn">
                            <p class="row-btn__pull-left">
                                <button v-on:click="cancel('company_name')|toggle('company_name')" class="btn btn--block btn--gray">キャンセル</button>
                            </p>
                            <p class="row-btn__pull-right">
                                <button v-on:click="edit('company_name')" class="btn btn--block btn--yellow btn--approve">編集を登録する</button>
                            </p>
                        </div>
                    </div>   
                </div>
                <!--/.form-group-->
            </div>
        </div>


        <!--/.block-form__sec-->
        <div v-if="user.is_company==1">
            
            <div class="block-form__sec">
                <div class="form-group">
                    <label class="sub-title">
                        <span>屋号または会社名</span>
                        <span class="sub-title__require">必須</span>
                    </label>
                    <div class="list-inline">
                        <p class="list-inline__left">
                            <strong v-text="user.store_name"></strong>
                        </p>
                        <p class="list-inline__right">
                            <button v-if="!editing.store_name" v-on:click="toggle('store_name')" type="button" class="btn btn--block btn--yellow" >編集する</button>
                            <button v-if="editing.store_name" v-on:click="toggle('store_name')" type="button" class="btn btn--block btn--gray-btm" >編集する</button>
                        </p>
                    </div>
                </div>

                <div v-if="editing.store_name">
                    <!--/.form-group-->
                    @include("component.user.input", [
                        "name" => "store_name",
                        "required" => true,
                        "type" => "text",
                        "model" => "inputs.store_name",
                        "error_model" => "errors.store_name"
                    ])
                    <!--/.form-group-->
                    <div class="form-group">
                        <div class="row-btn">
                            <p class="row-btn__pull-left">
                                <button v-on:click="cancel('store_name')|toggle('store_name')" class="btn btn--block btn--gray">キャンセル</button>
                            </p>
                            <p class="row-btn__pull-right">
                                <button v-on:click="edit('store_name')" v-bind:disabled="!submitRequired('store_name')" v-bind:class="{'btn':true, 'btn--block':true, 'btn--approve':submitRequired('store_name'), 'btn--yellow': submitRequired('store_name'), 'btn--off':!submitRequired('store_name') }">編集を登録する</button>
                            </p>
                        </div>
                    </div>   
                </div>
                <!--/.form-group-->
            </div>

            <div class="block-form__sec sec-info sec-zip-address">
                <div class="form-group">
                    <label class="sub-title">
                        <span>郵便番号・住所</span>
                        <span class="sub-title__require">必須</span>
                    </label>
                    <div class="list-inline">
                        <p class="list-inline__left">
                            <strong v-text="user.post_code"></strong>
                            <strong v-text="user.prefecture.label"></strong>
                            <strong v-text="user.address"></strong>
                            <strong v-text="user.address_detail"></strong>
                            <strong v-text="user.address_room"></strong>
                        </p>
                        <p class="list-inline__right">
                            <button v-if="!editing.post_code" v-on:click="toggle('post_code')" type="button" class="btn btn--block btn--yellow" >編集する</button>
                            <button v-if="editing.post_code" v-on:click="toggle('post_code')" type="button" class="btn btn--block btn--gray-btm" >編集する</button>
                        </p>
                    </div>
                </div>
                <div v-if="editing.post_code">
                    <!--/.form-group-->
                    <div class="form-group">
                        @include("component.user.input", [
                            "name" => "post_code",
                            "required" => true,
                            "type" => "text",
                            "model" => "inputs.post_code",
                            "error_model" => "errors.post_code",
                            "placeholder" => "郵便番号"
                        ])
                    </div>
                    <!--/.form-group-->
                    <div class="zip-box">
                        <button class="btn btn--block btn--yellow btn--approve" v-on:click="checkPostCode">郵便番号から住所を入力する</button>
                        <p style="text-align:right">
                            <a href="https://developer.yahoo.co.jp/about">
                                <img src="https://s.yimg.jp/images/yjdn/yjdn_attbtn1_125_17.gif" title="Webサービス by Yahoo! JAPAN" alt="Web Services by Yahoo! JAPAN" width="125" height="17" border="0" style="margin:15px 15px 15px 15px">
                            </a>
                        </p>
                    </div>

                    <!--/.form-group-->
                    <div class="form-group">
                        <div class="select-group">
                            <label>
                                <select class="fs12-ipt" name="prefecture_id" v-model="inputs.prefecture_id">
                                    <option>都道府県</option>
                                    @foreach ($constantService->getPrefectures() as $prefecture)
                                    <option v-bind:value="{{$prefecture->id}}">
                                        {{$prefecture->label}}
                                    </option>
                                    @endforeach
                                </select>
                            </label>
                        </div>
                    </div>
                    <!--/.form-group-->
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="市区町村" name="address" v-model="inputs.address">
                    </div>
                    <!--/.form-group-->
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="続きの住所" name="address_detail" v-model="inputs.address_detail">
                    </div>
                    <!--/.form-group-->
                    <div class="form-group">
                        <input type="text" class="form-control fs14-ipt" placeholder="マンション名、部屋番号" name="address_room" v-model="inputs.address_room">
                    </div>
                    <!--/.form-group-->
                    <div class="form-group">
                        <div class="row-btn">
                            <p class="row-btn__pull-left">
                                <button v-on:click="cancel(['post_code', 'prefecture_id', 'address', 'address_detail', 'address_room'])|toggle('post_code')" class="btn btn--block btn--gray">キャンセル</button>
                            </p>
                            <p class="row-btn__pull-right">

                                <button v-on:click="edit(['post_code', 'prefecture_id', 'address', 'address_detail', 'address_room'], null, 'post_code')" v-bind:disabled="!submitRequired(['post_code', 'prefecture_id', 'address'])" v-bind:class="{'btn':true, 'btn--block':true, 'btn--approve': submitRequired(['post_code', 'prefecture_id', 'address']), 'btn--yellow': submitRequired(['post_code', 'prefecture_id', 'address']), 'btn--off':!submitRequired(['post_code', 'prefecture_id', 'address']) }">編集を登録する</button>
                            </p>
                        </div>
                    </div>
                </div>
                <!--/.form-group-->
            </div>

            <div class="block-form__sec sec-info">
                <div class="form-group">
                    <label class="sub-title">
                        <span>代表電話番号</span>
                        <span class="sub-title__require">必須</span>
                    </label>
                    <div class="list-inline">
                        <p class="list-inline__left">
                            <strong v-text="user.tel"></strong>
                        </p>
                        <p class="list-inline__right">
                            <button v-if="!editing.tel" v-on:click="toggle('tel')" type="button" class="btn btn--block btn--yellow" >編集する</button>
                            <button v-if="editing.tel" v-on:click="toggle('tel')" type="button" class="btn btn--block btn--gray-btm" >編集する</button>
                        </p>
                    </div>
                </div>

                <div v-if="editing.tel">
                    <!--/.form-group-->
                    @include("component.user.input", [
                        "name" => "tel",
                        "required" => true,
                        "type" => "tel",
                        "placeholder" => "新しい代表電話番号",
                        "model" => "inputs.tel",
                        "error_model" => "errors.tel"
                    ])
                    <!--/.form-group-->
                    <div class="form-group">
                        <div class="row-btn">
                            <p class="row-btn__pull-left">
                                <button v-on:click="cancel('tel')|toggle('tel')" class="btn btn--block btn--gray">キャンセル</button>
                            </p>
                            <p class="row-btn__pull-right">
                                <button v-on:click="edit('tel')" v-bind:disabled="!submitRequired('tel')" v-bind:class="{'btn':true, 'btn--block':true, 'btn--approve':submitRequired('tel'), 'btn--yellow': submitRequired('tel'), 'btn--off':!submitRequired('tel') }">編集を登録する</button>
                            </p>
                        </div>
                    </div>
                </div>
                <!--/.form-group-->
            </div>
            <div class="block-form__sec sec-info">
                <div class="form-group">
                    <label class="sub-title">
                        <span>Fax番号</span>
                    </label>
                    <div class="list-inline">
                        <p class="list-inline__left">
                            <strong v-text="user.fax"></strong>
                        </p>
                        <p class="list-inline__right">
                            <button v-if="!editing.fax" v-on:click="toggle('fax')" type="button" class="btn btn--block btn--yellow" >編集する</button>
                            <button v-if="editing.fax" v-on:click="toggle('fax')" type="button" class="btn btn--block btn--gray-btm" >編集する</button>
                        </p>
                    </div>
                </div>
                <div v-if="editing.fax">
                    <!--/.form-group-->
                    @include("component.user.input", [
                        "name" => "fax",
                        "required" => false,
                        "type" => "tel",
                        "placeholder" => "新しいFax番号",
                        "model" => "inputs.fax",
                        "error_model" => "errors.fax"
                    ])
                    <!--/.form-group-->
                    <div class="form-group">
                        <div class="row-btn">
                            <p class="row-btn__pull-left">
                                <button v-on:click="cancel('fax')|toggle('fax')" class="btn btn--block btn--gray">キャンセル</button>
                            </p>
                            <p class="row-btn__pull-right">
                                <button v-on:click="edit('fax')" class="btn btn--block btn--yellow btn--approve">編集を登録する</button>
                            </p>
                        </div>
                    </div>
                </div>
                <!--/.form-group-->
            </div>

            <h2 class="title-center">
                <span>担当者情報</span>
            </h2>

            <div class="block-form__sec">
                <div class="form-group">
                    <label class="sub-title">
                        <span>氏名</span>
                        <span class="sub-title__require">必須</span>
                    </label>
                    <div class="list-inline">
                        <p class="list-inline__left">
                            <strong v-text="user.last_name"></strong>
                            <strong v-text="user.first_name"></strong>
                        </p>
                        <p class="list-inline__right">
                            <button v-if="!editing.name" v-on:click="toggle('name')" type="button" class="btn btn--block btn--yellow" >編集する</button>
                            <button v-if="editing.name" v-on:click="toggle('name')" type="button" class="btn btn--block btn--gray-btm" >編集する</button>
                        </p>
                    </div>
                </div>
                <div v-if="editing.name">
                    <!--/.form-group-->
                    <div class="form-group">
                        @include("component.user.inputs", [
                            "inputs" => [
                                [
                                    "name" => "last_name",
                                    "placeholder" => "姓",
                                    "type" => "text",
                                    "model" => "inputs.last_name",
                                    "error_model" => "errors.last_name"
                                ],[
                                    "name" => "first_name",
                                    "placeholder" => "名",
                                    "type" => "text",
                                    "model" => "inputs.first_name",
                                    "error_model" => "errors.first_name"
                                ],
                            ],
                            "required" => true,
                        ])
                    </div>
                    <!--/.form-group-->
                    <div class="form-group">
                        <div class="row-btn">
                            <p class="row-btn__pull-left">
                                <button v-on:click="cancel(['first_name', 'last_name'])||toggle('name')" class="btn btn--block btn--gray">キャンセル</button>
                            </p>
                            <p class="row-btn__pull-right">
                                <button v-on:click="edit(['first_name', 'last_name'], null, 'name')" v-bind:disabled="!submitRequired(['first_name', 'last_name'])" v-bind:class="{'btn':true, 'btn--block':true, 'btn--approve':submitRequired(['first_name', 'last_name']), 'btn--yellow': submitRequired(['first_name', 'last_name']), 'btn--off':!submitRequired(['first_name', 'last_name']) }">編集を登録する</button>
                            </p>
                        </div>
                    </div>
                </div>
                <!--/.form-group-->
            </div>

            <div class="block-form__sec sec-info">
                <div class="form-group">
                    <label class="sub-title">
                        <span>担当者性別</span>
                    </label>
                    <div class="list-inline">
                        <p class="list-inline__left">
                            <strong v-text="genderText(user.gender)"></strong>
                        </p>
                        <p class="list-inline__right">
                            <button v-if="!editing.gender" v-on:click="toggle('gender')" type="button" class="btn btn--block btn--yellow" >編集する</button>
                            <button v-if="editing.gender" v-on:click="toggle('gender')" type="button" class="btn btn--block btn--gray-btm" >編集する</button>
                        </p>
                    </div>
                </div>
                <div v-if="editing.gender">
                    <!--/.form-group-->
                    @include("component.user.select", [
                        "name" => "gender",
                        "required" => true,
                        "model" => "inputs.gender",
                        "init" => "",
                        "options" => [
                            [ "label" => "選択なし", "value" => null ],
                            [ "label" => "男性", "value" => 0 ],
                            [ "label" => "女性", "value" => 1 ]
                        ]
                    ])
                    <!--/.form-group-->
                    <div class="form-group">
                        <div class="row-btn">
                            <p class="row-btn__pull-left">
                                <button v-on:click="cancel('gender')|toggle('gender')" class="btn btn--block btn--gray">キャンセル</button>
                            </p>
                            <p class="row-btn__pull-right">
                                <button v-on:click="edit('gender')" class="btn btn--block btn--yellow btn--approve">編集を登録する</button>
                            </p>
                        </div>
                    </div>
                </div>
                <!--/.form-group-->
            </div>


            <div class="block-form__sec">
                <div class="form-group">
                    <label class="sub-title">
                        <span>担当者生年月日</span>
                        <span class="sub-title__require">必須</span>
                    </label>
                    <div class="list-inline">
                        <p class="list-inline__left">
                            <strong v-text="toBirthdayString(user.birthday)"></strong>
                        </p>
                        <p class="list-inline__right">
                            <button v-if="!editing.birthday" v-on:click="toggle('birthday')" type="button" class="btn btn--block btn--yellow" >編集する</button>
                            <button v-if="editing.birthday" v-on:click="toggle('birthday')" type="button" class="btn btn--block btn--gray-btm" >編集する</button>
                        </p>
                    </div>
                </div>
                <div v-if="editing.birthday">
                    <!--/.form-group-->
                    <div class="form-group">
                        <div class="block-form__date-list clearfix">
                            <div class="block-form__date-list__year">
                                <div class="select-group">
                                    <label>
                                        <select v-model="inputs.birthday.year" name="birthday__year" @change="onChange()">
                                            <option>年</option>
                                            @php
                                            for( $year = 1950; $year <= ( Carbon\Carbon::now())->year; $year++ ){
                                            @endphp
                                            <option v-bind:value="{{$year}}">
                                                {{$year."年"}}
                                            </option>
                                            @php
                                            }
                                            @endphp
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <!--/.block-form__date-list__year-->
                            <div class="block-form__date-list__month">
                                <div class="select-group">
                                    <label>
                                        <select v-model="inputs.birthday.month" @change="onChange()">
                                            <option>月</option>
                                            @php
                                            for( $month = 1; $month <= 12; $month++ ){
                                            @endphp
                                            <option v-bind:value="{{$month}}" >
                                                {{$month."月"}}
                                            </option>
                                            @php
                                            }
                                            @endphp
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <!--/.block-form__date-list__month-->
                            <div class="block-form__date-list__day">
                                <div class="select-group">
                                    <label>
                                        <select v-model="inputs.birthday.date" @change="onChange()">
                                            <option>日</option>
                                            @php
                                            for( $day = 1; $day <= 31; $day++ ){
                                            @endphp
                                            <option v-bind:value="{{$day}}">
                                                {{$day."日"}}
                                            </option>
                                            @php
                                            }
                                            @endphp
                                        </select>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <!--/.form-group-->
                    <div class="form-group">
                        <div class="row-btn">
                            <p class="row-btn__pull-left">
                                <button v-on:click="clearDate('birthday')|toggle('birthday')" class="btn btn--block btn--gray">キャンセル</button>
                            </p>
                            <p class="row-btn__pull-right">
                                <button v-on:click="editDate('birthday')" v-bind:disabled="!submitDate('birthday')" v-bind:class="{'btn':true, 'btn--block':true, 'btn--approve':submitDate('birthday'), 'btn--yellow': submitDate('birthday'), 'btn--off':!submitDate('birthday') }">編集を登録する</button>
                            </p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="block-form__sec sec-info">
                <div class="form-group">
                    <label class="sub-title">
                        <span>担当者と連絡が取れる電話番号</span>
                        <span class="sub-title__require">必須</span>
                    </label>
                    <div class="list-inline">
                        <p class="list-inline__left">
                            <strong v-text="user.mobile_tel"></strong>
                        </p>
                        <p class="list-inline__right">
                            <button v-if="!editing.mobile_tel" v-on:click="toggle('mobile_tel')" type="button" class="btn btn--block btn--yellow" >編集する</button>
                            <button v-if="editing.mobile_tel" v-on:click="toggle('mobile_tel')" type="button" class="btn btn--block btn--gray-btm" >編集する</button>
                        </p>
                    </div>
                </div>

                <div v-if="editing.mobile_tel">
                    <!--/.form-group-->
                    @include("component.user.input", [
                        "name" => "mobile_tel",
                        "required" => true,
                        "type" => "tel",
                        "placeholder" => "新しい電話番号",
                        "model" => "inputs.mobile_tel",
                        "error_model" => "errors.mobile_tel"
                    ])
                    <!--/.form-group-->
                    <div class="form-group">
                        <div class="row-btn">
                            <p class="row-btn__pull-left">
                                <button v-on:click="cancel('mobile_tel')|toggle('mobile_tel')" class="btn btn--block btn--gray">キャンセル</button>
                            </p>
                            <p class="row-btn__pull-right">
                                <button v-on:click="edit('mobile_tel')" v-bind:disabled="!submitRequired('mobile_tel')" v-bind:class="{'btn':true, 'btn--block':true, 'btn--approve':submitRequired('mobile_tel'), 'btn--yellow': submitRequired('mobile_tel'), 'btn--off':!submitRequired('mobile_tel') }">編集を登録する</button>
                            </p>
                        </div>
                    </div>
                </div>
                <!--/.form-group-->
            </div>

            <div class="block-form__sec sec-info">
                <div class="form-group">
                    <label class="sub-title">
                        <span>担当者職種</span>
                        <span class="sub-title__require">必須</span>
                    </label>
                    <div class="list-inline">
                        <p class="list-inline__left">
                            <strong v-text="user.job.label"></strong>
                        </p>
                        <p class="list-inline__right">
                            <button v-if="!editing.job_id" v-on:click="toggle('job_id')" type="button" class="btn btn--block btn--yellow" >編集する</button>
                            <button v-if="editing.job_id" v-on:click="toggle('job_id')" type="button" class="btn btn--block btn--gray-btm" >編集する</button>
                        </p>
                    </div>
                </div>
                <div v-if="editing.job_id">
                    <!--/.form-group-->
                    <div class="form-group">
                        <div class="select-group">
                            <label>
                                @include("component.input.jobs", [
                                    "name" => "job_id",
                                    "required" => true,
                                    "model" => "inputs.job_id",
                                ])
                            </label>
                        </div>
                    </div>
                    <!--/.form-group-->
                    <div class="form-group">
                        <div class="row-btn">
                            <p class="row-btn__pull-left">
                                <button v-on:click="cancel('job_id')|toggle('job_id')" class="btn btn--block btn--gray">キャンセル</button>
                            </p>
                            <p class="row-btn__pull-right">
                                <button v-on:click="edit('job_id')" v-bind:disabled="!submitRequired('job_id')" v-bind:class="{'btn':true, 'btn--block':true, 'btn--approve':submitRequired('job_id'), 'btn--yellow': submitRequired('job_id'), 'btn--off':!submitRequired('job_id') }">編集を登録する</button>
                            </p>
                        </div>
                    </div>
                </div>
                <!--/.form-group-->
            </div>
        </div>
    </div>
    <!--/.block-form__sec-->
</div>

<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
    new Vue( {
        el: '#user-editor',
        data: {
            editing: {},
            user: {!! $user !!},
            inputs: {!! $user !!},
            errors: {},
            password_confirmation: null,
            company_type: "その他",
            url: "{{route('api.user.edit')}}",
        },
        mounted: function(){
            this.clearDate("birthday");
        },
        methods: {
            toggle: function(name){
                this.editing[name] = !this.editing[name];
                this.$forceUpdate();
            },
            submitRequired: function(name){
                if(Array.isArray(name)){
                    var self = this;
                    return name.find( function(n) {
                        return self.inputs[n] == null || self.inputs[n] == "";
                    }) == null ;
                }else{
                    return this.inputs[name] != null && this.inputs[name] != "";
                }
                
            },
            submitPassword: function () {
                return this.inputs["password"] != null && this.inputs["password"] != ""
                    && this.password_confirmation != null && this.password_confirmation != "";
            },
            edit: function(name) {
                this.edit(name, null, null);
            },
            edit: function(name, value) {
                this.edit(name, value, null);
            },
            edit: function(name, value, toggle) {
                var param = {};
                if(Array.isArray(name)){
                    var self = this;
                    name.forEach( function(n) {
                        param[n] = self.inputs[n];
                    });
                }else{
                    if( value == null){
                        param[name] = this.inputs[name];    
                    }else{
                        param[name] = value;
                    }
                }
                var self = this;
                return axios.post(this.url, param).then( function( res, error ) {
                    if(Array.isArray(name)){
                        self.openPop(name[ name.length-1]);
                        name.forEach( function(n) {
                            self.user[n] = self.inputs[n];
                            self.errors[n] = false;

                            let objName = self.isSelect(n);
                            if(objName != null){
                                let label = self.getSelectedLabel(n, self.inputs[n]);
                                if(label != null){
                                    self.user[objName] = {
                                        label: label
                                    };
                                }    
                            }
                        });
                    }else{
                        if(name == "new_email"){
                            self.openPop(name, "新しいメールアドレスに<br/>確認メールを送信しました");
                        }else{
                            self.openPop(name);    
                        }
                        if(value == null){
                            self.user[name] = self.inputs[name];
                        }else{
                            self.user[name] = value;
                        }
                        self.errors[name] = false;
                        
                        let objName = self.isSelect(name);
                        if(objName != null){
                            let label = self.getSelectedLabel(name, self.inputs[name]);
                            if(label != null){
                                self.user[objName] = {
                                    label: label
                                };
                            }    
                        }
                    }
                    self.toggle(name);
                    if(toggle != null){
                        self.toggle(toggle);
                    }
                    self.$forceUpdate();
                }).catch( function(error) {
                    var errors = error.response.data.errors != null ? error.response.data.errors : {} ;
                    if(Array.isArray(name)){
                        name.forEach( function(n) {
                            self.errors[n] = errors[n] != null ?errors[n] : true ;
                        });
                    }else{
                        self.errors[name] = errors[name] != null ? errors[name] : true;
                    }

                    self.$forceUpdate();

                    if( name == "is_company" ){
                        location.reload();
                    }
                });
            },
            isSelect: function(name){
                var pattern = '_id';
                if((name.lastIndexOf(pattern)+pattern.length===name.length)&&(pattern.length<=name.length)){
                  return name.slice(0, -3);
                }
                return null;
            },
            getSelectedLabel: function(name, value){
                var selected = document.querySelector("select[name="+name+"] option[value='"+value+"']");
                if(selected == null){
                    return null;
                }
                return selected.innerText.trim();
            },
            openPop: function(name){
                this.openPop(name, "編集内容を登録しました");
            },
            openPop: function(name, message){
                if(message == null){
                    message = "編集内容を登録しました";
                }
                $('#footer-control').cftoaster({content: message, fontColor: "#000000", backgroundColor: "#ffffff", maxWidth: "250", bottomMargin: "30", showTime: "3000"});
            },
            cancel: function(name) {
                if(Array.isArray(name)){
                    var self = this;
                    name.forEach( function(n) {
                        self.inputs[n] = self.user[n];
                    });
                }else{
                    this.inputs[name] = this.user[name];
                }
            },
            clearPassword: function(){
                this.password_confirmation = null;
                this.inputs.password = null;
            },
            editPassword: function() {
                if(this.password_confirmation != this.inputs.password){
                    this.errors.password = true;
                    this.errors.password_confirmation = "パスワードが一致しません";
                    this.$forceUpdate();
                }else{
                    this.errors.password_confirmation = false;
                    this.edit(["password", "current_password"]);
                }
            },
            checkPostCode: function() {
                if( this.inputs.post_code == null || this.inputs.post_code.length == 0 ){
                    this.errors.post_code = "郵便番号を入力してください";
                    this.$forceUpdate();
                    return;
                }
                this.errors.post_code = false;
                var self = this;
                axios.get( "{{route('api.utils.post_codes')}}?post_code="+this.inputs.post_code ).then( function(response) {
                    if(response.status == 200 && response.data.result ){
                        self.inputs.prefecture_id = response.data.data.prefecture.id;
                        self.inputs.address = response.data.data.address;
                    }else{
                        self.errors.post_code = "郵便番号が正しいか確認してください";
                    }
                    self.$forceUpdate();
                }).catch( function(error) {
                });
            },
            clearDate: function(name){
                this.inputs[name] = {};
                if(this.user[name] == null){
                    return;
                }
                var date = this.user[name].replace(/\s/, "T");
                this.inputs[name].year = (new Date(date)).getFullYear();
                this.inputs[name].month = (new Date(date)).getMonth() + 1;
                this.inputs[name].date = (new Date(date)).getDate();
            },
            editDate: function(name){
                var date = this.inputs[name].year + "-" + ("00"+this.inputs[name].month).slice(-2) + "-" + ("00"+this.inputs[name].date).slice(-2);
                var self = this;
                this.edit("birthday", date).then( function() {
                    self.user[name] = date;
                    self.openPop(name+"__year");
                });
            },
            submitDate: function(name){
                return this.inputs[name].year != null && this.inputs[name].year != "年"
                    && this.inputs[name].month && this.inputs[name].month != "月" 
                    && this.inputs[name].date && this.inputs[name].date != "日";
            },
            onChange: function(){
                this.$forceUpdate();
            },
            genderText: function(gender){
                if( gender == null || gender === "" ){
                    return "選択なし";
                }
                if(gender == 0){
                    return "男性";
                }else{
                    return "女性";
                }
            }
        },
    });
});
</script>



@endsection
