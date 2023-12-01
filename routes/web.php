<?php

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

Route::get('/', function () {
    return view('welcome');
});



// Start Stock & Commodities Routes

Route::get('/en/FX4Dmajor1', function () {return view('datatables.FX4Dmajor1');});
Route::get('/en/FX4Dmajor2', function () {return view('datatables.FX4Dmajor2');});
Route::get('/en/FX4DmajorCross', function () {return view('datatables.FX4DmajorCross');});
Route::get('/en/FX5Dmajor1', function () {return view('datatables.FX5Dmajor1');});
Route::get('/en/FX5Dmajor2', function () {return view('datatables.FX5Dmajor2');});
Route::get('/en/FX5DmajorCross', function () {return view('datatables.FX5DmajorCross');});
Route::get('/en/metals', function () {return view('datatables.metals');});
Route::get('/en/spot', function () {return view('datatables.spot');});
Route::get('/en/datatable1', function () {return view('datatables.datatable1');});
Route::get('/en/datatable2', function () {return view('datatables.datatable2');});
Route::get('/en/datatable3', function () {return view('datatables.datatable3');});
Route::get('/en/datatable4', function () {return view('datatables.datatable4');});
Route::get('/en/datatable5', function () {return view('datatables.datatable5');});
Route::get('/en/datatable6', function () {return view('datatables.datatable6');});
Route::get('/en/index', function () {return view('datatables.index');});
Route::get('/en/FXCrossRates', function () {return view('datatables.FXCrossRates');});

// End Stock & Commodities Routes

// Start Landing Routes

Route::post('/demo/','landinguserscontroller@demo');
Route::post('/en/landingpage1/','landinguserscontroller@storelandinguser');
Route::post('/en/landingpage2/','landinguserscontroller@storelandinguser2');
Route::post('/en/landingpage3/','landinguserscontroller@storelandinguser3');
Route::post('/en/register/demoaccount2','landinguserscontroller@storeuser');
Route::get('/livequotes/','landinguserscontroller@quotes');



Route::get('/en/pip-calculator2/', 'api\economiccalendarcontroller@pip_calculator2');
Route::get('/ar/pip-calculator2/', 'api\economiccalendarcontroller@pip_calculator2');


Route::get('/en/landing/thankyou', function () {
    $title="Thank You - You Will Be Redirect Now";
    return view('landingpages.thankyou',compact('title'));
});


Route::get('/en/landingpage1', function () {
    $location = GeoIP::getLocation();
    return view('landingpages.landingpage1',compact('location'));
});

Route::get('/en/landingpage2', function () {
    $location = GeoIP::getLocation();
    return view('landingpages.landingpage2',compact('location'));
});

Route::get('/en/landingpage3', function () {
    $location = GeoIP::getLocation();

    return view('landingpages.landingpage3',compact('location'));

});

Route::get('/en/landingpage4', function () {
    $location = GeoIP::getLocation();

    return view('landingpages.landingpage4',compact('location'));
});

Route::get('/en/landingpage5', function () {
    $location = GeoIP::getLocation();

    return view('landingpages.landingpage5',compact('location'));

});

Route::get('/en/landingpage6', function () {
    $location = GeoIP::getLocation();

    return view('landingpages.landingpage6',compact('location'));
});

Route::get('/en/landingpage7', function () {
    $location = GeoIP::getLocation();

    return view('landingpages.landingpage7',compact('location'));

});

Route::get('/en/landingpage8', function () {

    $location = GeoIP::getLocation();


    return view('landingpages.landingpage8',compact('location'));
});


Route::get('/en/landingpage9', function () {
    $location = GeoIP::getLocation();

    return view('landingpages.landingpage9',compact('location'));

});

