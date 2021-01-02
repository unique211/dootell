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


//For Mobile App API
Route::middleware(['basicAuth'])->group(function () {
    //All the routes are placed in here

    //Get All Students
    Route::get('get_all_students', 'Mobile_API_Controller@get_all_students');

    //Get Company Job Post
    Route::get('get_company_job_post', 'Mobile_API_Controller@get_company_job_post');

    //Get Slider
    Route::get('get_slider', 'Mobile_API_Controller@get_slider');

    //Get Testimonials
    Route::get('get_testimonial', 'Mobile_API_Controller@get_testimonial');

    //Search Jobs
    Route::post('search_jobs', 'Mobile_API_Controller@search_jobs');

    //Search Students
    Route::post('search_students', 'Mobile_API_Controller@search_students');

    //Student Details
    Route::post('student_details', 'Mobile_API_Controller@student_details');

    //Job Details
    Route::post('job_details', 'Mobile_API_Controller@job_details');

    //Get All Consultancy
    Route::get('get_consultancy', 'Mobile_API_Controller@get_consultancy');

    //Get All Company
    Route::get('get_company', 'Mobile_API_Controller@get_company');

    //Get All Subscriber
    Route::get('get_subscriber', 'Mobile_API_Controller@get_subscriber');
});
