<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//トップ
Route::get('/', 'RootController@index')->name('root.index');
Route::get('/loged', 'RootController@indexAuthed')->name('root.index_authed_header.blade');


//動画用URL
Route::get('/movie', "RootController@movie")->name('root.movie');

Route::get('/sitemap.xml', 'SiteMapController@index')->name('root.sitemap');

Route::get('/robots.txt', function ()
{
    if (App::environment() == 'production') {
        Robots::addUserAgent('*');
        Robots::addSitemap('sitemap.xml');
    } else {
        Robots::addDisallow('*');
    }
    return Response::make(Robots::generate(), 200, ['Content-Type' => 'text/plain']);
});

Route::get('/storage', function() {
    return abort(404);
})->name('storage');

Route::get('/storage/image/{path}', 'StorageController@image');
Route::get('/storage/image/articles/{article}/{path}', 'StorageController@articles');
Route::get('/storage/image/tmp/{hash}/{path}', 'StorageController@tmp');

Route::get('/img/system/no-image.png')->name('noImage');

//このサイトについて
Route::get('/about', 'RootController@about')->name('root.about');

//FAQ
Route::get('/faq', 'RootController@faq')->name('root.faq');

//利用規約
Route::get('/term', 'RootController@term')->name('root.term');

//お知らせ一覧
Route::get('/notices', 'RootController@notices')->name('root.notices');

//問い合わせ
Route::prefix('/contact')->group(function () {
    Route::get('add', 'ContactController@showAddForm')->name('contact.add');
    Route::post('add', 'ContactController@add');
    Route::get('thanks', 'ContactController@thanks')->name('contact.thanks');
});

//検索
Route::get('/search', 'ArticleController@search')->name('articles.search');

//記事URL
Route::get('article/{article}', 'ArticleController@view')->name('articles.view');


//ユーザ
Route::prefix('/user')->namespace('User')->group(function () {
    //マイページ関連
    Route::get('', "IndexController@mypage" )->name('user.mypage');
    Route::get('edit', 'IndexController@showEditForm')->name('user.edit');
    Route::post('edit', 'IndexController@edit');

    Route::get('validate/{token}', 'IndexController@validateMail')->name('user.validate');
    Route::get('validated', 'IndexController@validated')->name('user.validated');

    Route::get('stocks', "StockController@index" )->name('user.stocks');

    Route::get('clips', "ClipController@index" )->name('user.clips');

    Route::get('inquiries', "InquiryController@index" )->name('user.inquiries');

    Route::get('inquiries/confirm_register', "InquiryController@showConfirmRegister" )->name('user.inquiries.confirm_register');
    Route::get('inquiries/confirm', "InquiryController@showConfirm" )->name('user.inquiries.confirm');
    Route::post('inquiries/confirm', "InquiryController@confirm" );

    Route::get('inquiries/edit', "InquiryController@showEditForm" )->name('user.inquiries.edit');
    Route::post('inquiries/edit', "InquiryController@edit" );
    Route::get('inquiries/{inquiry}/thanks', 'InquiryController@thanks')->name('user.inquiries.thanks');

    //商材資料ダウンロード
    Route::get('inquiry_documents/{inquiryDocument}/download', 'InquiryDocumentController@download')->name('user.inquiryDocuments.download');

    //認証関連
    Route::namespace('Auth')->group(function () {
        Route::post('login', 'LoginController@login')->name('user.login');
        Route::get('logout', 'LoginController@showLogout')->name('user.logout');
        Route::post('logout', 'LoginController@logout');

        Route::get('intro', 'RegisterController@showIntro')->name('user.intro');
        Route::get('register', 'RegisterController@showRegister')->name('user.register');
        Route::post('register', 'RegisterController@register');
        Route::get('register/thanks', 'RegisterController@showThanks')->name('user.register.thanks');
        Route::get('register/mailRegister/{token}', 'RegisterController@mailRegister')->name('user.register.mailRegister');


        Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('user.password.request');
        Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('user.password.email');

        Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('user.password.reset');
        Route::post('password/reset', 'ResetPasswordController@reset')->name('user.password.dosend');

        Route::get('password/complete', 'ResetPasswordController@showComplete')->name('user.reset.complete');

        Route::get('login/{provider}','SocialAccountController@redirectToProvider')->name("user.login.social");
        Route::get('login/{provider}/callback', 'SocialAccountController@handleProviderCallback');


        Route::get('social/{provider}/connect', 'SocialAccountController@connect')->name("user.login.social.connect");
        Route::get('social/{provider}/delete', 'SocialAccountController@delete')->name("user.login.social.delete");
    });
});

//ライター
Route::prefix('/writer')->namespace('Writer')->group(function () {
    //マイページ関連
    Route::get('', 'IndexController@mypage')->name('writer.mypage');
    Route::get('edit', 'IndexController@showEditForm')->name('writer.edit');
    Route::post('edit', 'IndexController@edit');

    //記事関連
    Route::get('articles', 'ArticleController@index')->name('writer.articles');
    Route::get('articles/editings', 'ArticleController@editings')->name('writer.articles.editings');
    Route::get('articles/waitings', 'ArticleController@waitings')->name('writer.articles.waitings');

    Route::get('articles/add', 'ArticleController@showAddForm')->name('writer.articles.add');
    Route::post('articles/add', 'ArticleController@add');
    Route::get('articles/{article}', 'ArticleController@view')->name('writer.articles.view');
    Route::get('articles/{article}/preview', 'ArticleController@preview')->name('writer.articles.preview');
    Route::get('articles/{article}/edit', 'ArticleController@showEditForm')->name('writer.articles.edit');
    Route::post('articles/{article}/edit', 'ArticleController@edit');
    Route::post('articles/{article}/changeStatus', 'ArticleController@changeStatus')->name('writer.articles.changeStatus');
    Route::post('articles/{article}/delete', 'ArticleController@delete')->name('writer.articles.delete');

    //認証関連
    Route::namespace('Auth')->group(function () {
        Route::get('login', 'LoginController@showLoginForm')->name('writer.login');
        Route::post('login', 'LoginController@login');
        Route::get('logout', 'LoginController@logout')->name('writer.logout');
    });
});


