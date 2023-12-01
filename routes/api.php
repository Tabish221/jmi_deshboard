<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


    Route::group(['middleware' => ['web']], function () {
        Route::post('/user/login','api\CpanelController@checklogin');
        Route::get('/index','api\indexcontroller@index');
        Route::post('/user/signup','api\cpanelcontroller@post_signup');
        Route::get('/shownews/', 'api\indexcontroller@show_reuters_news');
        Route::get('/user/logout','api\cpanelcontroller@logout');

        Route::post('/forgot-password','api\cpanelcontroller@forgotpassword');
        Route::post('/reset-password/','api\cpanelcontroller@storeresetpassword');
        Route::get('/reset-password/{token1}/{token2}/{token3}/{token5}/{token6}/{token7}/{token8}','api\cpanelcontroller@resetpassword');


        Route::get('/sendverificationmailCode/{email}','api\cpanelcontroller@sendverificationmailCode');
        Route::get('/verificationmailCode/{email}/{code}','api\cpanelcontroller@verificationmailCode');


        //Pages
        Route::post('/callbackrequest','api\callbackrequestcontroller@callbackrequest');
        Route::post('/become-partner','api\becomepartnercontroller@becomepartner');
        Route::post('/career','api\careercontroller@upload_cv');
        Route::post('/coinbase','api\coinbasecontroller@coinbase');
        Route::get('/dailyfundamental','api\dailyfundamentalcontroller@index');
        Route::get('/dailytechnical','api\dailytechnicalcontroller@index');
        Route::get('/heatmap','api\economiccalendarcontroller@heatmap');
        Route::get('/pip-calculator','api\economiccalendarcontroller@pip_calculator');

        Route::get('/dailytechnical/technical/{technicalid}','api\dailytechnicalcontroller@viewtechnical');
        Route::get('/dailytechnical/more/{type}','api\dailytechnicalcontroller@viewmoretechnical');
        Route::get('/dailyfundamental/fundamental/{fundamentalid}','api\dailyfundamentalcontroller@viewfundamental');
    });


    Route::group(['middleware' => ['user']], function () {
        Route::get('/user/get','api\CpanelController@get_user');
        Route::get('/cpanel/get_notifications','api\cpanelcontroller@get_notifications');
        Route::get('/cpanel/read_notifications','api\cpanelcontroller@read_notifications');
        Route::get('/cpanel/home','api\cpanelcontroller@home');
        Route::get('/cpanel/home','api\cpanelcontroller@home');

    });




Route::group(['middleware' => ['Editor']], function () {




});


Route::group(['middleware' => ['superadmin']], function () {




});
