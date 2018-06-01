@extends('layouts.user.default')

@section('content')

<div class="register-page clearfix">
<h2 class="page-title">新規会員登録</h2>
<div class="content-center">
<div class="block-form from-step3">
    <nav class="block-form__step">
        <ol>
            <li class="block-form__step__active">
                <span>会員情報を入力</span>
            </li>
            <li class="block-form__step__active">
                <span>会員情報の確認メール送信</span>
            </li>
            <li class="block-form__step__current">
                <span>登録完了</span>
            </li>
        </ol>
    </nav>
    <!--/.block-form__step-->
    <section class="block-form__header">
        <h2 class="block-form__header__title"> 会員登録が完了しました
            <br>ありがとうございました</h2>
        <p>
            <a href="{{route('root.index')}}" class="btn btn--block btn--default">トップページへ戻る</a>
        </p>
        <p>資料請求を行う場合は続けてお届け先情報を登録していただくと大変便利です。</p>
        <section>
            <h2 class="title-center">
                <span>お届け先情報</span>
            </h2>
            <form>
                <div class="form-group">
                    <ul class="group-radio-list">
                        <li>
                            <label for="eatery-related-person">
                                <input type="radio" id="eatery-related-person" name="related-person" checked="checked">
                                <span>飲食店関係者</span>   
                            </label>
                        </li>
                        <li>
                            <label for="other-related-person">
                                <input type="radio" id="other-related-person" name="related-person">
                                <span>その他</span>
                            </label>
                        </li>
                    </ul>
                </div>
                <!--/.form-group-->
                <div class="block-form__sec">
                    <div class="form-group">
                        <label class="sub-title" for="name">
                            <span>氏名</span>
                            <span class="sub-title__require">必須</span>
                        </label>
                        <input type="text" id="name" class="form-control">
                    </div>
                    <!--/.form-group-->
                </div>
                <!--/.block-form__sec-->
                <div class="block-form__sec">
                    <div class="form-group">
                        <label class="sub-title" for="input-company-name">
                            <span>社名</span>
                        </label>
                        <input type="text" id="input-company-name" class="form-control">
                    </div>
                    <!--/.form-group-->
                    <div class="form-group">
                        <label class="sub-title" for="input-postal-code">
                            <span>会社郵便番号</span>
                            <span class="sub-title__require">必須</span>
                        </label>
                        <input type="text" id="input-postal-code" class="form-control">
                    </div>
                    <!--/.form-group-->
                    <div class="form-group">
                        <button class="btn btn--block btn--yellow">郵便番号から住所を入力する</button>
                    </div>
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
                            <label>
                                <select>
                                    <option>都道府県</option>
                                </select>
                            </label>
                        </div>
                    </div>
                    <!--/.form-group-->
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="市区町村">
                    </div>
                    <!--/.form-group-->
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="続きの住所">
                    </div>
                    <!--/.form-group-->
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="マンション名、部屋番号">
                    </div>
                    <!--/.form-group-->
                </div>
                <!--/.block-form__sec-->
                <div class="block-form__sec">
                    <div class="form-group">
                        <label class="sub-title" for="input-phone">
                            <span>電話番号</span>
                            <span class="sub-title__require">必須</span>
                        </label>
                        <input type="text" id="input-phone" class="form-control">
                    </div>
                    <!--/.form-group-->
                </div>
                <!--/.block-form__sec-->
                <div class="block-form__sec">
                    <div class="form-group">
                        <label class="sub-title" for="input-tel">
                            <span>代表電話番号</span>
                            <span class="sub-title__require">必須</span>
                        </label>
                        <input type="text" id="input-tel" class="form-control">
                    </div>
                    <!--/.form-group-->
                </div>
                <!--/.block-form__sec-->
                <div class="block-form__sec">
                    <div class="form-group">
                        <label class="sub-title" for="input-fax">
                            <span>Fax番号</span>
                        </label>
                        <input type="text" id="input-fax" class="form-control">
                    </div>
                    <!--/.form-group-->
                </div>
                <!--/.block-form__sec-->
                <div class="block-form__sec">
                    <div class="form-group">
                        <label class="sub-title" for="input-person-in-charge">
                            <span>担当者氏名</span>
                            <span class="sub-title__require">必須</span>
                        </label>
                        <input type="text" id="input-person-in-charge" class="form-control">
                    </div>
                    <!--/.form-group-->
                </div>
                <!--/.block-form__sec-->
                <div class="block-form__sec">
                    <div class="form-group">
                        <label class="sub-title">
                            <span>担当者性別</span>
                            <span class="sub-title__require">必須</span>
                        </label>
                        <div class="select-group">
                            <label>
                                <select>
                                    <option>&nbsp;</option>
                                </select>
                            </label>
                        </div>
                    </div>
                    <!--/.form-group-->
                </div>
                <!--/.block-form__sec-->
                <div class="block-form__sec">
                    <div class="form-group">
                        <label class="sub-title" for="input-fax">
                            <span>生年月日</span>
                            <span class="sub-title__require">必須</span>
                        </label>
                        <div class="block-form__date-list clearfix">
                            <div class="block-form__date-list__year">
                                <div class="select-group">
                                    <label>
                                        <select>
                                            <option>年</option>
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <!--/.block-form__date-list__year-->
                            <div class="block-form__date-list__month">
                                <div class="select-group">
                                    <label>
                                        <select>
                                            <option>月</option>
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <!--/.block-form__date-list__month-->
                            <div class="block-form__date-list__day">
                                <div class="select-group">
                                    <label>
                                        <select>
                                            <option>日</option>
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <!--/.block-form__date-list__day-->
                        </div>
                        <!--/.block-form__date-list-->
                    </div>
                    <!--/.form-group-->
                </div>
                <!--/.block-form__sec-->
                <div class="block-form__sec">
                    <div class="form-group">
                        <label class="sub-title" for="input-tel-02">
                            <span>担当者と連絡が取れる電話番号</span>
                            <span class="sub-title__require">必須</span>
                        </label>
                        <input type="text" id="input-tel-02" class="form-control">
                    </div>
                    <!--/.form-group-->
                </div>
                <!--/.block-form__sec-->
                <div class="block-form__sec">
                    <div class="form-group">
                        <label class="sub-title">
                            <span>職種</span>
                            <span class="sub-title__require">必須</span>
                        </label>
                        <div class="select-group">
                            <label>
                                <select>
                                    <option>&nbsp;</option>
                                </select>
                            </label>
                        </div>
                    </div>
                    <!--/.form-group-->
                </div>
                <!--/.block-form__sec-->
                <div class="block-form__sec">
                    <div class="block-form__btn-list">
                        <ul>
                            <li>
                                <button class="btn btn--block btn--gray">利用規約を読む</button>
                            </li>
                            <li>
                                <button class="btn btn--block btn--gray">プライバシーポリシーを読む</button>
                            </li>
                        </ul>
                    </div>
                    <!--/.block-form__btn-list-->
                    <div class="checkbox-group">
                        <label>
                            <input type="checkbox">
                            <span>利用規約およびプライバシーポリシーを
                                <br>確認し、同意しました</span>
                        </label>
                    </div>
                    <!--/.checkbox-group-->
                </div>
                <!--/.block-form__sec-->
                <div class="block-form__btn-bottom">
                    <button class="btn btn--block btn--off">お問い合わせを送信する</button>
                </div>
                <!--/.block-form__btn-bottom-->
            </form>
        </section>
    </section>
