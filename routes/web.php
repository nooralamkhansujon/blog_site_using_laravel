<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
//     return view('frontend.app');
// });

// Auth::routes();

Route::group([],function(){
   Route::get('/','Frontend\HomeController@index')->name('home');
   Route::get('/about','Frontend\HomeController@about')->name('about');
   Route::get('/blog','Frontend\HomeController@blog')->name('blog');
   Route::get('/contact','Frontend\HomeController@contact')->name('contact');
   Route::get('/portfolio','Frontend\HomeController@portfolio')->name('portfolio');
   Route::get('/project','Frontend\HomeController@project')->name('project');
   Route::get('/subscribe/{id}','SubscribeController@subscribe')->name('subscribe');


   //login and register route
   Route::get('/login','Auth\LoginController@showLoginForm')->name('login');
   Route::post('/login','Auth\LoginController@login')->name('login.submit');
   Route::post('/logout','Auth\LoginController@logout')->name('logout');
   Route::get('/register','Auth\RegisterController@ShowRegistionForm')->name('register');
   Route::post('/register','Auth\RegisterController@register')->name('register.submit');
});




Route::group(['prefix'=> 'admin'],function(){
   Route::get('/','Backend\AdminController@dashboard')->name('dashboard')->middleware('admin');
   Route::get('/login','Auth\AdminLoginController@adminShowLoginForm')->name('admin.login');
   Route::post('/login','Auth\AdminLoginController@adminLogin')->name('admin.login.submit');


   //blog routes
   Route::get('/blog/restore/{id}','BlogController@restore')->name('blog.restore')->middleware('admin');
   Route::delete('/blog/force_delete/{id}','BlogController@force_delete')->name('blog.force_delete')->middleware('admin');
   Route::get('/blog/trashed','BlogController@trashed')->name('blog.trashed')->middleware('admin');;
   Route::resource('/blogpost','BlogController')->middleware('admin');;


   //project routes
   Route::get('/adminproject/restore/{id}','ProjectController@restore')->name('adminproject.restore')->middleware('admin');
   Route::delete('/adminproject/force_delete/{id}','ProjectController@force_delete')->name('adminproject.force_delete')->middleware('admin');
   Route::get('/adminproject/trashed','ProjectController@trashed')->name('adminproject.trashed')->middleware('admin');
   Route::resource('adminproject', 'ProjectController')->middleware('admin');


   //message route manageing
   Route::get('/admincontact/restore/{id}','ProjectController@restore')->name('adminproject.restore')->middleware('admin');
   Route::delete('/admincontact/force_delete/{id}','ProjectController@force_delete')->name('adminproject.force_delete')->middleware('admin');
   Route::get('/admincontact/trashed','ProjectController@trashed')->name('adminproject.trashed')->middleware('admin');
   Route::resource('admincomment','CommentController')->middleware('admin');


});
