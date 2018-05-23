@extends('layouts.user.default')

@section('content')
<div class="content-center">
    <nav>
        <ol class="breadcrumb clearfix">
            <li class="breadcrumb__item"><a href="{{route('root.index')}}">Top</a></li>
            <li class="breadcrumb__item">ポイント履歴</li>
        </ol>
    </nav><!--/.breadcrumb-->
    <div class="block-point-number">
        <div class="block-point-number__icon">

        </div>
        <dl>
            <dt>保有ポイント数</dt>
            <dd>
                <strong>10</strong><span>ポイント</span>
            </dd>
        </dl>
    </div><!--/.block-point-number-->
    <div class="point-number-buysell">
        <div class="point-number-buysell__header">
            <h2 class="section__title"><span>ポイント利用・獲得履歴</span></h2>
            <a href="#" class="btn-expiration"><span>失効予定はこちら</span></a>
        </div>
        <div class="point-number-buysell__body">
            <table class="table-point-buysell">
                <thead>
                    <tr>
                        <th>日付</th>
                        <th>区分</th>
                        <th>内容</th>
                        <th>ポイント数</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2018.1.18</td>
                        <td><span class="label-bs">獲得</span></td>
                        <td>資料請求</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>2018.2.20</td>
                        <td><span class="label-bs">獲得</span></td>
                        <td>電話相談</td>
                        <td>50</td>
                    </tr>
                    <tr>
                        <td>2018.4.11</td>
                        <td><span class="label-bs">獲得</span></td>
                        <td>電話相談</td>
                        <td>50</td>
                    </tr>
                    <tr>
                        <td>2018.1.18</td>
                        <td><span class="label-bs label-bs--yellow">利用</span></td>
                        <td>サービス購入</td>
                        <td>-100</td>
                    </tr>
                    <tr>
                        <td>2018.1.18</td>
                        <td><span class="label-bs">獲得</span></td>
                        <td>資料請求</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>2018.2.20</td>
                        <td><span class="label-bs">獲得</span></td>
                        <td>電話相談</td>
                        <td>50</td>
                    </tr>
                    <tr>
                        <td>2018.4.11</td>
                        <td><span class="label-bs">獲得</span></td>
                        <td>電話相談</td>
                        <td>50</td>
                    </tr>
                    <tr>
                        <td>2018.1.18</td>
                        <td><span class="label-bs label-bs--yellow">利用</span></td>
                        <td>サービス購入</td>
                        <td>-100</td>
                    </tr>
                    <tr>
                        <td>2018.1.18</td>
                        <td><span class="label-bs">獲得</span></td>
                        <td>資料請求</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>2018.2.20</td>
                        <td><span class="label-bs">獲得</span></td>
                        <td>電話相談</td>
                        <td>50</td>
                    </tr>
                    <tr>
                        <td>2018.4.11</td>
                        <td><span class="label-bs">獲得</span></td>
                        <td>電話相談</td>
                        <td>50</td>
                    </tr>
                    <tr>
                        <td>2018.1.18</td>
                        <td><span class="label-bs label-bs--yellow">利用</span></td>
                        <td>サービス購入</td>
                        <td>-100</td>
                    </tr>
                    <tr>
                        <td>2018.1.18</td>
                        <td><span class="label-bs">獲得</span></td>
                        <td>資料請求</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>2018.2.20</td>
                        <td><span class="label-bs">獲得</span></td>
                        <td>電話相談</td>
                        <td>50</td>
                    </tr>
                    <tr>
                        <td>2018.4.11</td>
                        <td><span class="label-bs">獲得</span></td>
                        <td>電話相談</td>
                        <td>50</td>
                    </tr>
                    <tr>
                        <td>2018.1.18</td>
                        <td><span class="label-bs label-bs--yellow">利用</span></td>
                        <td>サービス購入</td>
                        <td>-100</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