</div>
<hr>
<div class="block-form">
    <nav class="block-form__step">
        <ol>
            <li class="block-form__step__active"><span>会員情報を入力</span></li>
            <li class="block-form__step__active"><span>会員情報の確認メール送信</span></li>
            <li class="block-form__step__current"><span>登録完了</span></li>
        </ol>
    </nav>
    <!--/.block-form__step-->
    <section class="block-form__header">
        <h2 class="block-form__header__title"> 会員登録が完了しました<br>ありがとうございました</h2>
        <p><a href="#" class="btn btn--block btn--default">トップページへ戻る</a></p>
        <p>資料請求を行う場合は続けてお届け先情報を登録していただくと大変便利です。</p>
    </section>
    <section>
        <h2 class="title-center">
            <span>お届け先情報</span>
        </h2>
        <form>
            <div class="form-group">
                <ul class="group-radio-list">
                    <li>
                        <label for="eatery-related-person">
                            <input type="radio" id="eatery-related-person" name="related-person" checked="checked">
                            <span>飲食店関係者</span>
                        </label>
                    </li>
                    <li>
                        <label for="other-related-person">
                            <input type="radio" id="other-related-person" name="related-person">
                            <span>その他</span>
                        </label>
                    </li>
                </ul>
            </div><!--/.form-group-->
            <section class="block-alert">
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
            </section><!--/.block-alert-->
            <div class="block-form__sec">
                <div class="form-group">
                    <label class="sub-title" for="name">
                        <span>氏名</span>
                        <span class="sub-title__require">必須</span>
                    </label>
                    <input type="text" id="name" class="form-control error">
                </div>
                <!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <div class="form-group">
                    <label class="sub-title" for="input-company-name">
                        <span>社名</span>
                    </label>
                    <input type="text" id="input-company-name" class="form-control">
                </div>
                <!--/.form-group-->
                <div class="form-group">
                    <label class="sub-title" for="input-postal-code">
                        <span>会社郵便番号</span>
                        <span class="sub-title__require">必須</span>
                    </label>
                    <input type="text" id="input-postal-code" class="form-control error">
                </div>
                <!--/.form-group-->
                <div class="form-group">
                    <button class="btn btn--block btn--yellow">郵便番号から住所を入力する</button>
                </div>
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
                            <select>
                                <option>都道府県</option>
                            </select>
                        </label>
                    </div>
                </div>
                <!--/.form-group-->
                <div class="form-group">
                    <input type="text" class="form-control error" placeholder="市区町村">
                </div>
                <!--/.form-group-->
                <div class="form-group">
                    <input type="text" class="form-control error" placeholder="続きの住所">
                </div>
                <!--/.form-group-->
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="マンション名、部屋番号">
                </div>
                <!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <div class="form-group">
                    <label class="sub-title" for="input-phone">
                        <span>電話番号</span>
                        <span class="sub-title__require">必須</span>
                    </label>
                    <input type="text" id="input-phone" class="form-control error">
                </div>
                <!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <div class="form-group">
                    <label class="sub-title" for="input-tel">
                        <span>代表電話番号</span>
                        <span class="sub-title__require">必須</span>
                    </label>
                    <input type="text" id="input-tel" class="form-control error">
                </div>
                <!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <div class="form-group">
                    <label class="sub-title" for="input-fax">
                        <span>Fax番号</span>
                    </label>
                    <input type="text" id="input-fax" class="form-control">
                </div>
                <!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <div class="form-group">
                    <label class="sub-title" for="input-person-in-charge">
                        <span>担当者氏名</span>
                        <span class="sub-title__require">必須</span>
                    </label>
                    <input type="text" id="input-person-in-charge" class="form-control error">
                </div>
                <!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <div class="form-group">
                    <label class="sub-title">
                        <span>担当者性別</span>
                        <span class="sub-title__require">必須</span>
                    </label>
                    <div class="select-group">
                        <label class="error">
                            <select>
                                <option>&nbsp;</option>
                            </select>
                        </label>
                    </div>
                </div>
                <!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <div class="form-group">
                    <label class="sub-title" for="input-fax">
                        <span>生年月日</span>
                        <span class="sub-title__require">必須</span>
                    </label>
                    <div class="block-form__date-list clearfix">
                        <div class="block-form__date-list__year">
                            <div class="select-group">
                                <label class="error">
                                    <select>
                                        <option>年</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                        <!--/.block-form__date-list__year-->
                        <div class="block-form__date-list__month">
                            <div class="select-group">
                                <label class="error">
                                    <select>
                                        <option>月</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                        <!--/.block-form__date-list__month-->
                        <div class="block-form__date-list__day">
                            <div class="select-group">
                                <label class="error">
                                    <select>
                                        <option>日</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                        <!--/.block-form__date-list__day-->
                    </div>
                    <!--/.block-form__date-list-->
                </div>
                <!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <div class="form-group">
                    <label class="sub-title" for="input-tel-02">
                        <span>担当者と連絡が取れる電話番号</span>
                        <span class="sub-title__require">必須</span>
                    </label>
                    <input type="text" id="input-tel-02" class="form-control error">
                </div>
                <!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <div class="form-group">
                    <label class="sub-title">
                        <span>職種</span>
                        <span class="sub-title__require">必須</span>
                    </label>
                    <div class="select-group">
                        <label class="error">
                            <select>
                                <option>&nbsp;</option>
                            </select>
                        </label>
                    </div>
                </div>
                <!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <div class="block-form__btn-list">
                    <ul>
                        <li>
                            <button class="btn btn--block btn--gray">利用規約を読む</button>
                        </li>
                        <li>
                            <button class="btn btn--block btn--gray">プライバシーポリシーを読む</button>
                        </li>
                    </ul>
                </div>
                <!--/.block-form__btn-list-->
                <div class="checkbox-group">
                    <label>
                        <input type="checkbox">
                        <span>利用規約およびプライバシーポリシーを
                            <br>確認し、同意しました</span>
                    </label>
                </div>
                <!--/.checkbox-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__btn-bottom">
                <button class="btn btn--block btn--off">お問い合わせを送信する</button>
            </div>
            <!--/.block-form__btn-bottom-->
        </form>
    </section>
