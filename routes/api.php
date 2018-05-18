<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::namespace('Api\Rest')->prefix('/rest')->group( function() {

    //utility
    Route::get('utils/post_code', 'UtilController@postCode')->name("api.utils.post_codes");

    //ユーザ向け
    Route::get('categories/{category}/tops', 'CategoryController@tops')->name("api.categories.tops");

    Route::get('notices/latest', 'NoticeController@latest')->name("api.notices.latest");

    Route::get('articles', 'ArticleController@index')->name("api.articles");

    Route::get('articles/tops', 'ArticleController@tops')->name("api.articles.tops");

    Route::get('articles/recommend', 'ArticleController@recommend')->name("api.articles.recommend");

    Route::get('articles/search', 'ArticleController@search')->name("api.articles.search");

    Route::get('articles/{article}/related', 'ArticleController@related')->name("api.articles.related");


    Route::get('products/search', 'ProductController@search')->name("api.products.search");

    //タグ取得
    Route::get('tags', 'TagController@index')->name("api.tags");
    Route::get('tags/search', 'TagController@search')->name("api.tags.search");

    //管理者用
    Route::prefix('/administrator')->namespace('Administrator')->group(function () {
        //記事用画像
        Route::get('article_images', 'ArticleImageController@index')->name('api.administrator.article_images');
        Route::post('article_images/add', 'ArticleImageController@add')->name('api.administrator.article_images.add');
        
        Route::post('article_images/{article_image}/delete', 'ArticleImageController@delete')->name('api.administrator.article_images.delete');

        //商材PDF
        Route::post('inquiry_documents/add', 'InquiryDocumentController@add')->name('api.administrator.inquiry_documents.add');

        //記事内画像
        Route::post('content_images/add', 'ContentImageController@add')->name('api.administrator.content_images.add');
        Route::post('content_images/delete', 'ContentImageController@delete')->name('api.administrator.content_images.delete');

        //記事内動画
        Route::get('content_movies/get', 'ContentMovieController@getUploadUrl')->name('api.administrator.content_movies.get');
        Route::post('content_movies/add', 'ContentMovieController@add')->name('api.administrator.content_movies.add');
        Route::post('content_movies/delete', 'ContentMovieController@delete')->name('api.administrator.content_movies.delete');        
    });

    //ライターむけ
    Route::prefix('/writer')->namespace('Writer')->group(function () {
        Route::get('article_images', 'ArticleImageController@index')->name('api.writer.article_images');
        Route::post('article_images/add', 'ArticleImageController@add')->name('api.writer.article_images.add');

        //記事内画像
        Route::post('content_images/add', 'ContentImageController@add')->name('api.writer.content_images.add');
        Route::post('content_images/delete', 'ContentImageController@delete')->name('api.writer.content_images.delete');

        //記事内動画
        Route::get('content_movies/get', 'ContentMovieController@getUploadUrl')->name('api.writer.content_movies.get');
        Route::post('content_movies/add', 'ContentMovieController@add')->name('api.writer.content_movies.add');
        Route::post('content_movies/delete', 'ContentMovieController@delete')->name('api.writer.content_movies.delete');
    });

    //ユーザーむけ
    Route::prefix('/user')->namespace('User')->group(function () {
        Route::post('edit', 'IndexController@edit')->name('api.user.edit');

        Route::get('clips', 'ClipController@index')->name('api.user.clips');
        Route::post('clips/add', 'ClipController@add')->name('api.user.clips.add');
        Route::post('clips/{clip}/delete', 'ClipController@delete')->name('api.user.clips.delete');

        Route::get('stocks', 'StockController@index')->name('api.user.stocks');
        Route::post('stocks/add', 'StockController@add')->name('api.user.stocks.add');
        Route::post('stocks/{stock}/edit', 'StockController@edit')->name('api.user.stocks.edit');
        Route::post('stocks/{stock}/delete', 'StockController@delete')->name('api.user.stocks.delete');
    });

});
