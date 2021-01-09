<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'FrontController@index')->name('front.home');
Route::get('/about', 'FrontController@about')->name('front.about');
Route::get('/faqs/{slug}', 'FrontController@faq')->name('front.faq');
Route::get('/insight', 'FrontController@insight')->name('front.insight');
Route::get('/service/{slug}', 'FrontController@service')->name('front.service');
Route::get('/locations', 'FrontController@locationlist')->name('front.locationlist');
Route::get('/location/{slug}', 'FrontController@location')->name('front.location');
Route::get('/testimonials', 'FrontController@testimonials')->name('front.testimonials');
Route::get('/contact', 'FrontController@contact')->name('front.contact');
Route::post('/submitContact', 'FrontController@submit_contact_form')->name('front.submit.contact');


// post related routes starts from here
// Route::get('/tag/{id:name}/posts/' , 'FrontController@getpostbytag' )->name('getpostbytag');
// Route::get('/category/{id:name}/posts/' , 'FrontController@getpostbycategory' )->name('getpostbycategory');
// Route::get('/{id:slug}' ,'FrontController@getsinglepost')->name('getsinglepost');
// Route::get('/search/all/posts/' , 'FrontController@searchallpost')->name('front.all.search'); 

// post related routes ends from here

Auth::routes();

Route::prefix('admin')->group(function () {
   Auth::routes(['register' => false ]);
});


Route::group([ 'prefix' => 'admin' , 'middleware' => ['auth'] ], function () {

   Route::get('/dashboard', 'HomeController@index')->name('back.home');


   Route::resource('/setting', 'SettingController' ,['only' => ['index', 'edit', 'update']]);

   Route::resource('/page', 'PageController' ,['only' => ['index', 'edit', 'update']]);

   Route::resource('/about', 'AboutController');


   Route::resource('/testimonial', 'TestimonialController');


   // Route::resource('/user', 'UserController');

   // Route::get('/user/password/reset', 'UserController@passwordreset')->name('back.pwd.rst');

   // Route::put('/user/reset/{id}', 'UserController@passwordchange')->name('password.change');

   // Route::resource('/category', 'CategoryController');
   
   // Route::resource('user', 'UserController' , [ 'except' => [ 'edit' , 'update' , 'show'] ]);

   // Route::get('user/makedmin/{id}' , 'UserController@makeAdmin')->name('user.makeadmin')->middleware('admin');

   // Route::get('user/killdmin/{id}' , 'UserController@killAdmin')->name('user.killadmin')->middleware('admin');

   // Route::get('profile' , 'ProfileController@index')->name('profile');

   // Route::get('profile/edit/{id}' , 'ProfileController@edit')->name('profile.edit');

   // Route::put('profile/update/{id}' , 'ProfileController@updateuser')->name('profile.update');

   // Route::resource('/post', 'PostController');

   // Route::get('/posts/featured', 'PostController@getfeatured')->name('post.featured');

   // Route::get('/posts/getpublished', 'PostController@getpublished')->name('post.getpublished');

   // Route::get('/posts/getdraftPost', 'PostController@getdraftPost')->name('post.getdraftPost');

   // Route::get('/posts/{id}/byUser', 'PostController@byUser')->name('post.byUser');

   // Route::get('/posts/{id}/bytag', 'PostController@bytag')->name('post.bytag');

   // Route::get('/posts/bycategory/{id}', 'PostController@bycategory')->name('post.bycategory');

   // Route::get('post/setfeatured/{id}' , 'PostController@setfeatured')->name('post.setfeatured');

   // Route::get('post/setpublish/{id}' , 'PostController@setpublish')->name('post.setpublish');

   // Route::get('post/removepublish/{id}' , 'PostController@removepublish')->name('post.removepublish');

   // Route::get('post/removefeatured/{id}' , 'PostController@removefeatured')->name('post.removefeatured');
   
   // Route::resource('/tag', 'TagController');

   // Route::resource('/post/{post}/postdescription', 'PostDescriptionController');

   Route::resource('/service', 'ServiceController');

   Route::resource('/location', 'LocationController');

});