</div>
<hr>
<div class="block-form">
    <nav class="block-form__step">
        <ol>
            <li class="block-form__step__active"><span>会員情報を入力</span></li>
            <li class="block-form__step__active"><span>会員情報の確認メール送信</span></li>
            <li class="block-form__step__current"><span>登録完了</span></li>
        </ol>
    </nav>
    <!--/.block-form__step-->
    <section class="block-form__header">
        <h2 class="block-form__header__title"> 会員登録が完了しました<br>ありがとうございました</h2>
        <p><a href="#" class="btn btn--block btn--default">トップページへ戻る</a></p>
        <p>資料請求を行う場合は続けてお届け先情報を登録していただくと大変便利です。</p>
    </section>
    <section>
        <h2 class="title-center">
            <span>お届け先情報</span>
        </h2>
        <form>
            <div class="form-group">
                <ul class="group-radio-list">
                    <li>
                        <label for="eatery-related-person">
                            <input type="radio" id="eatery-related-person" name="related-person" checked="checked">
                            <span>飲食店関係者</span>
                        </label>
                    </li>
                    <li>
                        <label for="other-related-person">
                            <input type="radio" id="other-related-person" name="related-person">
                            <span>その他</span>
                        </label>
                    </li>
                </ul>
            </div>
            <!--/.form-group-->
            <div class="block-form__sec">
                <div class="form-group">
                    <label class="sub-title" for="name">
                        <span>氏名</span>
                        <span class="sub-title__require">必須</span>
                    </label>
                    <input type="text" id="name" class="form-control">
                </div>
                <!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <div class="form-group">
                    <label class="sub-title" for="input-postal-code">
                        <span>会社郵便番号</span>
                        <span class="sub-title__require">必須</span>
                    </label>
                    <input type="text" id="input-postal-code" class="form-control">
                </div>
                <!--/.form-group-->
                <div class="form-group">
                    <button class="btn btn--block btn--yellow">郵便番号から住所を入力する</button>
                </div>
                <!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <div class="form-group">
                    <label class="sub-title">
                        <span>住所</span>
                        <span class="sub-title__require">必須</span>
                    </label>
                    <div class="select-group">
                        <label>
                            <select>
                                <option>都道府県</option>
                            </select>
                        </label>
                    </div>
                </div>
                <!--/.form-group-->
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="市区町村">
                </div>
                <!--/.form-group-->
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="続きの住所">
                </div>
                <!--/.form-group-->
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="マンション名、部屋番号">
                </div>
                <!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <div class="form-group">
                    <label class="sub-title" for="input-phone">
                        <span>電話番号</span>
                        <span class="sub-title__require">必須</span>
                    </label>
                    <input type="text" id="input-phone" class="form-control">
                </div>
                <!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <div class="form-group">
                    <label class="sub-title" for="input-tel">
                        <span>携帯番号</span>
                        <span class="sub-title__require">必須</span>
                    </label>
                    <input type="text" id="input-tel" class="form-control">
                </div>
                <!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <div class="form-group">
                    <label class="sub-title" for="input-fax">
                        <span>Fax番号</span>
                    </label>
                    <input type="text" id="input-fax" class="form-control">
                </div>
                <!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <div class="form-group">
                    <label class="sub-title" for="input-person-in-charge">
                        <span>担当者氏名</span>
                        <span class="sub-title__require">必須</span>
                    </label>
                    <input type="text" id="input-person-in-charge" class="form-control">
                </div>
                <!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <div class="form-group">
                    <label class="sub-title">
                        <span>性別</span>
                        <span class="sub-title__require">必須</span>
                    </label>
                    <div class="select-group">
                        <label>
                            <select>
                                <option>&nbsp;</option>
                            </select>
                        </label>
                    </div>
                </div>
                <!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <div class="form-group">
                    <label class="sub-title" for="input-fax">
                        <span>生年月日</span>
                        <span class="sub-title__require">必須</span>
                    </label>
                    <div class="block-form__date-list clearfix">
                        <div class="block-form__date-list__year">
                            <div class="select-group">
                                <label>
                                    <select>
                                        <option>年</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                        <!--/.block-form__date-list__year-->
                        <div class="block-form__date-list__month">
                            <div class="select-group">
                                <label>
                                    <select>
                                        <option>月</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                        <!--/.block-form__date-list__month-->
                        <div class="block-form__date-list__day">
                            <div class="select-group">
                                <label>
                                    <select>
                                        <option>日</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                        <!--/.block-form__date-list__day-->
                    </div>
                    <!--/.block-form__date-list-->
                </div>
                <!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <div class="block-form__btn-list">
                    <ul>
                        <li>
                            <button class="btn btn--block btn--gray">利用規約を読む</button>
                        </li>
                        <li>
                            <button class="btn btn--block btn--gray">プライバシーポリシーを読む</button>
                        </li>
                    </ul>
                </div>
                <!--/.block-form__btn-list-->
                <div class="checkbox-group">
                    <label>
                        <input type="checkbox">
                        <span>利用規約およびプライバシーポリシーを
                            <br>確認し、同意しました</span>
                    </label>
                </div>
                <!--/.checkbox-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__btn-bottom">
                <button class="btn btn--block btn--off">お問い合わせを送信する</button>
            </div>
            <!--/.block-form__btn-bottom-->
        </form>
    </section>