//管理者
Route::prefix('/administrator')->namespace('Administrator')->group(function () {
    //マイページ関連
    Route::get('', 'IndexController@mypage')->name('administrator.mypage');
    Route::get('edit', 'IndexController@showEditForm')->name('administrator.edit');
    Route::post('edit', 'IndexController@edit');

    //ライター関連
    Route::get('writers', 'WriterController@index')->name('administrator.writers');
    Route::post('writers/add', 'WriterController@add')->name('administrator.writers.add');
    Route::post('writers/{writer}/edit', 'WriterController@edit')->name('administrator.writers.edit');
    Route::post('writers/{writer}/resetPassword', 'WriterController@resetPassword')->name('administrator.writers.resetPassword');
    Route::post('writers/{writer}/delete', 'WriterController@delete')->name('administrator.writers.delete');

    //お知らせ関連
    Route::get('notices', 'NoticeController@index')->name('administrator.notices');
    Route::post('notices/add', 'NoticeController@add')->name('administrator.notices.add');
    Route::post('notices/{notice}/edit', 'NoticeController@edit')->name('administrator.notices.edit');
    Route::post('notices/{notice}/delete', 'NoticeController@delete')->name('administrator.notices.delete');

    //カテゴリごとのピックアップ
    Route::get('picks', 'PickController@index')->name('administrator.picks');
    Route::get('picks/all', 'PickController@all')->name('administrator.picks.all');
    Route::post('picks/all/add', 'PickController@allAdd')->name('administrator.picks.allAdd');
    Route::post('picks/all/save', 'PickController@allSave')->name('administrator.picks.allSave');

    Route::get('picks/{category}', 'PickController@view')->name('administrator.picks.view');
    Route::post('picks/{category}/add', 'PickController@add')->name('administrator.picks.add');
    Route::post('picks/{category}/save', 'PickController@save')->name('administrator.picks.save');

    //記事関連
    Route::get('articles', 'ArticleController@index')->name('administrator.articles');
    
    Route::get('articles/editings', 'ArticleController@editings')->name('administrator.articles.editings');
    Route::get('articles/approval', 'ArticleController@approval')->name('administrator.articles.approval');
    Route::get('articles/waitings', 'ArticleController@waitings')->name('administrator.articles.waitings');
    Route::get('articles/opens', 'ArticleController@opens')->name('administrator.articles.opens');
    Route::get('articles/closes', 'ArticleController@closes')->name('administrator.articles.closes');


    Route::get('articles/add', 'ArticleController@showAddForm')->name('administrator.articles.add');
    Route::post('articles/add', 'ArticleController@add');

    Route::get('articles/{article}', 'ArticleController@view')->name('administrator.articles.view');
    Route::get('articles/{article}/preview', 'ArticleController@preview')->name('administrator.articles.preview');

    Route::get('articles/{article}/edit', 'ArticleController@showEditForm')->name('administrator.articles.edit');
    Route::post('articles/{article}/edit', 'ArticleController@edit');

    Route::post('articles/{article}/changeStatus', 'ArticleController@changeStatus')->name('administrator.articles.changeStatus');
    
    Route::post('articles/{article}/delete', 'ArticleController@delete')->name('administrator.articles.delete');

    //商材と記事の連携
    Route::get('articles/{article}/products', 'ArticleController@showProductForm')->name('administrator.articles.products');
    Route::post('articles/{article}/products', 'ArticleController@products');

    //商材関連
    Route::get('products', 'ProductController@index')->name('administrator.products');
    Route::get('products/add', 'ProductController@showAddForm')->name('administrator.products.add');
    Route::post('products/add', 'ProductController@add');
    Route::get('products/{product}', 'ProductController@view')->name('administrator.products.view');
    Route::get('products/{product}/edit', 'ProductController@showEditForm')->name('administrator.products.edit');
    Route::post('products/{product}/edit', 'ProductController@edit');
    Route::post('products/{product}/delete', 'ProductController@delete')->name('administrator.products.delete');

    //商材資料
    Route::get('inquiry_documents/{inquiryDocument}/download', 'InquiryDocumentController@download')->name('administrator.inquiryDocuments.download');

    //広告主関連
    Route::get('advertisers', 'AdvertiserController@index')->name('administrator.advertisers');
    Route::post('advertisers/add', 'AdvertiserController@add')->name('administrator.advertisers.add');
    Route::post('advertisers/{advertiser}/edit', 'AdvertiserController@edit')->name('administrator.advertisers.edit');
    Route::post('advertisers/{advertiser}/delete', 'AdvertiserController@delete')->name('administrator.advertisers.delete');

    //管理者関連
    Route::get('administrators', 'AdministratorController@index')->name('administrator.administrators');
    Route::post('administrators/add', 'AdministratorController@add')->name('administrator.administrators.add');
    Route::post('administrators/{administrator}/delete', 'AdministratorController@delete')->name('administrator.administrators.delete');


    //認証関連
    Route::namespace('Auth')->group(function () {
        Route::get('login', 'LoginController@showLoginForm')->name('administrator.login');
        Route::post('login', 'LoginController@login');
        Route::get('logout', 'LoginController@logout')->name('administrator.logout');
    });
});


