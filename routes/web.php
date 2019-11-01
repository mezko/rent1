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

Route::get('/index/{lang?}', 'PageOfUsers@welcome');
Route::get('/Properties/{lang?}','PageOfUsers@show_flat');
Route::post('/Properties/{lang?}','PageOfUsers@SearchFlat');
/////////////////////////vip
Route::get('/PropertiesVip/{lang?}','PageOfUsers@show_flat_vip');
//////////////////////////////////////////////////////////////////////////////search bar
// Route::post('/Searchfor','FlatController@all_search_table');
Auth::routes();
///////////////////////// Admin panel links////////////////////////////////////////////
Route::get('/home/{lang?}', 'HomeController@index')->name('home');
Route::post('/home/{lang?}','FlatController@add_flat');
//////////////////////////flat table
Route::get('/Allflats/{lang?}', 'FlatController@all_flats_table');
////////////////////////delete flat
Route::get('/deleteflat/{id}', 'FlatController@delete_flat');
////////////////////////update Flate
Route::get('/Edit/{id}/{lang?}', 'FlatController@Edit_flat_page');
Route::post('/Edit/{id}/{lang?}','FlatController@Edit_flat');

////////////////////////////////////////////////////////////////////////////////////
///////////////upload Sliders/////////////////////////////////////////////////////
Route::get('/UploadSlider/{id}', 'FlatController@Upload_Slider');
Route::post('/UploadSlider/{id}', 'FlatController@Upload_fun_Slider');
/////////////////////////delete slider
Route::get('/delet/slider/{id}','FlatController@deletslider');
Route::get('/delet/slide/{id}','FlatController@deletslide');
////////////////////////////////////////////test route
Route::get('/flatnum/{id}/{lang?}','PageOfUsers@show_ur_flat');
/////////////////////////////Add City
Route::get('/city','FlatController@show_city');
Route::post('/city','FlatController@AddCity');
///////////////////////////////////////////////////////////////all_cities
Route::get('/all_cities','FlatController@all_cities');
/////////////////update cities
Route::get('/Upload/city/{id}','FlatController@show_update_city');
Route::post('/Upload/city/{id}','FlatController@update_city');
////////////////////////////deletcity
Route::get('/delet/city/{id}','FlatController@deletcity');
///////////////////////////////////////////////////////Blog//////////////////////
////////////addblog
Route::get('/Add/blog/{lang?}','FlatController@addBlog');
Route::post('/Add/blog/{lang?}','FlatController@addBlogfun');
///////////////////////////////all blog
Route::get('/All/blog/{lang?}','FlatController@Blogs');
/////////////////////////////////////delet/blog
Route::get('/delet/blog/{id}','FlatController@delet_Blog');
//////////////////////////////////////////edit_blog
Route::get('/edit/blog/{id}','FlatController@edit_blog');
Route::post('/edit/blog/{id}','FlatController@edit_blog_fun');
///////////////////////////////////////////////////////////////////
/////////////////////////blog page
Route::get('/Blog/{id}/{lang?}','PageOfUsers@show_blog');
/////////////////////////////////////////////////////////
// Route::get('/test/{lang?}', function () {
//     return view('textarea');
// });
