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

   //login and register route
   Route::get('/login','Auth\LoginController@showLoginForm')->name('login');
   Route::post('/login','Auth\LoginController@login')->name('login.submit');
   Route::post('/logout','Auth\LoginController@logout')->name('logout');
   Route::get('/register','Auth\RegisterController@ShowRegistionForm')->name('register');
   Route::post('/register','Auth\RegisterController@register')->name('register.submit');
});



Route::group([],function(){
   Route::get('/admin','Backend\AdminController@dashboard')->name('dashboard');
});
