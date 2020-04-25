<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect, Response;

class Mobile_API_Controller extends Controller
{
    //Get All Students
    public function get_all_students(Request $request)
    {

        $data1 = DB::table('jobseeker_register')
            ->select('jobseeker_register.*')
            // ->join('login_master', 'login_master.ref_id', '=', 'jobseeker_register.company_id')
           // ->inRandomOrder()
          //  ->limit(4)
            ->get();



        $cnt1 = count($data1);
        $result = array();

        if ($cnt1 > 0) {
            //  $result = array();
            $email = "";
            $mobile = "";
            foreach ($data1 as $value) {
                $applied_by = $value->applied_by;

                if ($applied_by == "Consultancy") {

                    $data2 = DB::table('jobseeker_register')
                        ->select('jobseeker_register.*', 'login_master.email as con_email', 'consultancy_register.mobile as con_mobile')
                        ->join('login_master', 'login_master.ref_id', '=', 'jobseeker_register.consultancy_id')
                        ->join('consultancy_register', 'consultancy_register.id', '=', 'jobseeker_register.consultancy_id')
                        ->where('login_master.role', 'Consultancy')
                        ->first();

                    $email =  $data2->con_email;
                    $mobile = $data2->con_mobile;
                } else {
                    $email = $value->email;
                    $mobile = $value->mobile;
                }
                $result[] = array(
                    'profile_photo' => $value->profile_photo,
                    'full_name' => $value->full_name,
                    'email' => $email,
                    'mobile' => $mobile,
                    'specialization' => $value->specialization,
                    'id' => $value->id,
                );
            }
        }

        if ($result) {
            return response()->json(['status' => 1, 'data' => $result]);
        } else {
            return response()->json(['status' => 0, 'message' => 'No Data Available']);
        }
    }

    //Get Company Job Post
    public function get_company_job_post(Request $request)
    {
        $result = "";
        $job = DB::table('company_job_post')
            ->select('company_job_post.*', 'company_register.company_name', 'company_register.logo')
            ->join('company_register', 'company_register.id', '=', 'company_job_post.company_id')
            // ->join('login_master', 'login_master.ref_id', '=', 'jobseeker_register.company_id')
            ->get();
        $cnt2 = count($job);
        if ($cnt2 > 0) {
            $result = $job;
        }

        if ($result) {
            return response()->json(['status' => 1, 'data' => $result]);
        } else {
            return response()->json(['status' => 0, 'message' => 'No Data Available']);
        }
    }

    //Get Slider
    public function get_slider(Request $request)
    {
        $result = "";
        $slider = DB::table('slider_master')
            ->select('slider_master.*')
            ->get();
        $cnt2 = count($slider);
        if ($cnt2 > 0) {
            $result = $slider;
        }

        if ($result) {
            return response()->json(['status' => 1, 'data' => $result]);
        } else {
            return response()->json(['status' => 0, 'message' => 'No Data Available']);
        }
    }
    //Get Testimonials
    public function get_testimonial(Request $request)
    {
        $result = "";
        $testimonials = DB::table('testimonials_master')
            ->select('testimonials_master.*')
            ->get();
        $cnt2 = count($testimonials);
        if ($cnt2 > 0) {
            $result = $testimonials;
        }

        if ($result) {
            return response()->json(['status' => 1, 'data' => $result]);
        } else {
            return response()->json(['status' => 0, 'message' => 'No Data Available']);
        }
    }

    //Search Jobs
    public function search_jobs(Request $request)
    {
        $result = "";

        $designation = $request->designation;
        $experience = $request->experience;
        $education = $request->education;
        $location = $request->location;

        $where1 = "";

        $job = DB::table('company_job_post')
            ->select('company_job_post.*', 'company_register.company_name', 'company_register.logo')
            ->join('company_register', 'company_register.id', '=', 'company_job_post.company_id');

        if ($designation != "") {
            $designation = trim(strtoupper($designation));
            $job =  $job->where('job_title', $designation);
        }

        if ($experience != "") {
            $experience = trim(strtoupper($experience));
            $job =  $job->where('experience_from', $experience);
        }
        if ($education != "") {
            $education = trim(strtoupper($education));
            $job =  $job->where('qualification', $education);
        }
        if ($location != "") {
            $location = trim(strtoupper($location));
            $split = explode(",", $location);
            $job =  $job->whereIn('location', $split);
            //   $job =  $job->where('location', $location);
        }

        $job = $job->get();
        $cnt2 = count($job);
        if ($cnt2 > 0) {
            $result = $job;
        }

        if ($result) {
            return response()->json(['status' => 1, 'data' => $result]);
        } else {
            return response()->json(['status' => 0, 'message' => 'No Data Available']);
        }
    }

