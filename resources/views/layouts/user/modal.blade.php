<div id="modalLogin" class="modal-login">
    <div class="modal-login__inner">
        <h2 class="modal-login__logo">
            <img src="{{asset('images/logo_modal_sp.png')}}" alt="EATAS">
        </h2>

        <div class="block-form">
            <form method="POST" action="{{ route('user.login') }}">
                {{ csrf_field() }}
                <h2 class="modal-login__head">ログイン</h2>
                @if(isset($errors) && $errors->has('auth'))
                <div class="modal-login__alert-error">
                    <p>登録メールアドレスまたはパスワードが間違っています。</p>
                </div>
                @endif
                <div class="block-form__sec">
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="メールアドレス" value="{{old('email')}}">
                    </div>
                    <!--/.form-group-->
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="パスワード">
                    </div>
                    <!--/.form-group-->
                    <div class="form-group mb10-ipt">
                        <button class="btn btn--block btn--on">ログイン</button>
                    </div>
                    <div class="modal-login__link-txt">
                        <a href="{{route('user.password.request')}}" class="text-underline02">パスワードを忘れた方はこちら</a>
                    </div>
                </div>
                <input type="hidden" name="inquiring_product_id" class="inquiering_product" />
            </form>

            <div class="block-form__sec">
                <div class="modal-login__footer">
                    <a href="{{route('user.intro')}}">会員ではないですか？</a>
                    <a href="{{route('user.intro')}}" class="btn btn--block btn--yellow">新規登録</a>
                </div>
                <!--/.modal-login__footer-->
            </div>
        </div>    
    </div>
</div>



<div id="modalLoginIntro" class="modal-login">
    <div class="modal-login__inner">
        <div class="modal-login-intro">
            <h2 class="modal-login-intro__title">この機能を使うには<br>会員登録またはログインが必要です</h2>
            <div class="modal-login-intro__content">
                <p>会員登録はニックネームを決めてメールアドレスを送信、届いたメールに記載されているアドレスをクリックするだけ！</p>
                <p><span class="text-bold text-org">各種SNSと連携する場合はもっと簡単！</span><br>ガイドに従って連携ボタンを押せば登録完了です。</p>
            </div>
            <div>
                <form method="GET" action="{{ route('user.intro') }}">
                    <input type="hidden" name="inquiring_product_id" class="inquiering_product" />
                    <button class="btn btn--block btn--yellow">新規登録</button>
                </form>
            </div>
        </div>
        <div class="block-form">
            <form method="POST" action="{{ route('user.login') }}">
                {{ csrf_field() }}
                <h2 class="modal-login__head">ログイン</h2>
                <div class="block-form__sec">
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="メールアドレス" value="{{old('email')}}">
                    </div>
                    <!--/.form-group-->
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="パスワード">
                    </div>
                    <!--/.form-group-->
                    <div class="form-group mb10-ipt">
                        <button class="btn btn--block btn--on">ログイン</button>
                    </div>
                    <div class="modal-login__link-txt">
                        <a href="{{route('user.password.request')}}" class="text-underline02">パスワードを忘れた方はこちら</a>
                    </div>
                </div>
                <input type="hidden" name="inquiring_product_id" class="inquiering_product" />
            </form>
        </div>
    </div>
</div>