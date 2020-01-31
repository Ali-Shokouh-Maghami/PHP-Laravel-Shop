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
use \App\Services\Notification\Facade\Notification;


Route::get('/', function () {

    //return view('welcome');
    //return \Illuminate\Support\Facades\Mail::to('ali.shokouh.maghami@gmail.com')->send(new \App\Mail\UserRegistered());
    //return (new \App\Services\Notification\NotificationService()) ->sendEmail('ali.shokouh.maghami@gmail.com', new \App\Mail\UserRegistered());
    //return Notification::sendEmail('ali.shokouh.maghami@gmail.com', new \App\Mail\UserRegistered());

    return view('frontend.home');


});

//Anonymous Function
Route::group(['prefix' => 'auth' , 'namespace' => 'Auth'], function (){
    Route::get('/login', 'LoginController@showLoginForm')->name('auth.login.form');
    Route::post('/login', 'LoginController@Login')->name('auth.login');


    Route::get('/register', 'RegisterController@showRegisterForm')->name('auth.register.form');
    Route::post('/register', 'RegisterController@Register')->name('auth.register');


});
