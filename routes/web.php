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
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'back','namespace' => 'Back'],function ($router)
{
    $router->get('login', 'UserController@showLoginForm');
    $router->post('login', 'UserController@login');
    $router->post('logout', 'UserController@logout');
    $router->get('/', 'BackController@index');
    //public 图片获取
    $router->get('/photo/public/{src}', 'PublicController@getPublicPhoto');
    //日志
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->Middleware('auth.back:back');
    //文档
    $router->get('/article', 'ArticleController@index');
    $router->post('/article/data', 'ArticleController@indexData');
    $router->get('/article/create', 'ArticleController@create');
    $router->post('/article/store', 'ArticleController@store');
    $router->get('/article/edit/{id}', 'ArticleController@edit');
    $router->post('/article/update/{id}', 'ArticleController@update');
    $router->get('/article/destroy/{id}', 'ArticleController@destroy');
    //分类
    $router->get('/category', 'CategoryController@index');
    $router->get('/category/create', 'CategoryController@create');
    $router->post('/category/store', 'CategoryController@store');
    $router->get('/category/create-child/{id}', 'CategoryController@createChild');
    $router->post('/category/store-child/{id}', 'CategoryController@storeChild');
    $router->get('/category/edit/{id}', 'CategoryController@edit');
    $router->post('/category/update/{id}', 'CategoryController@update');
    $router->get('/category/destroy/{id}', 'CategoryController@destroy');
    //模块
    $router->get('/module', 'ModuleController@index');
    $router->post('/module/data', 'ModuleController@indexData');
    $router->get('/module/create', 'ModuleController@create');
    $router->post('/module/store', 'ModuleController@store');
    $router->get('/module/edit/{id}', 'ModuleController@edit');
    $router->post('/module/update/{id}', 'ModuleController@update');
    $router->get('/module/destroy/{id}', 'ModuleController@destroy');
    //友情链接
    $router->get('/friend', 'FriendController@index');
    $router->post('/friend/data', 'FriendController@indexData');
    $router->get('/friend/create', 'FriendController@create');
    $router->post('/friend/store', 'FriendController@store');
    $router->get('/friend/edit/{id}', 'FriendController@edit');
    $router->post('/friend/update/{id}', 'FriendController@update');
    $router->get('/friend/destroy/{id}', 'FriendController@destroy');
    //TAG all
    $router->get('/tag', 'TagController@index');
    $router->post('/tag/data', 'TagController@indexData');
    $router->get('/tag/create', 'TagController@create');
    $router->post('/tag/store', 'TagController@store');
    $router->get('/tag/edit/{id}', 'TagController@edit');
    $router->post('/tag/update/{id}', 'TagController@update');
    $router->get('/tag/destroy/{id}', 'TagController@destroy');
   //图集
    $router->get('/picture', 'PictureController@index');
    $router->post('/picture/data', 'PictureController@indexData');
    $router->get('/picture/create', 'PictureController@create');
    $router->post('/picture/store', 'PictureController@store');
    $router->get('/picture/edit/{id}', 'PictureController@edit');
    $router->post('/picture/update/{id}', 'PictureController@update');
    $router->get('/picture/destroy/{id}', 'PictureController@destroy');
    //图集内图片
    $router->get('/picture-source', 'PictureSourceController@index');
    $router->post('/picture-source/data', 'PictureSourceController@indexData');
    $router->get('/picture-source/create/{id}', 'PictureSourceController@create');
    $router->post('/picture-source/store/{id}', 'PictureSourceController@store');
    $router->get('/picture-source/edit/{id}', 'PictureSourceController@edit');
    $router->post('/picture-source/update/{id}', 'PictureSourceController@update');
    $router->get('/picture-source/destroy/{id}', 'PictureSourceController@destroy');
    //视频集
    $router->get('/vidio', 'VidioController@index');
    $router->post('/vidio/data', 'VidioController@indexData');
    $router->get('/vidio/create', 'VidioController@create');
    $router->post('/vidio/store', 'VidioController@store');
    $router->get('/vidio/edit/{id}', 'VidioController@edit');
    $router->post('/vidio/update/{id}', 'VidioController@update');
    $router->get('/vidio/destroy/{id}', 'VidioController@destroy');
    //视频集内视频
    $router->get('/vidio-source', 'VidioSourceController@index');
    $router->post('/vidio-source/data', 'VidioSourceController@indexData');
    $router->get('/vidio-source/create/{id}', 'VidioSourceController@create');
    $router->post('/vidio-source/store/{id}', 'VidioSourceController@store');
    $router->get('/vidio-source/edit/{id}', 'VidioSourceController@edit');
    $router->post('/vidio-source/update/{id}', 'VidioSourceController@update');
    $router->get('/vidio-source/destroy/{id}', 'VidioSourceController@destroy');
    //资料管理
    $router->get('/download', 'DownloadController@index');
    $router->post('/download/data', 'DownloadController@indexData');
    $router->get('/download/create', 'DownloadController@create');
    $router->post('/download/store', 'DownloadController@store');
    $router->get('/download/edit/{id}', 'DownloadController@edit');
    $router->post('/download/update/{id}', 'DownloadController@update');
    $router->get('/download/destroy/{id}', 'DownloadController@destroy');
});

Route::group(['namespace' => 'Web'],function ($router)
{
    $router->get('menu','WebController@makeMenu');
    $router->get('cate/{id}','WebController@makeList');
    $router->get('content/{cate_id}/{id}','WebController@makeContent');
    $router->get('tags','WebController@makeTags');
    $router->post('search/{cate_id}','WebController@search');
});