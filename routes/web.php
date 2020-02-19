<?php

use Illuminate\Http\Request;
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

// Route::get('/', function () {
//     return view('welcome');
// });

//change by vishal
if(config('app.debug')!=true) {
    \URL::forceScheme('https');
  }

Route::post('login_check', 'LoginController@check_login');
// Route::get('/', function () {
//     return view('login');
// });


Route::get('/logout', function (Request $request) {


    // $id = $request->session()->get('logs');

    // date_default_timezone_set('Asia/Kolkata');
    // $date = date("Y-m-d H:i:s");

    // DB::table('login_logs')->where('id', $id)->update(['logout_time' => $date]);

    $request->session()->flush();

    return redirect('/');
});
Route::group(['middleware' => 'prevent-back-history'], function () {
    Auth::routes();
    Route::resource('/', 'LoginController');
});

Route::get('package', function () {
    if (Session::has('reference_id')) {
        Session::flush('reference_id');
    }
    return view('package');
});

Route::get('subscriber', function () {
    return view('subscriber');
});

Route::get('company_package', function () {
    $data1 = DB::table('package_list_master')
        ->select('package_list_master.*')
        ->where('package_type', 'Company')
        ->where('status', 1)
        ->get();
    $cnt1 = count($data1);
    $data['package'] = null;

    if ($cnt1 > 0) {
        $data['package'] = $data1;
    } else {
        $data['package'] = null;
    }

    $data['reference_id'] = null;
    if (Session::has('reference_id')) {
        $data['reference_id'] = Session::get('reference_id');
    }

    return view('company_package', $data);
});
Route::get('jobseeker_package', function () {
    $data1 = DB::table('package_list_master')
        ->select('package_list_master.*')
        ->where('package_type', 'Individual')
        ->where('status', 1)
        ->get();
    $cnt1 = count($data1);
    $data['package'] = null;

    if ($cnt1 > 0) {
        $data['package'] = $data1;
    } else {
        $data['package'] = null;
    }

    $data['reference_id'] = null;
    if (Session::has('reference_id')) {
        $data['reference_id'] = Session::get('reference_id');
    }
    return view('jobseeker_package', $data);
});
Route::get('consultancy_package', function () {
    $data1 = DB::table('package_list_master')
        ->select('package_list_master.*')
        ->where('package_type', 'Consultancy')
        ->where('status', 1)
        ->get();
    $cnt1 = count($data1);
    $data['package'] = null;

    if ($cnt1 > 0) {
        $data['package'] = $data1;
    } else {
        $data['package'] = null;
    }

    $data['reference_id'] = null;
    if (Session::has('reference_id')) {
        $data['reference_id'] = Session::get('reference_id');
    }
    return view('consultancy_package', $data);
});


