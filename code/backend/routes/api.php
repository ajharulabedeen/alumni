<?php

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
    Route::post('uploadfile', 'UploadFileController@update');//working test purpose.
    Route::get('/getfile', 'UploadFileController@getFile');//working test purpose.

    Route::post('basic/create', 'Profile_Basic_Controller@create');

});