Route::get('/en/landingpage10', function () {

    $location = GeoIP::getLocation();


    return view('landingpages.landingpage10',compact('location'));
});
Route::get('/en/landingpage11', function () {
    $location = GeoIP::getLocation();
    return view('landingpages.landingpage11',compact('location'));
});
Route::get('/en/landingpage14', function () {
    $location = GeoIP::getLocation();
    return view('landingpages.landingpage14',compact('location'));
});
Route::get('/en/landingpage15', function () {
    $location = GeoIP::getLocation();
    return view('landingpages.landingpage15',compact('location'));
});
Route::get('/en/landingpage16', function () {
    $location = GeoIP::getLocation();
    return view('landingpages.landingpage16',compact('location'));
});
Route::get('/en/landingpage17', function () {
    $location = GeoIP::getLocation();
    return view('landingpages.landingpage17',compact('location'));
});
Route::get('/en/landingpage18', function () {
    $location = GeoIP::getLocation();
    return view('landingpages.landingpage18',compact('location'));
});
Route::get('/en/landingpage19', function () {
    $location = GeoIP::getLocation();
    return view('landingpages.landingpage19',compact('location'));
});
Route::get('/en/landingpage20', function () {
    $location = GeoIP::getLocation();
    return view('landingpages.landingpage20',compact('location'));
});



Route::get('/en/landingpage21', function () {
    $location = GeoIP::getLocation();
    return view('landingpages.landingpage21',compact('location'));
});

Route::get('/en/landingpage22', function () {
    $location = GeoIP::getLocation();
    return view('landingpages.landingpage22',compact('location'));
});



Route::get('/en/landingpage23', function () {
    $location = GeoIP::getLocation();
    return view('landingpages.landingpage23',compact('location'));
});
Route::get('/en/landingpage24', function () {
    $location = GeoIP::getLocation();
    return view('landingpages.landingpage24',compact('location'));
});
Route::get('/en/landingpage25', function () {
    $location = GeoIP::getLocation();
    return view('landingpages.landingpage25',compact('location'));
});

Route::get('/en/adrollads', function () {
    $location = GeoIP::getLocation();
    return view('landingpages.adrollads',compact('location'));
});
Route::get('/en/adrolladsjo', function () {
    $location = GeoIP::getLocation();
    return view('landingpages.adrolladsjo',compact('location'));
});
Route::get('/en/youtube1', function () {
    $location = GeoIP::getLocation();
    return view('landingpages.youtube1',compact('location'));
});
Route::get('/en/youtube2', function () {
    $location = GeoIP::getLocation();
    return view('landingpages.youtube2',compact('location'));
});
Route::get('/en/display1', function () {
    $location = GeoIP::getLocation();
    return view('landingpages.display1',compact('location'));
});
Route::get('/en/display2', function () {
    $location = GeoIP::getLocation();
    return view('landingpages.display2',compact('location'));
});

Route::get('/en/display3', function () {
    $location = GeoIP::getLocation();
    return view('landingpages.display3',compact('location'));
});
Route::get('/en/wikifx', function () {
    $location = GeoIP::getLocation();
    return view('landingpages.investing2',compact('location'));
});
Route::get('/en/twitter', function () {
    $location = GeoIP::getLocation();
    return view('landingpages.investing2',compact('location'));
});
Route::get('/en/linkedin', function () {
    $location = GeoIP::getLocation();
    return view('landingpages.investing2',compact('location'));
});
Route::get('/en/quora', function () {
    $location = GeoIP::getLocation();
    return view('landingpages.investing2',compact('location'));
});

Route::get('/en/investing2', function () {
    $location = GeoIP::getLocation();
    return view('landingpages.investing',compact('location'));
});
Route::get('/en/landingpage28', function () {
    $location = GeoIP::getLocation();
    return view('landingpages.landingpage28',compact('location'));
});

// End Landing Routes



