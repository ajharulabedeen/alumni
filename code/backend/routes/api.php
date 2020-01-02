<?php

// use Illuminate\Routing\Route;

Route::group([

    'middleware' => 'api',
    // 'middleware' => 'role:writer'
    // 'prefix' => 'auth'

], function () {

    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::post('logout', 'AuthController@logout');
    // Route::post('logout', function (){
    //     dd(">>>>>>>>>>>>");
    // });
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('sendPasswordResetLink', 'ResetPasswordController@sendEmail');
    Route::post('resetPassword', 'ChangePasswordController@process');
    Route::post('t', 'Test@t');

    Route::post('/create', 'PostController@create')->middleware('role:writer');
    // Route::post('/create', 'PostController@create');
    Route::post('uploadfile', 'UploadFileController@update'); //working test purpose.
    Route::get('/getfile', 'UploadFileController@getFile'); //working test purpose.

    // api : -----
    Route::post('basic/create', 'Profile_Basic_Controller@create');
    Route::post('basic/findOneById', 'Profile_Basic_Controller@findOneByUserID');
    Route::post('basic/update', 'Profile_Basic_Controller@update');

    Route::post('about/create',  'Profile_About_Controller@create');
    Route::post('about/update',  'Profile_About_Controller@update');
    Route::post('about/getAboutByUserId', 'Profile_About_Controller@getAboutByUserId');

    Route::post('education/create', 'Profile_Education_Controller@create');
    Route::post('education/update', 'Profile_Education_Controller@update');
    Route::post('education/getAllEducationsByUserId', 'Profile_Education_Controller@getAllEducationsByUserId');
    Route::post('education/deleteOne', 'Profile_Education_Controller@deleteOne');

    Route::post('jobs/create', 'Profile_Jobs_Controller@create');
    Route::post('jobs/update', 'Profile_Jobs_Controller@update');
    Route::post('jobs/getAllJobsByUserId', 'Profile_Jobs_Controller@getAllJobsByUserId');
    Route::post('jobs/deleteOne', 'Profile_Jobs_Controller@deleteOne');

    Route::post('photo/upload', 'Profile_Photo_Controller@upload');
    Route::post('photo/getPhoto', 'Profile_Photo_Controller@getPhoto');


    //payment type
    Route::post('paymentType/create', 'Payment_Type_Controller@create');
    Route::post('paymentType/findOnePaymentType', 'Payment_Type_Controller@findOnePaymentType');
    Route::post('paymentType/update', 'Payment_Type_Controller@update');
    Route::post('paymentType/getAllPaymentType', 'Payment_Type_Controller@getAllPaymentType');
    Route::post('paymentType/countPaymentType', 'Payment_Type_Controller@countPaymentType');
    Route::post('paymentType/delete', 'Payment_Type_Controller@delete');


    // Payment Mobile
    Route::post('payment/mobile/create', 'Payment_Mobile_Controller@create');
    Route::post('payment/mobile/findOne', 'Payment_Mobile_Controller@findOne');
    Route::post('payment/mobile/delete', 'Payment_Mobile_Controller@delete');
    Route::post('payment/mobile/update', 'Payment_Mobile_Controller@update');
    Route::post('payment/mobile/getAllPaymentMobileByAUser', 'Payment_Mobile_Controller@getAllPaymentMobileByAUser');
    Route::post('payment/mobile/countPaymentMobile', 'Payment_Mobile_Controller@countPaymentMobile');
    Route::post('payment/mobile/countPaymentMobileByAUser', 'Payment_Mobile_Controller@countPaymentMobileByAUser');
});
