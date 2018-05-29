@extends('layouts.user.default')

@section('content')
<h2 class="page-title">EATASからのお知らせ</h2>
<div class="content-center">
<div class="whats-page">
  <div class="whats">
    <div class="whats__mainvisual">
      <div class="mainvisual__text">
        <p>飲食店成功のカギに出会える</p>
      </div>
      <div class="mainvisual__logo">
        <img src="{{asset('images/logo_modal_sp_shadowed.png')}}" alt="EATAS logo">
      </div>
    </div>
    <div class="whats__look">
      <div class="whats__stripes-title stripes-title--yellow stripes-title--background">
        <h2>「見て終わり」にしない</h2>
      </div>
      <p class="whats__paragraphs whats__paragraphs--relative">欲しい情報をシンプルに・ストレスなく手に入れる</p>
      <div class="step-img">
        <img src="{{asset('images/img_whats_steps.png')}}" alt="">
      </div>
    </div>
    <div class="whats__steps-image">
      <img src="{{asset('images/img_whats_steps_point.png')}}" alt="Steps">
    </div>
    <!-- /.point-block -->
    <div class="point-block">
      <div class="whats__big-title big-title">
        <div class="big-title__number">
          <img src="{{asset('images/img_whats_number_one.png')}}" alt="Number one">
        </div>
        <div class="big-title__text pl16">
          <p>EATASの記事は
            <br>ちょっと違う！
          </p>
        </div>
      </div>
      <div class="whats__shadow-image">
        <img src="{{asset('images/img_whats_point_1.png')}}" alt="Point 1">
      </div>
      <p class="pt17 pb12 whats__shadow-title">EATAS編集部が独自に取材、編集した、飲食店経営にすぐ活用できる情報をわかりやすい文章でお届けします。</p>
      <a class="btn btn--block btn--blue-w-text-shadow" href="{{route('root.index')}}">EATASの記事を読む</a>
    </div>
    <div class="point-block">
      <div class="whats__big-title big-title">
        <div class="big-title__number">
          <img src="{{asset('images/img_whats_number_two.png')}}" alt="Number two">
        </div>
        <div class="big-title__text pl18">
          <p>EATASはあなたを
            <br>しっかりサポート！
          </p>
        </div>
      </div>
      <div class="whats__shadow-image">
        <img src="{{asset('images/img_whats_point_2.png')}}" alt="Point 2">
      </div>
      <p class="pt15 pb10 whats__shadow-title">抱えている悩みや課題はあるけれど、どの記事を読めばいいのかわからない…。
        <br>そんな方は、
        <strong>EATASコンシェルジュ</strong>に電話でご相談ください。<br/>
        ※受付時間は<strong>平日10時から19時まで</strong>となります。
      </p>
      <p class="pb10 whats__shadow-title">あなたのコンシェルジュとなってご希望する内容についての記事やサービス商品の資料や情報の案内をいたします。</p>
      <a href="tel:{{ config('app.company_tel') }}" class="btn btn--block btn--blue-w-text-shadow">EATASコンシェルジュに電話する</a>
    </div>
    <!-- /.point-block -->
    <div class="point-block pb40-ipt">
      <div class="whats__big-title big-title">
        <div class="big-title__number">
          <img src="{{asset('images/img_whats_number_three.png')}}" alt="Number three">
        </div>
        <div class="big-title__text pl18">
          <p>EATASの資料請求は
            <br>便利でおトク
          </p>
        </div>
      </div>
      <div class="whats__shadow-image">
        <img src="{{asset('images/img_whats_point_3.png')}}" alt="Point 3">
      </div>
      <p class="pt15 pb10 whats__shadow-title">気になる商品に関連した商材の資料もまとめて請求できるのでとっても便利。</p>
      <p class="pb10 whats__shadow-title">PDFと書かれている資料は、資料請求ボタンを押すとすぐにパソコンやお手元のスマートフォンで見ることができます※。
        <br>※ 無料の会員登録が必要です。</p>
      <p class="pb10 whats__shadow-title">もちろん郵送で資料をお届けすることも可能です。</p>
      <p class="pb15 whats__shadow-title">さらに、買い物にも使える<strong>EATASポイント</strong>が貯まる！</p>
      <ul class="point-question mb12">
        <li class="pb06 mb10 fs14">
          <h3>EATASポイントって？</h3>
        </li>
        <li class="pb07 mb10">資料請求やお問い合わせでポイントを貯めることができます<span class="red">※</span></li>
        <li class="pb07 mb10">本サイトを通してサービスや商品の購入をした場合もポイントが貯まります。</li>
        <li class="border-0">貯めたポイントは次回以降のサービスや商品購入時にお使いいただけます。</li>
      </ul>
      <a class="btn btn--block btn--blue-w-text-shadow" href="{{route('user.intro')}}">EATASを使ってみる</a>
    </div>
    <!-- /.point-block -->
    <div class="whats__full-width">
      <div class="whats__stripes-title stripes-title--gray">
        <h2>よくある質問</h2>
      </div>
    </div>
    <p class="mt12 mb10 whats__shadow-title">困っていることがあるけれどどこに相談すれば良いかわからない</p>
    <div class="whats__full-width pl12 pr12 yellow-background cyan-dash-bottom-border">
      <div class="whats__yellow-point">
        <div class="yellow-point__icon">
          <img src="{{asset('images/img_whats_icon_arrow_right.png')}}" alt="Arrow">
        </div>
        <div class="yellow-point__text">
          <p>EATASコンシェルジュへお問い合わせください。</p>
        </div>
      </div>
    </div>
    <p class="mt12 mb10 whats__shadow-title">なるべく効率よく情報収集を行いたい</p>
    <div class="whats__full-width pl12 pr12 yellow-background cyan-dash-bottom-border">
        <div class="whats__yellow-point">
          <div class="yellow-point__icon">
            <img src="{{asset('images/img_whats_icon_arrow_right.png')}}" alt="Arrow">
          </div>
          <div class="yellow-point__text">
            <p>カテゴリごとの記事検索や関連記事にご紹介が最適です</p>
          </div>
        </div>
      </div>
    <p class="mt12 mb10 whats__shadow-title">なるべく効率よくベストな改善策を見つけたい</p>
    <div class="whats__full-width pl12 pr12 yellow-background cyan-dash-bottom-border">
        <div class="whats__yellow-point">
          <div class="yellow-point__icon">
            <img src="{{asset('images/img_whats_icon_arrow_right.png')}}" alt="Arrow">
          </div>
          <div class="yellow-point__text">
            <p>一括資料請求で類似サービスや商品を一気に比較検討できます</p>
          </div>
        </div>
      </div>
      <a class="btn btn--block btn--blue-w-text-shadow mt12 mb25" href="{{route('root.faq')}}">よくある質問をもっと読む</a>
  </div>
  </div>
</div>

@endsection