</div>
<hr>
<div class="block-form">
    <nav class="block-form__step">
        <ol>
            <li class="block-form__step__active"><span>会員情報を入力</span></li>
            <li class="block-form__step__active"><span>会員情報の確認メール送信</span></li>
            <li class="block-form__step__current"><span>登録完了</span></li>
        </ol>
    </nav>
    <!--/.block-form__step-->
    <section class="block-form__header">
        <h2 class="block-form__header__title"> 会員登録が完了しました<br>ありがとうございました</h2>
        <p><a href="#" class="btn btn--block btn--default">トップページへ戻る</a></p>
        <p>資料請求を行う場合は続けてお届け先情報を登録していただくと大変便利です。</p>
    </section>
    <section>
        <h2 class="title-center">
            <span>お届け先情報</span>
        </h2>
        <form>
            <div class="form-group">
                <ul class="group-radio-list">
                    <li>
                        <label for="eatery-related-person">
                            <input type="radio" id="eatery-related-person" name="related-person">
                            <span>飲食店関係者</span>
                        </label>
                    </li>
                    <li>
                        <label for="other-related-person">
                            <input type="radio" id="other-related-person" name="related-person" checked="checked">
                            <span>その他</span>
                        </label>
                    </li>
                </ul>
            </div><!--/.form-group-->
            <section class="block-alert">
                <h2 class="block-alert__title">
                    <span>ご確認ください</span>
                </h2>
                <ul class="block-alert__list">
                    <li>氏名を入力してください。</li>
                    <li>郵便番号を入力してください。</li>
                    <li>住所を入力してください。</li>
                    <li>電話番号を入力してください。</li>
                    <li>性別を選択してください。</li>
                    <li>生年月日を選択してください。</li>
                </ul>
            </section><!--/.block-alert-->
            <div class="block-form__sec">
                <div class="form-group">
                    <label class="sub-title" for="name">
                        <span>氏名</span>
                        <span class="sub-title__require">必須</span>
                    </label>
                    <input type="text" id="name" class="form-control error">
                </div>
                <!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <div class="form-group">
                    <label class="sub-title" for="input-postal-code">
                        <span>郵便番号</span>
                        <span class="sub-title__require">必須</span>
                    </label>
                    <input type="text" id="input-postal-code" class="form-control error">
                </div>
                <!--/.form-group-->
                <div class="form-group">
                    <button class="btn btn--block btn--yellow">郵便番号から住所を入力する</button>
                </div>
                <!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <div class="form-group">
                    <label class="sub-title">
                        <span>住所</span>
                        <span class="sub-title__require">必須</span>
                    </label>
                    <div class="select-group">
                        <label class="error">
                            <select>
                                <option>都道府県</option>
                            </select>
                        </label>
                    </div>
                </div>
                <!--/.form-group-->
                <div class="form-group">
                    <input type="text" class="form-control error" placeholder="市区町村">
                </div>
                <!--/.form-group-->
                <div class="form-group">
                    <input type="text" class="form-control error" placeholder="続きの住所">
                </div>
                <!--/.form-group-->
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="マンション名、部屋番号">
                </div>
                <!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <div class="form-group">
                    <label class="sub-title" for="input-phone">
                        <span>電話番号</span>
                        <span class="sub-title__require">必須</span>
                    </label>
                    <input type="text" id="input-phone" class="form-control error">
                </div>
                <!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <div class="form-group">
                    <label class="sub-title" for="input-tel">
                        <span>携帯番号</span>
                        <span class="sub-title__require">必須</span>
                    </label>
                    <input type="text" id="input-tel" class="form-control error">
                </div>
                <!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <div class="form-group">
                    <label class="sub-title" for="input-fax">
                        <span>Fax番号</span>
                    </label>
                    <input type="text" id="input-fax" class="form-control">
                </div>
                <!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <div class="form-group">
                    <label class="sub-title">
                        <span>性別</span>
                        <span class="sub-title__require">必須</span>
                    </label>
                    <div class="select-group">
                        <label class="error">
                            <select>
                                <option>&nbsp;</option>
                            </select>
                        </label>
                    </div>
                </div>
                <!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <div class="form-group">
                    <label class="sub-title" for="input-fax">
                        <span>生年月日</span>
                        <span class="sub-title__require">必須</span>
                    </label>
                    <div class="block-form__date-list clearfix">
                        <div class="block-form__date-list__year">
                            <div class="select-group">
                                <label class="error">
                                    <select>
                                        <option>年</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                        <!--/.block-form__date-list__year-->
                        <div class="block-form__date-list__month">
                            <div class="select-group">
                                <label class="error">
                                    <select>
                                        <option>月</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                        <!--/.block-form__date-list__month-->
                        <div class="block-form__date-list__day">
                            <div class="select-group">
                                <label class="error">
                                    <select>
                                        <option>日</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                        <!--/.block-form__date-list__day-->
                    </div>
                    <!--/.block-form__date-list-->
                </div>
                <!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <div class="block-form__btn-list">
                    <ul>
                        <li>
                            <button class="btn btn--block btn--gray">利用規約を読む</button>
                        </li>
                        <li>
                            <button class="btn btn--block btn--gray">プライバシーポリシーを読む</button>
                        </li>
                    </ul>
                </div>
                <!--/.block-form__btn-list-->
                <div class="checkbox-group">
                    <label>
                        <input type="checkbox">
                        <span>利用規約およびプライバシーポリシーを
                            <br>確認し、同意しました</span>
                    </label>
                </div>
                <!--/.checkbox-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__btn-bottom">
                <button class="btn btn--block btn--off">お問い合わせを送信する</button>
            </div>
            <!--/.block-form__btn-bottom-->
        </form>
    </section>