Route::get('subscriber_register', function () {
    return view('subscriber_register');
});
Route::get('company_register/{id}', function ($id) {
    $data['package_id'] =  $id;
    return view('company_register', $data);
});
Route::get('company_details/{package_id}/{id}', function ($package_id, $id) {
    $data1 =  $data1 = DB::table('company_register')
        ->select('company_register.*', 'login_master.email')
        ->join('login_master', 'login_master.ref_id', '=', 'company_register.id')
        ->where('login_master.role', 'Consultancy')
        ->where('company_register.id', $id)
        ->get();

    $data2 = DB::table('package_list_master')
        ->select('package_list_master.*')
        ->where('id', $package_id)
        ->get();

    $data['company_data'] =  $data1;
    $data['package_data'] =  $data2;
    $data['package_id'] =  $package_id;
    $data['ref_id'] =  $id;
    //  dd($data);
    return view('company_details', $data);
    //echo $id;
});
Route::get('jobseeker_register/{id}', function ($id) {
    $data['package_id'] =  $id;
    return view('jobseeker_register', $data);
});
Route::get('jobseeker_details/{package_id}/{id}', function ($package_id, $id) {
    $data1 =  $data1 = DB::table('jobseeker_register')
        ->select('jobseeker_register.*', 'login_master.email')
        ->join('login_master', 'login_master.ref_id', '=', 'jobseeker_register.id')
        ->where('login_master.role', 'Individual')
        ->where('jobseeker_register.id', $id)
        ->get();

    $data2 = DB::table('package_list_master')
        ->select('package_list_master.*')
        ->where('id', $package_id)
        ->get();

    $data['jobseeker_data'] =  $data1;
    $data['package_data'] =  $data2;
    $data['package_id'] =  $package_id;
    $data['ref_id'] =  $id;
    //dd($data);
    return view('jobseeker_details', $data);
    //echo $id;
});
Route::get('consultancy_register/{id}', function ($id) {
    $data['package_id'] =  $id;
    return view('consultancy_register', $data);
    //echo $id;
});
Route::get('consultancy_details/{package_id}/{id}', function ($package_id, $id) {
    $data1 =  $data1 = DB::table('consultancy_register')
        ->select('consultancy_register.*', 'login_master.email')
        ->join('login_master', 'login_master.ref_id', '=', 'consultancy_register.id')
        ->where('login_master.role', 'Consultancy')
        ->where('consultancy_register.id', $id)
        ->get();

    $data2 = DB::table('package_list_master')
        ->select('package_list_master.*')
        ->where('id', $package_id)
        ->get();

    $data['consultancy_data'] =  $data1;
    $data['package_data'] =  $data2;
    $data['package_id'] =  $package_id;
    $data['ref_id'] =  $id;
    //  dd($data);
    return view('consultancy_details', $data);
    //echo $id;
});
Route::group(['middleware' => 'prevent-back-history'], function () {
    Auth::routes();
    Route::resource('package_list', 'package_listController');
});

Route::get('get_all_package_lists', 'package_listController@show_all');
Route::match(['get', 'post'], 'uploadingfile', 'package_listController@uploadingfile');
Route::post('package_list_delete/{id}', 'package_listController@destroy');

Route::group(['middleware' => 'prevent-back-history'], function () {
    Auth::routes();
    Route::resource('consultancy', 'ConsultancyController');
});

Route::match(['get', 'post'], 'uploadingfile_consultancy', 'ConsultancyController@uploadingfile');
Route::get('get_email/{id}', 'ConsultancyController@chk_email');
Route::get('get_all_consultancy_lists', 'ConsultancyController@show_all');
Route::post('consultancy_delete_data/{id}', 'ConsultancyController@destroy');

Route::group(['middleware' => 'prevent-back-history'], function () {
    Auth::routes();
    Route::resource('company', 'CompanyController');
});

Route::get('get_all_company_lists', 'CompanyController@show_all');
Route::match(['get', 'post'], 'uploadingfile_company', 'CompanyController@uploadingfile');
Route::post('company_delete/{id}', 'CompanyController@destroy');

Route::group(['middleware' => 'prevent-back-history'], function () {
    Auth::routes();
    Route::resource('subscriber', 'SubscriberController');
});

Route::get('get_all_subscriber_lists', 'SubscriberController@show_all');
Route::post('subscriber_delete/{id}', 'SubscriberController@destroy');

Route::group(['middleware' => 'prevent-back-history'], function () {
    Auth::routes();
    Route::resource('jobseeker', 'JobseekerController');
});

Route::match(['get', 'post'], 'uploadingfile_jobseeker_profile', 'JobseekerController@uploadingfile_profile');
Route::match(['get', 'post'], 'uploadingfile_jobseeker_resume', 'JobseekerController@uploadingfile_resume');
Route::match(['get', 'post'], 'uploadingfile_jobseeker_document', 'JobseekerController@uploadingfile_document');
Route::post('add_experience', 'JobseekerController@add_experience');
Route::get('get_all_jobseeker_lists', 'JobseekerController@show_all');
Route::get('jobseeker_exp/{id}', 'JobseekerController@get_experience');
Route::post('jobseeker_delete/{id}', 'JobseekerController@destroy');


