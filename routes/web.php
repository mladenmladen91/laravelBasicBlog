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

Route::get('/', ['as'=>'start','uses'=>'AdminPostsController@posts']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/post/{id}',['as'=>'home.post', 'uses'=>'AdminPostsController@post']);

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/posts',function(){
    return view('posts');
});

Route::get('/category/{id}',['as'=>'categories.posts', 'uses'=> 'AdminCategoriesController@showPosts']);

Route::group(['middleware'=>'isAdmin'],function(){
     Route::get('/admin',['as'=>'admin',function(){
         return view('admin.index');
}]);
     Route::resource('admin/users', 'AdminUsersController');
     Route::resource('admin/posts', 'AdminPostsController');
     Route::resource('admin/categories', 'AdminCategoriesController');
     Route::resource('admin/comments', 'AdminCommentsController');
     Route::resource('admin/comments/replies','CommentRepliesController');
     Route::delete('admin/deletes',['as'=>'posts.delete', 'uses'=> 'AdminPostsController@postsDelete']);
});



  