Route::group(['middleware' => ['user']], function () {

    Route::get('/sendverificationmail','cpanelcontroller@sendverificationmail');
    Route::get('/sendverificationsms','cpanelcontroller@sendverificationsms');

    Route::get('/en/cpanel/home','cpanelcontroller@home');
    Route::get('/en/cpanel/home1','cpanelcontroller@homeOne');


    Route::get('/en/activate/{username}/{token}','cpanelcontroller@verificationmail');
    Route::get('/en/cpanel/profile','cpanelcontroller@profile');
    Route::post('/en/cpanel/profile','cpanelcontroller@post_profile');
    Route::post('/en/cpanel/password','cpanelcontroller@post_password');
    Route::get('/en/cpanel/password','cpanelcontroller@change_password');

    Route::get('/en/cpanel/documents','cpanelcontroller@upload_documents');
    Route::post('/en/cpanel/documents','cpanelcontroller@post_upload_documents');
    Route::delete('/en/cpanel/documents/{id}','cpanelcontroller@delete_documents');

    Route::get('/en/cpanel/open-account','cpanelcontroller@open_account');

    Route::get('/en/test','cpanelcontroller@test');

    Route::post('/en/cpanel/open-account','cpanelcontroller@post_open_account');
    Route::post('/en/cpanel/post-agreement','cpanelcontroller@post_agreement');
    Route::get('/en/cpanel/add-account','cpanelcontroller@add_account');
    Route::post('/en/cpanel/add-account','cpanelcontroller@post_add_account');

    Route::delete('/en/cpanel/demo-accounts/{id}','cpanelcontroller@delete_fx_accounts');
    Route::post('/en/cpanel/demo-accounts/{id}','cpanelcontroller@update_fx_accounts');
    Route::post('/en/cpanel/demo-accounts/edit/{id}','cpanelcontroller@edit_fx_accounts');

    Route::get('/en/cpanel/live-accounts','cpanelcontroller@live_accounts');

    Route::get('/en/cpanel/deposit-fund','cpanelcontroller@deposit_fund');

    Route::get('/en/cpanel/deposit-fund/request-details/{payment}','cpanelcontroller@request_payment_details');
    Route::post('/en/cpanel/deposit-fund/request-invoice','cpanelcontroller@request_invoice');

    Route::get('/en/cpanel/deposit-fund/{method}','cpanelcontroller@deposit_fund_method');
    Route::post('/en/cpanel/deposit-fund/{method}','cpanelcontroller@post_deposit_fund_method');
    
    Route::get('/en/cpanel/withdraw-fund','cpanelcontroller@withdraw_fund');
    Route::get('/en/cpanel/withdraw-fund/{method}','cpanelcontroller@withdraw_fund_method');
    Route::post('/en/cpanel/withdraw-fund/{method}','cpanelcontroller@post_withdraw_fund_method');

    Route::get('/en/cpanel/internal-transfers','cpanelcontroller@internal_transfers');
    Route::post('/en/cpanel/internal-transfers','cpanelcontroller@post_internal_transfers');

    Route::get('/en/cpanel/open-demo','cpanelcontroller@open_demo');
    Route::get('/en/cpanel/trading-platforms','cpanelcontroller@trading_platforms');
    Route::get('/en/cpanel/transaction-history','cpanelcontroller@transaction_history');
    Route::get('/en/cpanel/transaction-history/{type}','cpanelcontroller@transaction_history');

    Route::get('/en/cpanel/ib-overview','cpanelcontroller@ib_overview');
    Route::get('/en/cpanel/my-referrals','cpanelcontroller@my_referrals');

//new design
    Route::get('/en/cpanel/ebooks','cpanelcontroller@ebooks');
    Route::get('/en/cpanel/pip-calculator','cpanelcontroller@pip_calculator');

    Route::get('/en/cpanel/heatmap','cpanelcontroller@heatmap');
    Route::get('/en/cpanel/calendar','cpanelcontroller@calendar');

    Route::get('/en/cpanel/technical','cpanelcontroller@technical');
    Route::get('/en/cpanel/fundamental','cpanelcontroller@fundamental');

    Route::get('/en/cpanel/unionpay-cards','cpanelcontroller@unionpay_cards');
    Route::get('/en/cpanel/order-unionpay-card','cpanelcontroller@order_unionpay_card');


    Route::post('/en/cpanel/copy-trade','cpanelcontroller@post_copy_trade');
    Route::delete('/en/cpanel/copy-trade/{id}','cpanelcontroller@delete_copy_trade');
    Route::get('/en/cpanel/copy-trade','cpanelcontroller@copy_trade');


//ARABIC LINKS

    Route::get('/ar/activate/{username}/{token}','cpanelcontroller@verificationmail');
    Route::get('/ar/cpanel/home','cpanelcontroller@home');
    Route::get('/ar/cpanel/profile','cpanelcontroller@profile');
    Route::post('/ar/cpanel/profile','cpanelcontroller@post_profile');

    Route::post('/ar/cpanel/password','cpanelcontroller@post_password');
    Route::get('/ar/cpanel/password','cpanelcontroller@change_password');


    Route::get('/ar/cpanel/documents','cpanelcontroller@upload_documents');
    Route::post('/ar/cpanel/documents','cpanelcontroller@post_upload_documents');
    Route::delete('/ar/cpanel/documents/{id}','cpanelcontroller@delete_documents');

    Route::get('/ar/cpanel/open-account','cpanelcontroller@open_account');

    Route::post('/ar/cpanel/open-account','cpanelcontroller@post_open_account');
    Route::post('/ar/cpanel/post-agreement','cpanelcontroller@post_agreement');

    Route::get('/ar/cpanel/add-account','cpanelcontroller@add_account');
    Route::post('/ar/cpanel/add-account','cpanelcontroller@post_add_account');

    Route::delete('/ar/cpanel/demo-accounts/{id}','cpanelcontroller@delete_fx_accounts');
    Route::post('/ar/cpanel/demo-accounts/{id}','cpanelcontroller@update_fx_accounts');
    Route::post('/ar/cpanel/demo-accounts/edit/{id}','cpanelcontroller@edit_fx_accounts');

    Route::get('/ar/cpanel/live-accounts','cpanelcontroller@live_accounts');

    Route::get('/ar/cpanel/deposit-fund','cpanelcontroller@deposit_fund');
    Route::get('/ar/cpanel/deposit-fund/{method}','cpanelcontroller@deposit_fund_method');
    Route::post('/ar/cpanel/deposit-fund/{method}','cpanelcontroller@post_deposit_fund_method');

    Route::get('/ar/cpanel/withdraw-fund','cpanelcontroller@withdraw_fund');
    Route::get('/ar/cpanel/withdraw-fund/{method}','cpanelcontroller@withdraw_fund_method');
    Route::post('/ar/cpanel/withdraw-fund/{method}','cpanelcontroller@post_withdraw_fund_method');

    Route::get('/ar/cpanel/internal-transfers','cpanelcontroller@internal_transfers');
    Route::post('/ar/cpanel/internal-transfers','cpanelcontroller@post_internal_transfers');

    Route::get('/ar/cpanel/open-demo','cpanelcontroller@open_demo');
    Route::get('/ar/cpanel/trading-platforms','cpanelcontroller@trading_platforms');
    Route::get('/ar/cpanel/transaction-history','cpanelcontroller@transaction_history');
    Route::get('/ar/cpanel/transaction-history/{type}','cpanelcontroller@transaction_history');

    Route::get('/ar/cpanel/ib-overview','cpanelcontroller@ib_overview');
    Route::get('/ar/cpanel/my-referrals','cpanelcontroller@my_referrals');

    Route::get('/ar/cpanel/ebooks','cpanelcontroller@ebooks');
    Route::get('/ar/cpanel/pip-calculator','cpanelcontroller@pip_calculator');

    Route::get('/ar/cpanel/heatmap','cpanelcontroller@heatmap');
    Route::get('/ar/cpanel/calendar','cpanelcontroller@calendar');

    Route::get('/ar/cpanel/unionpay-cards','cpanelcontroller@unionpay_cards');
    Route::post('/ar/cpanel/order-unionpay-card','cpanelcontroller@order_unionpay_card');

    Route::post('/ar/cpanel/copy-trade','cpanelcontroller@post_copy_trade');
    Route::delete('/ar/cpanel/copy-trade/{id}','cpanelcontroller@delete_copy_trade');
    Route::get('/ar/cpanel/copy-trade','cpanelcontroller@copy_trade');

//Russia LINKS

    Route::get('/ru/activate/{username}/{token}','cpanelcontroller@verificationmail');
    Route::get('/ru/cpanel/home','cpanelcontroller@home');
    Route::get('/ru/cpanel/profile','cpanelcontroller@profile');
    Route::post('/ru/cpanel/profile','cpanelcontroller@post_profile');
    Route::post('/ru/cpanel/password','cpanelcontroller@post_password');
    Route::get('/ru/cpanel/password','cpanelcontroller@change_password');

    Route::get('/ru/cpanel/documents','cpanelcontroller@upload_documents');
    Route::post('/ru/cpanel/documents','cpanelcontroller@post_upload_documents');
    Route::delete('/ru/cpanel/documents/{id}','cpanelcontroller@delete_documents');

    Route::get('/ru/cpanel/open-account','cpanelcontroller@open_account');

    Route::post('/ru/cpanel/open-account','cpanelcontroller@post_open_account');
    Route::post('/ru/cpanel/post-agreement','cpanelcontroller@post_agreement');

    Route::get('/ru/cpanel/add-account','cpanelcontroller@add_account');
    Route::post('/ru/cpanel/add-account','cpanelcontroller@post_add_account');


    Route::delete('/ru/cpanel/demo-accounts/{id}','cpanelcontroller@delete_fx_accounts');
    Route::post('/ru/cpanel/demo-accounts/{id}','cpanelcontroller@update_fx_accounts');
    Route::post('/ru/cpanel/demo-accounts/edit/{id}','cpanelcontroller@edit_fx_accounts');

    Route::get('/ru/cpanel/live-accounts','cpanelcontroller@live_accounts');

    Route::get('/ru/cpanel/deposit-fund','cpanelcontroller@deposit_fund');
    Route::get('/ru/cpanel/deposit-fund/{method}','cpanelcontroller@deposit_fund_method');
    Route::post('/ru/cpanel/deposit-fund/{method}','cpanelcontroller@post_deposit_fund_method');

    Route::get('/ru/cpanel/withdraw-fund','cpanelcontroller@withdraw_fund');
    Route::get('/ru/cpanel/withdraw-fund/{method}','cpanelcontroller@withdraw_fund_method');
    Route::post('/ru/cpanel/withdraw-fund/{method}','cpanelcontroller@post_withdraw_fund_method');

    Route::get('/ru/cpanel/internal-transfers','cpanelcontroller@internal_transfers');
    Route::post('/ru/cpanel/internal-transfers','cpanelcontroller@post_internal_transfers');

    Route::get('/ru/cpanel/open-demo','cpanelcontroller@open_demo');
    Route::get('/ru/cpanel/trading-platforms','cpanelcontroller@trading_platforms');
    Route::get('/ru/cpanel/transaction-history','cpanelcontroller@transaction_history');
    Route::get('/ru/cpanel/transaction-history/{type}','cpanelcontroller@transaction_history');

    Route::get('/ru/cpanel/ib-overview','cpanelcontroller@ib_overview');
    Route::get('/ru/cpanel/my-referrals','cpanelcontroller@my_referrals');


//new design
    Route::get('/ru/cpanel/ebooks','cpanelcontroller@ebooks');
    Route::get('/ru/cpanel/pip-calculator','cpanelcontroller@pip_calculator');

    Route::get('/ru/cpanel/heatmap','cpanelcontroller@heatmap');
    Route::get('/ru/cpanel/calendar','cpanelcontroller@calendar');


    Route::get('/ru/cpanel/unionpay-cards','cpanelcontroller@unionpay_cards');
    Route::post('/ru/cpanel/order-unionpay-card','cpanelcontroller@order_unionpay_card');


    Route::post('/ru/cpanel/copy-trade','cpanelcontroller@post_copy_trade');
    Route::delete('/ru/cpanel/copy-trade/{id}','cpanelcontroller@delete_copy_trade');
    Route::get('/ru/cpanel/copy-trade','cpanelcontroller@copy_trade');

    // Visa Pay

    Route::get('/en/test_mail', 'cpanelcontroller@test');

    Route::get('/en/visa', 'PayClYController@index');
    Route::post('/en/ePay', 'PayClYController@submit');
    Route::get('/ar/success_pay', function(){
    return View::make("epanel.success_pay");
    });
    Route::get('/ar/error_pay', function(){
    return View::make("epanel.error_pay");
    });


});

