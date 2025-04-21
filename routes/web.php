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

Route::get('/', function () {
    return view('home');
});
Route::get('/collectables/{category}','FrontendController@loadCollectables');
Route::get('/showroom','FrontendController@loadShowRoom');
Route::get('/articles','FrontendController@loadArticles');
Route::get('/articles/{slug}','FrontendController@loadArticleDetail');
Route::get('/for-sale','FrontendController@loadForSale');
Route::get('/press-release','FrontendController@loadPressRelease');
Route::get('/product-detail/{id}','FrontendController@loadProductDetail');
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
