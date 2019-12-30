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

// Route::get('/', function () {
//     return view('pages.index');
// });

//******Normal Route */
// Route::get('home',function(){
//     echo "This is home";
// });

Route::get('/', 'HelloController@index');



Route::get('/contact-us','HelloController@contact')->name('contact');
Route::get('/about-us','HelloController@about');


//Category crud in here
Route::get('/add-category','PostController@addcategory')->name('add-category');
Route::post('/store-category','PostController@storecategory')->name('store-category');
Route::get('/all/category','PostController@allcategory')->name('all-category');
Route::get('/single-category/{id}','PostController@viewcategory');
Route::get('/delete-category/{id}','PostController@deletecategory');
Route::get('/edit-category/{id}','PostController@editcategory');
Route::post('/update-category/{id}','PostController@updatecategory');
Route::post('/multi-delete','PostController@multidelete')->name('multidelete');

// blog write post
Route::get('/write-post','BlogpostController@writepost')->name('write-post');
Route::post('/store/post','BlogpostController@storepost')->name('store-post');
Route::get('/all/post','BlogpostController@allpost')->name('all-post');
Route::get('/single-post/{id}', 'BlogpostController@singlepost');
Route::get('/edit-post/{id}', 'BlogpostController@editpost');
Route::post('/update-post/{id}','BlogpostController@updatepost');
Route::get('/delete-post/{id}','BlogpostController@deletepost');







// Route::get('/service-part','HelloController@Khan')->name('service');
// Route::get('/contact', 'TestoController@tiham');
// Route::get('/contact',function(){
//     return view('pages.contact');
// });   //->middleware('age');

//***Group Route */

// Route::prefix('Ebox')->group(function () {
//     Route::get('/about', function () {
//         return view('about');
//     });

//     Route::get('/contact',function(){
//         return view('pages.contact'); //je page ta dekhabe
//     });
// });
