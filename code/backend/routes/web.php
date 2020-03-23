<?php

use App\User;
use Illuminate\Http\Request;
// use Illuminate\Routing\Route;
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


Route::post('/arif', function (Request $r) {
    error_log("Index:\n");
    $name = $r->data;
    $message = "Welcome To HELL " . $name;
    // return "view('welcome')";
    // return ["data" => "<h1>Welcome Arif!</h1>"];
    return ["data" => $message];
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

//moved to API, Kept for Testing Purpose.
Route::post('paymentType/create', 'Payment_Type_Controller@create');
Route::post('paymentType/findOnePaymentType', 'Payment_Type_Controller@findOnePaymentType');
Route::post('paymentType/update', 'Payment_Type_Controller@update');
Route::post('paymentType/getAllPaymentType', 'Payment_Type_Controller@getAllPaymentType');
Route::post('paymentType/countPaymentType', 'Payment_Type_Controller@countPaymentType');
Route::post('paymentType/delete', 'Payment_Type_Controller@delete');

//moved to API, Kept for Testing Purpose.
// role : account
//Route::post('payment/mobile/create', 'Payment_Mobile_Controller@create');
//Route::post('payment/mobile/findOne', 'Payment_Mobile_Controller@findOne');
//Route::post('payment/mobile/delete', 'Payment_Mobile_Controller@delete');
//Route::post('payment/mobile/update', 'Payment_Mobile_Controller@update');
//Route::post('payment/mobile/getAllPaymentMobileByAUser', 'Payment_Mobile_Controller@getAllPaymentMobileByAUser');
//Route::post('payment/mobile/countPaymentMobileByAUser', 'Payment_Mobile_Controller@countPaymentMobileByAUser');

//not moved; have to move to API when authentication will be applied
//role : account
Route::post('payment/mobile/countPaymentMobile', 'Payment_Mobile_Controller@countPaymentMobile');
Route::post('payment/mobile/getAllPaymentMobile', 'Payment_Mobile_Controller@getAllPaymentMobile');
Route::post('payment/mobile/approve_mobile_payment', 'Payment_Mobile_Controller@approve_mobile_payment');
Route::post('payment/mobile/search', 'Payment_Mobile_Controller@search');
Route::post('payment/mobile/search_count', 'Payment_Mobile_Controller@search_count');
Route::post('payment/mobile/getApprovedUserDetails', 'Payment_Mobile_Controller@getApprovedUserDetails');


//search : api/user
Route::post('search/basic', 'Search_Controller@search_basic');
Route::post('search/basic_count', 'Search_Controller@search_basic_count');
Route::post('search/education', 'Search_Controller@search_education');
Route::post('search/education_count', 'Search_Controller@search_education_count');
Route::post('search/jobs', 'Search_Controller@search_jobs');
Route::post('search/jobs_count', 'Search_Controller@search_jobs_count');


//event - role : organiser
Route::post('events/create', 'Events_Controller@create');
Route::post('events/update', 'Events_Controller@update');
Route::post('events/delete', 'Events_Controller@delete');
Route::post('events/update_basic', 'Events_Controller@update_basic');
Route::post('events/update_description_notes', 'Events_Controller@update_description_notes');
Route::post('events/removePaymentAssingment', 'Events_Controller@removePaymentAssingment');
Route::post('events/assingment_payment_event', 'Events_Controller@assingment_payment_event');
Route::post('events/getAllRegisteredUser', 'Events_Controller@getAllRegisteredUser');
Route::post('events/getDescriptionNotes', 'Events_Controller@getDescriptionNotes');
Route::post('events/checkPaymentAssingment', 'Events_Controller@checkPaymentAssingment');

//event : api/user
Route::post('events/getAllEvents', 'Events_Controller@getAllEvents');//no description.
Route::post('events/find_one', 'Events_Controller@findOne');
Route::post('events/count_all', 'Events_Controller@count_all');
Route::post('events/search_event', 'Events_Controller@search_event');
Route::post('events/search_event_count', 'Events_Controller@search_event_count');

//event : api/user
Route::post('events/eventRegistration', 'Events_Controller@eventRegistration');
Route::post('events/checkEventRegistration', 'Events_Controller@checkEventRegistration');
Route::post('events/checkPayment', 'Events_Controller@checkPayment');
Route::post('events/countSearchRegisteredUser', 'Events_Controller@countSearchRegisteredUser');

//news : publication
Route::post('news/save', 'News_Controller@save');
Route::post('news/delete', 'News_Controller@delete');
Route::post('news/update', 'News_Controller@update');

//news : public
Route::post('news/getAllNews', 'News_Controller@getAllNews');
Route::post('news/countAll', 'News_Controller@countAll');
Route::post('news/search', 'News_Controller@search');
Route::post('news/search_count', 'News_Controller@search_count');
Route::post('news/findOne', 'News_Controller@findOne');


Route::post('administrator/save', 'Administrator_Controller@save');
Route::post('administrator/findOne', 'Administrator_Controller@findOne');
Route::post('administrator/getAll', 'Administrator_Controller@getAll');
Route::post('administrator/update', 'Administrator_Controller@update');
Route::post('administrator/delete', 'Administrator_Controller@delete');
Route::post('administrator/assign_people', 'Administrator_Controller@assign_people');
Route::post('administrator/remove_people', 'Administrator_Controller@remove_people');
Route::post('administrator/get_assigned_people', 'Administrator_Controller@get_assigned_people');


//mail : api
Route::get('send', 'MailController@send');
Route::post('sendNewPass', 'MailController@sendNewPass');
//Route::post('sendPasswordResetLink', 'ResetPasswordController@sendEmail');
