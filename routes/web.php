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
Route::get('/', 'PageOfUsers@redirect');

Route::get('/index/{lang?}', 'PageOfUsers@welcome');
//nav_search
// Route::post('/index/{lang?}', 'PageOfUsers@nav_search');

///////////flat///////////////
Route::get('/Properties/{lang?}','PageOfUsers@show_flat');
Route::post('/Properties/{lang?}','PageOfUsers@SearchFlat');
/////////////////////////vip
Route::get('/PropertiesVip/{lang?}','PageOfUsers@show_flat_vip');
Route::post('/PropertiesVip/{lang?}','PageOfUsers@SearchFlatVIP');
///////////////////////////////////////////////////
///allblogs
Route::get('/ourblogs/{lang?}','PageOfUsers@blogPage');

/////////////////////////blog page
Route::get('/Blog/{id}/{lang?}','PageOfUsers@show_blog');
///////////////////////////////////////////////////////
Route::get('/flatnum/{id}/{lang?}','PageOfUsers@show_ur_flat');
/////////////////////Establish company page
Route::get('/Establish company/{lang?}','PageOfUsers@Establishing');
////////////////////AboutUS
Route::get('/About US/{lang?}','PageOfUsers@AboutUS');
////////////////////residences
Route::get('/residences/{lang?}','PageOfUsers@residence');
///////////////////
/////////////////////////////////////////////////////////////////////////////////////
/////////////////contact us/////////////////////////////////////
Route::get('/Contact US/{lang?}','PageOfUsers@ContactUsPage');
//ContactUs
Route::post('/Contact US/{lang?}','PageOfUsers@ContactUs');
///////////////////////////////////////////////////////////
////searchfor
Route::get('/searchflats/{lang?}','PageOfUsers@searchflats');
//SearchFlats_fun
Route::post('/searchflats/{lang?}','PageOfUsers@SearchFlats_fun');
////////////////////////////////////////////////////////////////////












//////////////////////////////////////////////////////////////////////////////search bar
// Route::post('/Searchfor','FlatController@all_search_table');
Auth::routes();


















