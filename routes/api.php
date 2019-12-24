<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('payment/status', 'CompanyController@paymentCallback');

Route::post('payment/status_consultancy', 'ConsultancyController@paymentCallback');


Route::post('payment/status_jobseeker', 'JobseekerController@paymentCallback');

Route::post('payment/status_subscribe', 'Subscribe_groupsController@paymentCallback');

Route::post('payment/status_all', 'LoginController@paymentCallback');


Route::post('payment/status_consultancy2', 'Consultancy_renew_Controller@paymentCallback');
Route::post('payment/status2', 'Company_renew_Controller@paymentCallback');
Route::post('payment/status_jobseeker2', 'Jobseeker_renew_Controller@paymentCallback');