    //Search Students
    public function search_students(Request $request)
    {
        $result = array();

        $specialization = $request->specialization;
        $skills = $request->skills;
        $education = $request->education;
        $location = $request->location;
        // dd($location);
        // $split = explode(",", $location);


        $where1 = "";

        $student = DB::table('jobseeker_register')
            ->select('jobseeker_register.*');

        if ($specialization != "") {
            $specialization = trim(strtoupper($specialization));
            $student =  $student->where('specialization', $specialization);
        }

        if ($skills != "") {
            $skills = trim(strtoupper($skills));
            $student =  $student->where('skill', $skills);
        }
        if ($education != "") {
            $education = trim(strtoupper($education));
            $student =  $student->where('education', $education);
        }
        if ($location != "") {
            $location = trim(strtoupper($location));
            $split = explode(",", $location);


            $student =  $student->whereIn('int_job_location', $split);
            //  $student =  $student->where('int_job_location', $location);
        }

        $student = $student->get();
        $cnt2 = count($student);
        if ($cnt2 > 0) {
            $result = array();
            $email = "";
            $mobile = "";
            foreach ($student as $value) {
                $applied_by = $value->applied_by;

                if ($applied_by == "Consultancy") {

                    $data2 = DB::table('jobseeker_register')
                        ->select('jobseeker_register.*', 'login_master.email as con_email', 'consultancy_register.mobile as con_mobile')
                        ->join('login_master', 'login_master.ref_id', '=', 'jobseeker_register.consultancy_id')
                        ->join('consultancy_register', 'consultancy_register.id', '=', 'jobseeker_register.consultancy_id')
                        ->where('login_master.role', 'Consultancy')
                        ->first();

                    $email =  $data2->con_email;
                    $mobile = $data2->con_mobile;
                } else {
                    $email = $value->email;
                    $mobile = $value->mobile;
                }
                $result[] = array(
                    'profile_photo' => $value->profile_photo,
                    'full_name' => $value->full_name,
                    'email' => $email,
                    'mobile' => $mobile,
                    'specialization' => $value->specialization,
                    'id' => $value->id,
                );
            }
            //   $data['students'] = $result;
        }

        if ($result) {
            return response()->json(['status' => 1, 'data' => $result]);
        } else {
            return response()->json(['status' => 0, 'message' => 'No Data Available']);
        }
    }

    //Student Details
    public function student_details(Request $request)
    {
        $result = "";

        $id = $request->student_id;

        $data1 = DB::table('jobseeker_register')
            ->select('jobseeker_register.*')
            ->where('jobseeker_register.id', $id)
            ->get();

        $cnt2 = count($data1);
        if ($cnt2 > 0) {
            $result = $data1;
        }

        if ($result) {
            return response()->json(['status' => 1, 'data' => $result]);
        } else {
            return response()->json(['status' => 0, 'message' => 'No Data Available']);
        }
    }

    //Job Details
    public function job_details(Request $request)
    {
        $result = "";

        $id = $request->job_id;

        $data1 = DB::table('company_job_post')
            ->select('company_job_post.*', 'company_register.company_name', 'company_register.logo')
            ->join('company_register', 'company_register.id', '=', 'company_job_post.company_id')
            ->where('company_job_post.id', $id)
            ->get();



        $cnt2 = count($data1);
        if ($cnt2 > 0) {
            $result = $data1;
        }

        if ($result) {
            return response()->json(['status' => 1, 'data' => $result]);
        } else {
            return response()->json(['status' => 0, 'message' => 'No Data Available']);
        }
    }

    //Get All Consultancy
    public function get_consultancy(Request $request)
    {
        $result = "";
        $data1 = DB::table('consultancy_register')
            ->select('consultancy_register.*', 'login_master.email')
            ->join('login_master', 'login_master.ref_id', '=', 'consultancy_register.id')
            ->where('role', 'Consultancy')
            ->get();
        $cnt2 = count($data1);
        if ($cnt2 > 0) {
            $result = $data1;
        }

        if ($result) {
            return response()->json(['status' => 1, 'data' => $result]);
        } else {
            return response()->json(['status' => 0, 'message' => 'No Data Available']);
        }
    }

    //Get All Company
    public function get_company(Request $request)
    {
        $result = "";
        $data1 = DB::table('company_register')
        ->select('company_register.*', 'login_master.email')
        ->join('login_master', 'login_master.ref_id', '=', 'company_register.id')
        ->where('login_master.role', 'Company')
        ->get();

        $cnt2 = count($data1);
        if ($cnt2 > 0) {
            $result = $data1;
        }

        if ($result) {
            return response()->json(['status' => 1, 'data' => $result]);
        } else {
            return response()->json(['status' => 0, 'message' => 'No Data Available']);
        }
    }

    //Get All Subscriber
    public function get_subscriber(Request $request)
    {
        $result = "";
        $data1 = DB::table('subscriber_register')
        ->select('subscriber_register.*', 'login_master.email')
        ->join('login_master', 'login_master.ref_id', '=', 'subscriber_register.id')
        ->where('role', 'Subscriber')
        ->get();


        $cnt2 = count($data1);
        if ($cnt2 > 0) {
            $result = $data1;
        }

        if ($result) {
            return response()->json(['status' => 1, 'data' => $result]);
        } else {
            return response()->json(['status' => 0, 'message' => 'No Data Available']);
        }
    }
}