</div>
<hr>
<div class="block-form">
    <section class="block-form__header">
        <h4>以下の情報で登録を行います。<br>ご確認ください。</h4>
    </section>
    <section>
        <h2 class="title-center">
            <span>お届け先情報</span>
        </h2>
        <form>
            <div class="block-form__sec">
                <label class="sub-title">
                    <span>屋号</span>
                </label>
                <div class="form-group">
                    <p>〇〇〇〇〇</p>
                </div><!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <div class="form-group">
                    <label class="sub-title">
                        <span>会社名</span>
                    </label>
                   <p>〇〇〇〇会社</p>
                </div>
                <!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <div class="form-group">
                    <label class="sub-title">
                        <span>会社郵便番号</span>
                    </label>
                    <p>000-0000</p>
                </div>
                <!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <div class="form-group">
                    <label class="sub-title">
                        <span>会社住所</span>
                    </label>
                    <p>東京都港区東麻布2-16-3 サナダビル</p>
                </div>
                <!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <div class="form-group">
                    <label class="sub-title">
                        <span>代表電話番号</span>
                    </label>
                    <p>00-0000-0000</p>
                </div>
                <!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <div class="form-group">
                    <label class="sub-title">
                        <span>Fax番号</span>
                    </label>
                    <p>00-0000-0000</p>
                </div>
                <!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <div class="form-group">
                    <label class="sub-title">
                        <span>担当者名</span>
                    </label>
                    <p>〇〇〇　〇〇〇</p>
                </div>
                <!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <div class="form-group">
                    <label class="sub-title">
                        <span>担当者性別</span>
                    </label>
                    <p>その他</p>
                </div>
                <!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <div class="form-group">
                    <label class="sub-title">
                        <span>生年月日</span>
                    </label>
                    <p>0000年　00月　00日</p>
                </div>
                <!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <div class="form-group">
                    <label class="sub-title">
                        <span>担当者と連絡が取れる電話番号</span>
                    </label>
                    <p>00-0000-0000</p>
                </div>
                <!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <div class="form-group">
                    <label class="sub-title">
                        <span>職業</span>
                    </label>
                    <p>〇〇〇　〇〇〇</p>
                </div>
                <!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__btn-bottom block-form__btn-bottom--completed">
                <button class="btn btn--block btn--on">お届け先情報を登録する</button>
            </div>
            <!--/.block-form__btn-bottom-->
        </form>
    </section>
