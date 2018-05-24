@extends('layouts.user.default')

@section('content')
<nav>
    <ol class="breadcrumb clearfix">
        <li class="breadcrumb__item"><a href="{{route('root.index')}}">Top</a></li>
        <li class="breadcrumb__item">ポイント履歴</li>
    </ol>
</nav><!--/.breadcrumb-->
<div class="content-center">
    <div class="block-point-main">
        <div class="block-point-saving">
            <div class="block-point-saving__inner">
                <div class="block-point-saving__icon">
                    <img src="{{ asset('images/saving.png') }}" alt="保有ポイント数">
                </div>
                <dl>
                    <dt>保有ポイント数</dt>
                    <dd>
                        <strong>10</strong><span>ポイント</span>
                    </dd>
                </dl>
            </div>
        </div><!--/.block-point-saving-->
        <div class="point-number-buysell">
            <div class="point-number-buysell__header">
                <h2 class="section-title"><span>ポイント利用・獲得履歴</span></h2>
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
                <!-- please refer to this below commented out block if you need add active indicator and previous button -->
                <!-- <nav>
                  <ul class="pagination">
                    <li class="pagination__disabled"><a href="#"><i class="fa fa-chevron-left" aria-hidden="true"></i></a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li class="pagination__dot"><a href="#"><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-chevron-right" aria-hidden="true"></i></a></li>
                  </ul>
                </nav> -->
                <nav>
                  <ul class="pagination">
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li class="pagination__dot"><a href="#"><span></span><span></span><span></span></a></li>
                    <li><a href="#"><i class="fa fa-chevron-right" aria-hidden="true"></i></a></li>
                  </ul>
                </nav>
            </div>
        </div><!--/.point-number-buysell-->
        <div class="block-revoke">
            <h2 class="section-title"><span>失効予定</span></h2>
             <div class="block-revoke__body">
                <table class="table-revoke">
                    <thead>
                        <tr>
                            <th>獲得日</th>
                            <th>失効予定ポイント</th>
                            <th>失効予定日</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2018.1.18</td>
                            <td>10</td>
                            <td>2019/1/18</td>
                        </tr>
                        <tr>
                            <td>2018.2.20</td>
                            <td>10</td>
                            <td>2019/2/18</td>
                        </tr>
                        <tr>
                            <td>2018.3.10</td>
                            <td>10</td>
                            <td>2019/3/18</td>
                        </tr>
                    </tbody>
                </table>
             </div>
        </div><!--/.revoke-->
    </div>
</div>
@endsection