Route::group(['middleware' => 'prevent-back-history'], function () {
    Auth::routes();
    Route::resource('company_employee', 'Company_employeeController');
});

Route::match(['get', 'post'], 'uploadingfile_company_employee', 'Company_employeeController@uploadingfile');
Route::get('get_all_company_employee', 'Company_employeeController@show_all');
Route::get('get_all_company_employee2', 'Company_employeeController@show_all2');
Route::post('change_status_employee', 'Company_employeeController@change_status');
Route::get('get_company_employee_limit', 'Company_employeeController@get_limit');
Route::post('company_employee_delete_data/{id}', 'Company_employeeController@destroy');

Route::group(['middleware' => 'prevent-back-history'], function () {
    Auth::routes();
    Route::resource('company_customers', 'Company_CustomerController');
});
Route::match(['get', 'post'], 'uploadingfile_company_customer', 'Company_CustomerController@uploadingfile');
Route::get('get_all_company_customer', 'Company_CustomerController@show_all');
Route::get('get_all_company_customer2', 'Company_CustomerController@show_all2');
Route::post('change_status_customer', 'Company_CustomerController@change_status');
Route::get('get_company_customer_limit', 'Company_CustomerController@get_limit');
Route::post('company_customers_delete/{id}', 'Company_CustomerController@destroy');

Route::group(['middleware' => 'prevent-back-history'], function () {
    Auth::routes();
    Route::resource('company_postjob', 'Company_JobPost_Controller');
});
Route::get('get_all_company_job_post', 'Company_JobPost_Controller@show_all');
Route::get('get_all_company_job_post2', 'Company_JobPost_Controller@show_all2');
Route::post('change_status_job_post', 'Company_JobPost_Controller@change_status');
Route::post('company_postjob_delete/{id}', 'Company_JobPost_Controller@destroy');

Route::group(['middleware' => 'prevent-back-history'], function () {
    Auth::routes();
    Route::resource('company_emp_experience', 'Companty_emp_ExperienceController');
});
Route::get('get_all_company_emp_experience', 'Companty_emp_ExperienceController@show_all');
Route::post('get_letter', 'Companty_emp_ExperienceController@get_letter');
Route::post('company_emp_experience_delete/{id}', 'Companty_emp_ExperienceController@destroy');

Route::group(['middleware' => 'prevent-back-history'], function () {
    Auth::routes();
    Route::resource('consultancy_student', 'StudentController');
});
Route::get('get_all_student_lists', 'StudentController@show_all');
Route::get('get_consultancy_student_limit', 'StudentController@get_limit');
Route::post('consultancy_student_delete/{id}', 'StudentController@destroy');

Route::group(['middleware' => 'prevent-back-history'], function () {
    Auth::routes();
    Route::resource('groups', 'GroupsController');
});
Route::get('get_all_groups', 'GroupsController@show_all');
Route::match(['get', 'post'], 'uploadingfile_group', 'GroupsController@uploadingfile_group');
Route::post('groups_delete/{id}', 'GroupsController@destroy');

Route::group(['middleware' => 'prevent-back-history'], function () {
    Auth::routes();
    Route::resource('posts', 'PostsController');
});
Route::get('get_all_posts', 'PostsController@show_all');
Route::match(['get', 'post'], 'uploadingfile_post', 'PostsController@uploadingfile_post');
Route::post('posts_delete/{id}', 'PostsController@destroy');

Route::group(['middleware' => 'prevent-back-history'], function () {
    Auth::routes();
    Route::resource('employee', 'EmployeeController');
});

