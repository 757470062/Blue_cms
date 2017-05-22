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

    //文档
    $router->get('/article', 'ArticleController@index');
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
    $router->get('/module/create', 'ModuleController@create');
    $router->post('/module/store', 'ModuleController@store');
    $router->get('/module/edit/{id}', 'ModuleController@edit');
    $router->post('/module/update/{id}', 'ModuleController@update');
    $router->get('/module/destroy/{id}', 'ModuleController@destroy');
});
