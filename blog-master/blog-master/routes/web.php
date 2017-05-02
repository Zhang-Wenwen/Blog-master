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

Route::post('/article/update', 'BlogController@update');

Route::get('/article/update/', function( ){
   return view('Blog.update');
});
Route::post('/article/delete/{id}', 'BlogController@delete');

Route::group(['middleware'=>['web']],function(){
//    Route::get('/comment/add/{blog_id}', function($user_id){
//        return view('Blog.show',['blog_id'=>$user_id]);
//    });
    Route::get('/article/delete/{id}/{user_id}', 'BlogController@delete');

    Route::post('/comment/add/{id}', 'BlogController@comment_add');

    Route::get('/comment_delete/{user_id}/{id}/{comment_id}','BlogController@comment_delete');

    Route::post('/add', 'BlogController@add');

    Route::get('/add', function(){
        return view('Blog.add');
    });

    Route::get('/update/{article_id}/{user_id}', function($article_id,$user_id){
        return view('Blog.update',['article_id'=>$article_id,'user_id'=>$user_id]);
    });

    Route::post('/update/{article_id}/{user_id}', 'BlogController@update');
});

Route::get('/show', 'BlogController@show');
Auth::routes( );

Route::get('/check/{article_id}','BlogController@check');

Auth::routes( );


Route::get('/home',function(){
    return view('home');
});

Route::get('/try_me',function(){
    return view('Blog.try_me');
});

Route::get('/try_me','BlogController@try_me');

//Route::get('/logout',function(){
//    return view('Blog.logout');
//});

Route::get('/check_me','BlogController@check_me');

Route::get('/admin','BlogController@admin');

Route::get('/user_delete/{id}','BlogController@user_delete');

Route::get('/master','BlogController@master');

Route::post('/master_reset','BlogController@master_reset');

Route::get('/admin/article','BlogController@admin_article');

Route::get('/logout',function(){
    return view('Blog.logout');
});

Route::get('/admin/article/{id}','BlogController@admin_delete');

Auth::routes();

Route::get('/home', 'HomeController@index');