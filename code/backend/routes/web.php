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
    // error_log("Index:\n");
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