///////////////////////// Admin panel links/////////////////////////////////////////////////////////////
Route::get('/home/{lang?}', 'HomeController@index')->name('home');
////////////////////////////////////middleware for premission
Route::group(['middleware' => 'offerswriter'], function () {
Route::get('/add/flat/{lang?}', 'FlatController@add_flat_page');
Route::post('/add/flat/{lang?}','FlatController@add_flat');
//////////////////////////flat table//////////////////////////////////////////////////////////////
Route::get('/Allflats/{lang?}', 'FlatController@all_flats_table');
////////////////////////delete flat//////////////////////////////////////////////////////////////
Route::get('/deleteflat/{id}', 'FlatController@delete_flat');
////////////////////////update Flate///////////////////////////////////////////////////////////
Route::get('/Edit/{id}/{lang?}', 'FlatController@Edit_flat_page');
Route::post('/Edit/{id}/{lang?}','FlatController@Edit_flat');
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////upload Sliders/////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/UploadSlider/{id}', 'FlatController@Upload_Slider');
Route::post('/UploadSlider/{id}', 'FlatController@Upload_fun_Slider');
/////////////////////////delete slider////////////////////////////////////////////////////////////////////////////////
Route::get('/delet/slider/{id}','FlatController@deletslider');
Route::get('/delet/slide/{id}','FlatController@deletslide');
/////////////////////////////////////////////////////////////////////////////////////

////**************************************************************************/////////// */
////////////////////////////////////////////distinics
////add
/////////////////////////////Add City ////////////////////////////////////////////////////////////////////////////////
Route::get('/dis','FlatController@show_dis');
Route::post('/dis','FlatController@Adddis');
//////////////
Route::get('/all_distinics','FlatController@all_distinics');
///Upload/dis
Route::get('/Upload/dis/{id}','FlatController@show_update_dis');
Route::post('/Upload/dis/{id}','FlatController@update_dis');
////////////////////////////deletcity////////////////////////////////////////////////////////////////////////////////
Route::get('/delet/dis/{id}','FlatController@deletedis');

/////////////////////////////Add City ////////////////////////////////////////////////////////////////////////////////
Route::get('/city','FlatController@show_city');
Route::post('/city','FlatController@AddCity');
///////////////////////////////////////////////////////////////all_cities//////////////////////////////////////////////
Route::get('/all_cities','FlatController@all_cities');
/////////////////update cities////////////////////////////////////////////////////////////////////////////////////////
Route::get('/Upload/city/{id}','FlatController@show_update_city');
Route::post('/Upload/city/{id}','FlatController@update_city');
////////////////////////////deletcity////////////////////////////////////////////////////////////////////////////////
Route::get('/delet/city/{id}','FlatController@deletcity');
});/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////Blog/////////////////////////////////////////////////////////
//////////////////////////premission////////////////////////////////////////////////////////////////////////////////
Route::group(['middleware' => 'blogpremission'], function () {
////////////addblog////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/Add/blog/{lang?}','FlatController@addBlog');
Route::post('/Add/blog/{lang?}','FlatController@addBlogfun');
///////////////////////////////all blog///////////////////////////////////////////////////////////////////////////
Route::get('/All/blog/{lang?}','FlatController@Blogs');///////////////////////////////////////////////////////////
/////////////////////////////////////delet/blog///////////////////////////////////////////////////////////////////
Route::get('/delet/blog/{id}','FlatController@delet_Blog');
//////////////////////////////////////////edit_blog/////////////////////////////////////////////////////////////
Route::get('/edit/blog/{id}','FlatController@edit_blog');
Route::post('/edit/blog/{id}','FlatController@edit_blog_fun');
});//////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////add user///////////////////////////////////////////////////////////
Route::group(['middleware' => 'useradmin'], function () {
Route::get('/Add/user','FlatController@AddUserPage');
Route::post('/Add/user','FlatController@Adduser');
//////////all users page///////////////
Route::get('/All/user','FlatController@AllUser');
//////delete user ////////////
Route::get('/Delete/user/{id}','FlatController@DeleteUser');
///////////edituser///////////////////
Route::get('/change/user/{id}','FlatController@EditUserPage');
Route::post('/change/user/{id}','FlatController@EditUser');
/////////// pasges page///////////////////////////////
Route::get('/pages','FlatController@pages');
//////////////edit in writing page
/////Establishing company
Route::get('/Establish/{ln}','FlatController@edit_page');
Route::post('/Establish/{ln}','FlatController@establish_company');
//Residence_&_nationality
Route::get('/Residence_&_nationality/{ln}','FlatController@edit_page');
//Residence
Route::post('/Residence_&_nationality/{ln}','FlatController@Residence');
//about
Route::get('/About/{ln}','FlatController@edit_page');
Route::post('/About/{ln}','FlatController@About');




/////////////////////////////////////////////////////////
///home slider
//homeslider page
Route::get('/homeslider','FlatController@HomeSliderPage');

//AddHomeSliderPage
Route::get('/AddHomeSliderPage','FlatController@AddHomeSliderPage');
Route::post('/AddHomeSliderPage','FlatController@HomeSlider');
///Edithomesliderpage
// Route::get('/EditHomeSliderPage/{id}','FlatController@EditHomeSliderPage');
// Route::post('/EditHomeSliderPage/{id}','FlatController@EdiHomeSlider');
//DeleteSlider
Route::get('/DeleteSlider/{id}','FlatController@DeleteSlider');
//ShowHomeFlat
Route::get('/ShowHomeFlat','FlatController@ShowHomeFlat');
//FunHomeFlat
Route::post('/ShowHomeFlat','FlatController@FunHomeFlat');
///////////////////////////////////////////////////////////////
///////messages//
Route::get('/messages','FlatController@MessagesPage');
//////replay message
Route::get('/replymessage/{id}','FlatController@ReplyMessagesPage');
//ReplyMessages
Route::post('/replymessage/{id}','FlatController@ReplyMessages');
/////RepliedPage
Route::get('/AllRepliedMessage','FlatController@RepliedPage');
/////////////ShowReplied
Route::get('/ShowReplied/{id}','FlatController@ShowReplied');











});
///////////////////logout
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

//////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////
// Route::get('/test/{lang?}', function () {
//     return view('textarea');

// });