// Start Super Panel Routes and login


Route::post('/en/slogin','spanelcontroller@checklogin');

Route::group(['middleware' => ['superadmin']], function () {
    Route::get('/spanel_notifications','spanelcontroller@notifications');

    Route::get('/en/spanel/competition','spanelcontroller@competition');
    Route::patch('/en/spanel/competition/{login}','spanelcontroller@update_competition');


    Route::get('/en/spanel/home','spanelcontroller@home');
    Route::post('/en/spanel/password','spanelcontroller@post_password');
    Route::post('/en/spanel/user_password','spanelcontroller@post_User_Password');
    Route::post('/en/spanel/open_live_account','spanelcontroller@open_live_account');
    Route::post('/en/spanel/edit_live_account','spanelcontroller@edit_live_account');

    Route::get('/en/spanel/admins','spanelcontroller@admins');
    Route::post('/en/spanel/admins','spanelcontroller@add_admins');
    Route::patch('/en/spanel/admins/{id}','spanelcontroller@edit_admins');
    Route::delete('/en/spanel/admins/{id}','spanelcontroller@delete_admins');

    Route::get('/en/spanel/website-accounts','spanelcontroller@website_accounts');
    Route::get('/en/spanel/website-accounts/exportall','spanelcontroller@export_website_accounts_all');

    Route::get('/en/spanel/demo-accounts','spanelcontroller@demo_accounts');
    Route::delete('/en/spanel/demo-accounts/{id}','spanelcontroller@delete_demo_accounts');
    Route::get('/en/spanel/live-accounts','spanelcontroller@live_accounts');
    Route::get('/en/spanel/referrals-accounts','spanelcontroller@referrals_accounts');

    Route::get('/en/spanel/documents','spanelcontroller@documents');
    Route::patch('/en/spanel/documents/{id}','spanelcontroller@approve_documents');
    Route::delete('/en/spanel/documents/{id}','spanelcontroller@delete_documents');


    Route::get('/en/spanel/copy-trade','spanelcontroller@copy_trade');
    Route::patch('/en/spanel/copy-trade/{id}','spanelcontroller@approve_copy_trade');
    Route::delete('/en/spanel/copy-trade/{id}','spanelcontroller@delete_copy_trade');

    Route::get('/en/spanel/unionpay-card','spanelcontroller@unionpay_cards');
    Route::get('/en/spanel/unionpay-cards-request','spanelcontroller@unionpay_cards');
    Route::patch('/en/spanel/unionpay-card/{id}','spanelcontroller@approve_unionpay_card');
    Route::delete('/en/spanel/unionpay-card/{id}','spanelcontroller@delete_unionpay_card');


    Route::get('/en/spanel/deposit-fund-requests/','spanelcontroller@deposit_fund_requests');
    Route::get('/en/spanel/deposit-fund-requests/{status}','spanelcontroller@deposit_fund_requests');
    Route::post('/en/spanel/deposit-fund-requests/','spanelcontroller@post_deposit_fund_requests');
    Route::post('/en/spanel/deposit-fund-requests/{status}','spanelcontroller@post_deposit_fund_requests');

    Route::get('/en/spanel/withdraw-fund-requests/','spanelcontroller@withdraw_fund_requests');
    Route::get('/en/spanel/withdraw-fund-requests/{status}','spanelcontroller@withdraw_fund_requests');
    Route::post('/en/spanel/withdraw-fund-requests/','spanelcontroller@post_withdraw_fund_requests');
    Route::post('/en/spanel/withdraw-fund-requests/{status}','spanelcontroller@post_withdraw_fund_requests');

    Route::get('/en/spanel/internal-transfers-requests/','spanelcontroller@internal_transfers_requests');
    Route::get('/en/spanel/internal-transfers-requests/{status}','spanelcontroller@internal_transfers_requests');
    Route::post('/en/spanel/internal-transfers-requests/','spanelcontroller@post_internal_transfers_requests');
    Route::post('/en/spanel/internal-transfers-requests/{status}','spanelcontroller@post_internal_transfers_requests');

    Route::get('/en/spanel/callback-requests/','spanelcontroller@callback_requests');
    Route::delete('/en/spanel/callback-requests/{id}','spanelcontroller@delete_callback_requests');

    Route::get('/en/spanel/landing-users/','spanelcontroller@landing_users');
    Route::get('/en/spanel/landing-users/exportall','spanelcontroller@export_landing_all');

    Route::delete('/en/spanel/landing-users/{id}','spanelcontroller@delete_landing_users');

    Route::get('/en/spanel/mailer/','spanelcontroller@mailer');
    Route::post('/en/spanel/mailer','spanelcontroller@add_mailer');
    Route::delete('/en/spanel/mailer/{id}','spanelcontroller@delete_mailer');
    Route::get('/en/spanel/mailer/exportall','spanelcontroller@export_mailer_all');

    Route::get('/en/spanel/send-mails/','spanelcontroller@send_mails');
    Route::post('/en/spanel/send-mails/','spanelcontroller@post_send_mails');

    Route::get('/en/spanel/all-search/','spanelcontroller@all_search');
    Route::post('/en/spanel/all-search','spanelcontroller@add_search');
    Route::delete('/en/spanel/all-search/{id}','spanelcontroller@delete_search');

    Route::get('/en/spanel/en-slideshow/','spanelcontroller@en_slideshow');
    Route::post('/en/spanel/en-slideshow/','spanelcontroller@post_en_slideshow');

    Route::get('/en/spanel/ru-slideshow/','spanelcontroller@ru_slideshow');
    Route::post('/en/spanel/ru-slideshow/','spanelcontroller@post_ru_slideshow');

    Route::get('/en/spanel/ar-slideshow/','spanelcontroller@ar_slideshow');
    Route::post('/en/spanel/ar-slideshow/','spanelcontroller@post_ar_slideshow');

    Route::get('/en/spanel/technical-analysis/','spanelcontroller@technical_analysis');
    Route::get('/en/spanel/technical-analysis/status/{id}','spanelcontroller@status_technical_analysis');
    Route::post('/en/spanel/technical-analysis/','spanelcontroller@post_technical_analysis');
    Route::post('/en/spanel/update-technical-analysis/{id}','spanelcontroller@update_technical_analysis');
    Route::delete('/en/spanel/technical-analysis/{id}','spanelcontroller@delete_technical_analysis');

    Route::get('/en/spanel/fundamental-analysis/','spanelcontroller@fundamental_analysis');
    Route::get('/en/spanel/fundamental-analysis/status/{id}','spanelcontroller@status_fundamental_analysis');
    Route::post('/en/spanel/fundamental-analysis/','spanelcontroller@post_fundamental_analysis');
    Route::post('/en/spanel/update-fundamental-analysis/{id}','spanelcontroller@update_fundamental_analysis');
    Route::delete('/en/spanel/fundamental-analysis/{id}','spanelcontroller@delete_fundamental_analysis');

    Route::get('/en/spanel/news/','spanelcontroller@news');
    Route::get('/en/spanel/news/status/{id}','spanelcontroller@status_news');
    Route::post('/en/spanel/news/','spanelcontroller@post_news');
    Route::post('/en/spanel/update-news/{id}','spanelcontroller@update_news');
    Route::delete('/en/spanel/news/{id}','spanelcontroller@delete_news');

    Route::get('/en/spanel/offers/','spanelcontroller@offers');
    Route::get('/en/spanel/offers/status/{id}','spanelcontroller@status_offers');
    Route::post('/en/spanel/offers/','spanelcontroller@post_offers');
    Route::post('/en/spanel/update-offers/{id}','spanelcontroller@update_offers');
    Route::delete('/en/spanel/offers/{id}','spanelcontroller@delete_offers');

//gallery
    Route::get('/en/gallery', 'spanelcontroller@gallery');
    Route::get('/gallery', 'spanelcontroller@gallery');
    Route::post('/en/gallerypost', 'spanelcontroller@jmigallery');

});



