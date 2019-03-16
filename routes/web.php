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
//site view ===================================================
Route::get('/','ViewController@home');


 
 //admin ======================================================
 
Route ::get('/admin','AdminController@index');
Route ::post('/admin_login','AdminController@admin_login');


//super admin====================================================
//catagory
Route ::get('/admin-logout','SuperAdminController@logout');
Route ::get('/dashboard','SuperAdminController@index');
Route ::get('add-catagori','SuperAdminController@AddCatagori');
Route ::post('save-catagory','SuperAdminController@saveCatagori');
Route ::get('manage-catagory','SuperAdminController@manageCatagory');
Route ::get('unpublish-catagory/{id}','SuperAdminController@unpublishCatagory');
Route ::get('publish-catagory/{id}','SuperAdminController@publishCatagory');
Route ::get('delete-catagory/{id}','SuperAdminController@deleteCatagory');
Route ::get('edit-catagory/{id}','SuperAdminController@editCatagory');

//blog
Route ::get('add-blog','SuperAdminController@addBlog');
Route ::post('save-blog','SuperAdminController@saveBlog');
Route ::get('manage-blog','SuperAdminController@manageBlog');
Route ::get('ubpublis-blog/{id}','SuperAdminController@unpublishBlog');
Route ::get('publish-blog/{id}','SuperAdminController@publishBlog');
Route ::get('edit-blog/{id}','SuperAdminController@editBlog');
Route ::get('delete-blog/{id}','SuperAdminController@deleteBlog');
Route ::get('details-blog/{id}','SuperAdminController@detailsBlog');

Route ::get('catagory-blog/{id}','SuperAdminController@catagoryBlog');


Route ::get('manage-comments','CommentsController@index');
Route ::post('save-comment','CommentsController@store');
Route ::get('manage_blog','CommentsController@manageblog');
Route ::get('unpublish-comments/{id}','CommentsController@unpublishcomment');
Route ::get('publish-comments/{id}','CommentsController@publishcomment');
Route ::get('delete-comments/{id}','CommentsController@deletecomment');
Route ::get('edit-comments/{id}','CommentsController@editcomment');

Route ::post('search-blog','ViewController@searchBlog');








//default auth==================================================
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');