Route::get('get_all_employee', 'EmployeeController@show_all');
Route::post('delete_from_login', 'EmployeeController@delete_from_login');
Route::post('get_menu', 'EmployeeController@get_menu');
Route::post('get_sub_menu/{id}', 'EmployeeController@get_sub_menu');
Route::get('user_rights/{id}', 'EmployeeController@user_rights');
Route::post('delete_from_user_rights', 'EmployeeController@delete_from_user_rights');
Route::post('employee_delete/{id}', 'EmployeeController@destroy');


Route::group(['middleware' => 'prevent-back-history'], function () {
    Auth::routes();
    Route::resource('subscribe_group', 'Subscribe_groupsController');
});

Route::get('get_all_subscribed_groups', 'Subscribe_groupsController@show_all');
Route::get('get_all_suggested_groups', 'Subscribe_groupsController@show_all2');
Route::post('add_subscribe_group', 'Subscribe_groupsController@add_subscribe_group');
Route::post('subscribe_group_delete/{id}', 'Subscribe_groupsController@destroy');

Route::get('notification/{id}', 'Subscribe_groupsController@get_notification');

Route::post('add_comment', 'Subscribe_groupsController@add_comment');
Route::post('get_comment', 'Subscribe_groupsController@get_comment');

Route::group(['middleware' => 'prevent-back-history'], function () {
    Auth::routes();
    Route::get('dashboard', 'LoginController@dashboard');
});

// Route::get('dashboard', function () {
//     return view('dashboard');
// });
// Route::get('subscriber/{id}', function () {
//     return view('subscriber');
// });

Route::post('payment', 'CompanyController@order');
Route::post('payment_consultancy', 'ConsultancyController@order');
Route::post('payment_jobseeker', 'JobseekerController@order');
Route::post('payment_subscribe', 'Subscribe_groupsController@order');
Route::get('save_group', 'Subscribe_groupsController@add_subscribe_group2');


Route::post('payment_consultancy_renew', 'Consultancy_renew_Controller@order');
Route::get('renew_consultancy', 'Consultancy_renew_Controller@renew_consultancy');

Route::post('payment_company_renew', 'Company_renew_Controller@order');
Route::get('renew_company', 'Company_renew_Controller@renew_company');

Route::post('payment_jobseeker_renew', 'Jobseeker_renew_Controller@order');
Route::get('renew_jobseeker', 'Jobseeker_renew_Controller@renew_jobseeker');

Route::get('update_payment_status_company', 'CompanyController@change_company_payment_status');
Route::get('update_payment_status_consultancy', 'ConsultancyController@change_consultancy_payment_status');
Route::get('update_payment_status_jobseeker', 'JobseekerController@change_jobseeker_payment_status');
Route::get('update_payment_status_all', 'LoginController@change_all_payment_status');

Route::group(['middleware' => 'prevent-back-history'], function () {
    Auth::routes();
    Route::resource('slider', 'SliderController');
});
Route::match(['get', 'post'], 'uploading_slide_img', 'SliderController@uploading_slide_img');
Route::get('get_all_slider', 'SliderController@show_all');
Route::post('slider_delete/{id}', 'SliderController@destroy');

Route::group(['middleware' => 'prevent-back-history'], function () {
    Auth::routes();
    Route::resource('testimonials', 'TestimoinalsController');
});
Route::match(['get', 'post'], 'uploading_testimonial_img', 'TestimoinalsController@uploading_testimonial_img');
Route::get('get_all_testimonial', 'TestimoinalsController@show_all');
Route::post('testimonials_delete/{id}', 'TestimoinalsController@destroy');


Route::get('forgot', function () {
    return view('forgot');
});

Route::get('get_mobile_number/{id}', 'LoginController@get_mobile_number');
Route::post('change_password', 'LoginController@change_password');
Route::get('get_user_details/{id}', 'LoginController@get_user_details');
Route::post('get_current_rights/{id}', 'LoginController@get_current_rights');
Route::post('payment_login', 'LoginController@order');