Route::group(['middleware' => ['editor']], function () {

    Route::get('/en/epanel/home','epanelcontroller@home');
    Route::post('/en/epanel/password','epanelcontroller@post_password');


    Route::get('/en/epanel/callback-requests/','epanelcontroller@callback_requests');

    Route::get('/en/epanel/landing-users/','epanelcontroller@landing_users');

    Route::get('/en/epanel/all-search/','epanelcontroller@all_search');
    Route::post('/en/epanel/all-search','epanelcontroller@add_search');
    Route::delete('/en/epanel/all-search/{id}','epanelcontroller@delete_search');

    Route::get('/en/epanel/en-slideshow/','epanelcontroller@en_slideshow');
    Route::post('/en/epanel/en-slideshow/','epanelcontroller@post_en_slideshow');

    Route::get('/en/epanel/ru-slideshow/','epanelcontroller@ru_slideshow');
    Route::post('/en/epanel/ru-slideshow/','epanelcontroller@post_ru_slideshow');

    Route::get('/en/epanel/ar-slideshow/','epanelcontroller@ar_slideshow');
    Route::post('/en/epanel/ar-slideshow/','epanelcontroller@post_ar_slideshow');

    Route::get('/en/epanel/technical-analysis/','epanelcontroller@technical_analysis');
    Route::get('/en/epanel/technical-analysis/status/{id}','epanelcontroller@status_technical_analysis');
    Route::post('/en/epanel/technical-analysis/','epanelcontroller@post_technical_analysis');
    Route::post('/en/epanel/update-technical-analysis/{id}','epanelcontroller@update_technical_analysis');
    Route::delete('/en/epanel/technical-analysis/{id}','epanelcontroller@delete_technical_analysis');

    Route::get('/en/epanel/fundamental-analysis/','epanelcontroller@fundamental_analysis');
    Route::get('/en/epanel/fundamental-analysis/status/{id}','epanelcontroller@status_fundamental_analysis');
    Route::post('/en/epanel/fundamental-analysis/','epanelcontroller@post_fundamental_analysis');
    Route::post('/en/epanel/update-fundamental-analysis/{id}','epanelcontroller@update_fundamental_analysis');
    Route::delete('/en/epanel/fundamental-analysis/{id}','epanelcontroller@delete_fundamental_analysis');

    Route::get('/en/epanel/news/','epanelcontroller@news');
    Route::get('/en/epanel/news/status/{id}','epanelcontroller@status_news');
    Route::post('/en/epanel/news/','epanelcontroller@post_news');
    Route::post('/en/epanel/update-news/{id}','epanelcontroller@update_news');
    Route::delete('/en/epanel/news/{id}','epanelcontroller@delete_news');

    Route::get('/en/epanel/offers/','epanelcontroller@offers');
    Route::get('/en/epanel/offers/status/{id}','epanelcontroller@status_offers');
    Route::post('/en/epanel/offers/','epanelcontroller@post_offers');
    Route::post('/en/epanel/update-offers/{id}','epanelcontroller@update_offers');
    Route::delete('/en/epanel/offers/{id}','epanelcontroller@delete_offers');

//gallery
    Route::get('/en/gallery0', 'epanelcontroller@gallery');
    Route::post('/en/gallerypost0', 'epanelcontroller@jmigallery');

});

// End Super Panel Routes and login


Route::get('/{vue_capture?}', function() {
    return view('welcome');
})->where('vue_capture', '[\/\w\.-]*');



