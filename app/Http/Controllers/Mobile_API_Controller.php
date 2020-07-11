<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect, Response;

class Mobile_API_Controller extends Controller
{

    public function set_not_null($data)
    {
        foreach ($data as $key => $value) {
            if (is_null($value) || $value == '')
                //  unset($data[$key]);
                $data[$key] = "";
        }
        return $data;
    }

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
                $profile_photo = $value->profile_photo;
                $url = url('/');
                if ($profile_photo == null || $profile_photo == "") {
                    $profile_photo = $url . "/resources/dist/img/how-work3.png";
                } else {
                    $profile_photo = $url . "/uploads/Jobseeker/profile/" . $profile_photo;
                }
                $result1 = array(
                    'profile_photo' => $profile_photo,
                    'full_name' => $value->full_name,
                    'email' => $email,
                    'mobile' => $mobile,
                    'specialization' => $value->specialization,
                    'id' => $value->id,
                );
                $result[] = $this->set_not_null($result1);
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
        $result = array();
        $job = DB::table('company_job_post')
            ->select('company_job_post.*', 'company_register.company_name', 'company_register.logo')
            ->join('company_register', 'company_register.id', '=', 'company_job_post.company_id')
            // ->join('login_master', 'login_master.ref_id', '=', 'jobseeker_register.company_id')
            ->get();
        $cnt2 = count($job);
        if ($cnt2 > 0) {
            //   $result1 = $job;
            foreach ($job as $value) {
                $logo = $value->logo;
                $url = url('/');
                if ($logo == null || $logo == "") {
                    $logo = $url . "/resources/dist/img/job-logo1.png";
                } else {
                    $logo = $url . "/uploads/Company/logo/" . $logo;
                }
                $result1 = array(
                    'id' => $value->id,
                    'post_date' => $value->post_date,
                    'job_title' => $value->job_title,
                    'description' => $value->description,
                    'keywords' => $value->keywords,
                    'experience_from' => $value->experience_from,
                    'experience_to' => $value->experience_to,
                    'ctc' => $value->ctc,
                    'from_ctc' => $value->from_ctc,
                    'to_ctc' => $value->to_ctc,
                    'vacancies' => $value->vacancies,
                    'location' => $value->location,
                    'industry' => $value->industry,
                    'qualification' => $value->qualification,
                    'email' => $value->email,
                    'venue' => $value->venue,
                    'date_from' => $value->date_from,
                    'date_to' => $value->date_to,
                    'company_id' => $value->company_id,
                    'status' => $value->status,
                    'created_at' => $value->created_at,
                    'updated_at' => $value->updated_at,
                    'company_name' => $value->company_name,
                    'logo' => $logo,
                );
                $result[] = $this->set_not_null($result1);
            }
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
        $result = array();
        $slider = DB::table('slider_master')
            ->select('slider_master.*')
            ->get();
        $cnt2 = count($slider);
        if ($cnt2 > 0) {
            //   $result1 = $slider;
            foreach ($slider as $value) {
                $image = $value->image;
                $url = url('/');
                if ($image == null || $image == "") {
                    $image = $url . "/resources/dist/img/slider-image-3.jpg";
                } else {
                    $image = $url . "/uploads/slider/" . $image;
                }

                $result1 = array(
                    'id' => $value->id,
                    'image' => $image,
                    'user_id' => $value->user_id,
                    'created_at' => $value->created_at,
                    'updated_at' => $value->updated_at,

                );
                $result[] = $this->set_not_null($result1);
            }
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
        $result = array();
        $testimonials = DB::table('testimonials_master')
            ->select('testimonials_master.*')
            ->get();
        $cnt2 = count($testimonials);
        if ($cnt2 > 0) {
            // $result1 = $testimonials;
            foreach ($testimonials as $value) {

                $image = $value->image;
                $url = url('/');
                if ($image == null || $image == "") {
                    $image = $url . "/resources/dist/img/how-work3.png";
                } else {
                    $image = $url . "/uploads/testimonial/" . $image;
                }
                $result1 = array(
                    'id' => $value->id,
                    'title' => $value->title,
                    'description' => $value->description,
                    'image' => $image,
                    'user_id' => $value->user_id,
                    'created_at' => $value->created_at,
                    'updated_at' => $value->updated_at,

                );
                $result[] = $this->set_not_null($result1);
            }
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
        $result = array();

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
          //  $experience = trim(strtoupper($experience));
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
            //  $result1 = $job;
            foreach ($job as $value) {

                $logo = $value->logo;
                $url = url('/');
                if ($logo == null || $logo == "") {
                    $logo = $url . "/resources/dist/img/job-logo1.png";
                } else {
                    $logo = $url . "/uploads/Company/logo/" . $logo;
                }
                $result1 = array(
                    'id' => $value->id,
                    'post_date' => $value->post_date,
                    'job_title' => $value->job_title,
                    'description' => $value->description,
                    'keywords' => $value->keywords,
                    'experience_from' => $value->experience_from,
                    'experience_to' => $value->experience_to,
                    'ctc' => $value->ctc,
                    'from_ctc' => $value->from_ctc,
                    'to_ctc' => $value->to_ctc,
                    'vacancies' => $value->vacancies,
                    'location' => $value->location,
                    'industry' => $value->industry,
                    'qualification' => $value->qualification,
                    'email' => $value->email,
                    'venue' => $value->venue,
                    'date_from' => $value->date_from,
                    'date_to' => $value->date_to,
                    'company_id' => $value->company_id,
                    'status' => $value->status,
                    'created_at' => $value->created_at,
                    'updated_at' => $value->updated_at,
                    'company_name' => $value->company_name,
                    'logo' => $logo,
                );
                $result[] = $this->set_not_null($result1);
            }
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
                $profile_photo = $value->profile_photo;
                $url = url('/');
                if ($profile_photo == null || $profile_photo == "") {
                    $profile_photo = $url . "/resources/dist/img/how-work3.png";
                } else {
                    $profile_photo = $url . "/uploads/Jobseeker/profile/" . $profile_photo;
                }
                $result1 = array(
                    'profile_photo' => $profile_photo,
                    'full_name' => $value->full_name,
                    'email' => $email,
                    'mobile' => $mobile,
                    'specialization' => $value->specialization,
                    'id' => $value->id,
                );
                $result[] = $this->set_not_null($result1);
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
        $result = array();

        $id = $request->student_id;

        $data1 = DB::table('jobseeker_register')
            ->select('jobseeker_register.*')
            ->where('jobseeker_register.id', $id)
            ->get();

        $cnt2 = count($data1);
        if ($cnt2 > 0) {
            //  $result1 = $data1;
            foreach ($data1 as $value) {
                $profile_photo = $value->profile_photo;
                $url = url('/');
                if ($profile_photo == null || $profile_photo == "") {
                    $profile_photo = $url . "/resources/dist/img/how-work3.png";
                } else {
                    $profile_photo = $url . "/uploads/Jobseeker/profile/" . $profile_photo;
                }
                $result1 = array(
                    'id' => $value->id,
                    'date' => $value->date,
                    'email' => $value->email,
                    'full_name' => $value->full_name,
                    'mobile' => $value->mobile,
                    'education' => $value->education,
                    'course' => $value->course,
                    'specialization' => $value->specialization,
                    'skill' => $value->skill,
                    'board' => $value->board,
                    'institution' => $value->institution,
                    'passing_year' => $value->passing_year,
                    'marks' => $value->marks,
                    'experience' => $value->experience,
                    'dob' => $value->dob,
                    'gender' => $value->gender,
                    'address' => $value->address,
                    'hometown' => $value->hometown,
                    'pincode' => $value->pincode,
                    'state' => $value->state,
                    'aadhar' => $value->aadhar,
                    'pan' => $value->pan,
                    'reference' => $value->reference,
                    'profile_photo' => $profile_photo,
                    'resume_doc' => $value->resume_doc,
                    'package_id' => $value->package_id,
                    'int_job_location' => $value->int_job_location,
                    'applied_by' => $value->applied_by,
                    'consultancy_id' => $value->consultancy_id,
                    'payment_status' => $value->payment_status,
                    'created_at' => $value->created_at,
                    'updated_at' => $value->updated_at,
                );
                $result[] = $this->set_not_null($result1);
            }
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
        $result = array();

        $id = $request->job_id;

        $data1 = DB::table('company_job_post')
            ->select('company_job_post.*', 'company_register.company_name', 'company_register.logo')
            ->join('company_register', 'company_register.id', '=', 'company_job_post.company_id')
            ->where('company_job_post.id', $id)
            ->get();



        $cnt2 = count($data1);
        if ($cnt2 > 0) {
            //  $result1 = $data1;
            foreach ($data1 as $value) {

                $logo = $value->logo;
                $url = url('/');
                if ($logo == null || $logo == "") {
                    $logo = $url . "/resources/dist/img/job-logo1.png";
                } else {
                    $logo = $url . "/uploads/Company/logo/" . $logo;
                }
                $result1 = array(
                    'id' => $value->id,
                    'post_date' => $value->post_date,
                    'job_title' => $value->job_title,
                    'description' => $value->description,
                    'keywords' => $value->keywords,
                    'experience_from' => $value->experience_from,
                    'experience_to' => $value->experience_to,
                    'ctc' => $value->ctc,
                    'from_ctc' => $value->from_ctc,
                    'to_ctc' => $value->to_ctc,
                    'vacancies' => $value->vacancies,
                    'location' => $value->location,
                    'industry' => $value->industry,
                    'qualification' => $value->qualification,
                    'email' => $value->email,
                    'venue' => $value->venue,
                    'date_from' => $value->date_from,
                    'date_to' => $value->date_to,
                    'company_id' => $value->company_id,
                    'status' => $value->status,
                    'created_at' => $value->created_at,
                    'updated_at' => $value->updated_at,
                    'company_name' => $value->company_name,
                    'logo' => $logo,
                );
                $result[] = $this->set_not_null($result1);
            }
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
        $result = array();
        $data1 = DB::table('consultancy_register')
            ->select('consultancy_register.*', 'login_master.email')
            ->join('login_master', 'login_master.ref_id', '=', 'consultancy_register.id')
            ->where('role', 'Consultancy')
            ->get();
        $cnt2 = count($data1);
        if ($cnt2 > 0) {
            //     $result1 = $data1;
            foreach ($data1 as $value) {
                $upload_image = $value->upload_image;
                $url = url('/');
                if ($upload_image == null || $upload_image == "") {
                    $upload_image = $url . "/resources/dist/img/con_img.png";
                } else {
                    $upload_image = $url . "/uploads/consultancy/" . $upload_image;
                }
                $result1 = array(
                    'id' => $value->id,
                    'date' => $value->date,
                    'cunsultancy_name' => $value->cunsultancy_name,
                    'package_id' => $value->package_id,
                    'mobile' => $value->mobile,
                    'cunsultancy_address' => $value->cunsultancy_address,
                    'city' => $value->city,
                    'reference' => $value->reference,
                    'upload_image' => $upload_image,
                    'payment_status' => $value->payment_status,
                    'created_at' => $value->created_at,
                    'updated_at' => $value->updated_at,
                    'email' => $value->email,
                );
                $result[] = $this->set_not_null($result1);
            }
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
        $result = array();
        $data1 = DB::table('company_register')
            ->select('company_register.*', 'login_master.email')
            ->join('login_master', 'login_master.ref_id', '=', 'company_register.id')
            ->where('login_master.role', 'Company')
            ->get();

        $cnt2 = count($data1);
        if ($cnt2 > 0) {
            //$result1 = $data1;
            foreach ($data1 as $value) {

                $logo = $value->logo;
                $url = url('/');
                if ($logo == null || $logo == "") {
                    $logo = $url . "/resources/dist/img/how-work3.png";
                } else {
                    $logo = $url . "/uploads/Company/logo/" . $logo;
                }
                $result1 = array(
                    'id' => $value->id,
                    'date' => $value->date,
                    'contact_person' => $value->contact_person,
                    'package_id' => $value->package_id,
                    'mobile' => $value->mobile,
                    'company_name' => $value->company_name,
                    'industry_type' => $value->industry_type,
                    'company_address' => $value->company_address,
                    'city' => $value->city,
                    'reference' => $value->reference,
                    'logo' => $logo,
                    'payment_status' => $value->payment_status,
                    'created_at' => $value->created_at,
                    'updated_at' => $value->updated_at,
                    'email' => $value->email,
                );
                $result[] = $this->set_not_null($result1);
            }
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
        $result = array();
        $data1 = DB::table('subscriber_register')
            ->select('subscriber_register.*', 'login_master.email')
            ->join('login_master', 'login_master.ref_id', '=', 'subscriber_register.id')
            ->where('role', 'Subscriber')
            ->get();


        $cnt2 = count($data1);
        if ($cnt2 > 0) {
            // $result1 = $data1;
            foreach ($data1 as $value) {
                $result1 = array(
                    'id' => $value->id,
                    'date' => $value->date,
                    'name' => $value->name,
                    'mobile' => $value->mobile,
                    'address' => $value->address,
                    'aadhar' => $value->aadhar,
                    'created_at' => $value->created_at,
                    'updated_at' => $value->updated_at,
                    'email' => $value->email,
                );
                $result[] = $this->set_not_null($result1);
            }
        }

        if ($result) {
            return response()->json(['status' => 1, 'data' => $result]);
        } else {
            return response()->json(['status' => 0, 'message' => 'No Data Available']);
        }
    }
}