</div>
<hr>
<div class="block-form">
    <section class="block-form__header">
        <h4>以下の情報で登録を行います。<br>ご確認ください。</h4>
    </section>
    <section>
        <h2 class="title-center">
            <span>お届け先情報</span>
        </h2>
        <form>
            <div class="block-form__sec">
                <label class="sub-title">
                    <span>氏名</span>
                </label>
                <div class="form-group">
                    <p>〇〇〇　〇〇</p>
                </div><!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <label class="sub-title">
                    <span>郵便番号</span>
                </label>
                <div class="form-group">
                    <p>000-0000</p>
                </div><!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <div class="form-group">
                    <label class="sub-title">
                        <span>会社住所</span>
                    </label>
                    <p>東京都港区東麻布2-16-3 サナダビル</p>
                </div>
                <!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <div class="form-group">
                    <label class="sub-title">
                        <span>電話番号</span>
                    </label>
                    <p>00-0000-0000</p>
                </div>
                <!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <div class="form-group">
                    <label class="sub-title">
                        <span>Fax番号</span>
                    </label>
                    <p>00-0000-0000</p>
                </div>
                <!--/.form-group-->
            </div>
            <div class="block-form__sec">
                <div class="form-group">
                    <label class="sub-title">
                        <span>性別</span>
                    </label>
                    <p>その他</p>
                </div>
                <!--/.form-group-->
            </div>
            <!--/.block-form__sec-->
            <div class="block-form__sec">
                <div class="form-group">
                    <label class="sub-title">
                        <span>生年月日</span>
                    </label>
                    <p>0000年　00月　00日</p>
                </div>
                <!--/.form-group-->
            </div>
            <div class="block-form__btn-bottom block-form__btn-bottom--completed">
                <button class="btn btn--block btn--on">お届け先情報を登録する</button>
            </div>
            <!--/.block-form__btn-bottom-->
        </form>
    </section>
</div>
<hr>
<div class="block-form">
    <section class="block-form__confirm">
        <h3 class="block-form__confirm__title">資料の送付先を登録しました</h3>
        <p>郵送の資料は登録されている住所へお届けします。</p>
        <p class="mb12">変更がある場合はマイページの「<a href="#" class="text-underline">会員情報確認・編集</a>」より変更してください。</p>
        <div class="block-form__confirm__btn-list">
            <ul>
                <li><a href="#" class="btn btn--block btn--default">会員情報確認・編集ページへ</a></li>
                <li><a href="#" class="btn btn--block btn--default">トップページへ戻る</a></li>
            </ul>
        </div><!--/.block-form__confirm__btn-list-->
    </section><!--/.password-forgotten__success-->
</div>
</div>
@endsection
</div>