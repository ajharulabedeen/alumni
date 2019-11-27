<?php

use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
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
    error_log("Index:\n");
    // Role::create(['name' => 'writer']);
    // $permission = Permission::create(['name'=>'edit post']);
    // $role = Role::findById(1);
    // $permission = Permission::findById(1);
    // $role->givePermissionTo($permission);
    // dd(request()->ip());
    // $user = User::find(1);
    // dd($user);
    // auth()->user()->assignRole("writer");

    // return view('welcome');
    return "view('welcome')";
});

Route::group(['middleware' => ['role:editor']], function () {
    Route::get('/edit', 'PostController@edit');
});
// Route::get('/edit', 'PostController@edit');

// to test file upload//not working //error : 419
// Route::post('/uploadfile','UploadFileController@update');
// Route::post('/uploadfile',function(){
//     return "Upload file.";
// });
// Route::post('basic/create', 'Basic_Controller@create');
// Route::post('basic/findOneById', 'Basic_Controller@findOneByUserID');
// Route::post('basic/update', 'Basic_Controller@update');

//not working
// Route::post('basic/create', 'Basic_Controller2@create');
// Route::post('basic/findOneById', 'Basic_Controller2@findOneByUserID');
// Route::post('basic/update', 'Basic_Controller2@update');

// Route::post('basic/create', 'Profile_Basic_Controller@create');//moved in api
// Route::post('basic/findOneById', 'Profile_Basic_Controller@findOneByUserID');////moved in api
// Route::post('basic/update', 'Profile_Basic_Controller@update');////moved in api


 Route::post('paymentType/create', 'Payment_Type_Controller@create');
 Route::post('paymentType/findOnePaymentType', 'Payment_Type_Controller@findOnePaymentType');
 Route::post('paymentType/update', 'Payment_Type_Controller@update');

 Route::post('paymentType/delete', 'Payment_Type_Controller@delete');



