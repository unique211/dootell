<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Login_master;
use App\Jobseeker_register;
use App\Jobseeker_experience;
use Illuminate\Support\Facades\DB;
use Redirect, Response;
use Session;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        if (!$request->session()->exists('userid')) {
            // user value cannot be found in session
            return redirect('/');
        } else {
            return view('student_list');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ID = $request->save_update;
        $session_ref_id = $request->session()->get('refid');

        //  $image = $request->file('image');

        // $new_name = rand() . '.' . $image->getClientOriginalExtension();
        // $image->move(public_path('images'), $new_name);


        $date1 = strtr($request->date, '/', '-');
        $date = date('Y-m-d', strtotime($date1));

        $date2 = strtr($request->dob, '/', '-');
        $date3 = date('Y-m-d', strtotime($date2));
        $applied_by = "Consultancy";

        $customer   =   Jobseeker_register::updateOrCreate(
            ['id' => $ID],
            [
                'date'       =>   $date,
                'full_name'        =>  $request->full_name,
                'mobile'        =>  $request->mobile,
                'education'        =>   $request->education,
                'course'        =>   $request->course,
                'specialization'        =>   $request->specialization,
                'skill'        =>  $request->skill,
                'board'        =>  $request->board,
                'institution'        =>  $request->institution,
                'passing_year'        =>  $request->passing_year,
                'marks'        =>  $request->marks,
                'experience'        =>  $request->experience,
                'dob'        => $date3,
                'gender'        =>  $request->gender,
                'address'        =>  $request->address,
                'hometown'        =>  $request->hometown,
                'pincode'        =>  $request->pin,
                'state'        =>  $request->state,
                'aadhar'        =>  $request->aadhar,
                'pan'        =>  $request->pan,
                'int_job_location'        =>  $request->int_job_location,
                'profile_photo'        =>  $request->filehidden1,
                'resume_doc'        =>  $request->filehidden2,
                'package_id'        =>  $request->package_id,
                'email'        =>   $request->email,
                'applied_by'        =>   $applied_by,
                'consultancy_id'        =>   $session_ref_id,

            ]

        );
        $ref_id = $customer->id;




        $role = "Individual";

        $chk_exp = DB::table('jobseeker_experience')
            ->select('jobseeker_experience.*')
            ->where('role', 'Individual')
            ->where('ref_id', $ref_id)
            ->get();
        $cnt = count($chk_exp);
        if ($cnt > 0) {
            DB::table('jobseeker_experience')->where('ref_id', $ref_id)->where('role', 'Individual')->delete();
        }


        return Response::json($ref_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = DB::table('jobseeker_register')
            ->select('jobseeker_register.*')


            ->where('jobseeker_register.id', $id)
            ->first();

        return Response::json($customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Jobseeker_register::where('id', $id)->delete();
        $where = array('ref_id' => $id, 'role' => 'Individual');
        $customer3 = Jobseeker_experience::where($where)->delete();


        return Response::json($customer);
    }
    public function add_experience(Request $request)
    {
        $role = "Individual";
        $ref_id = $request->ref_id;


        $data = array(
            'company_name'        =>   $request->company_name,
            'years'        =>   $request->years,
            'months'        =>   $request->months,
            'role'        =>   $role,
            'ref_id'        =>   $ref_id,

        );
        $result =  DB::table('jobseeker_experience')
            ->Insert($data);
        return Response::json($result);
    }
    public function show_all()
    {
        $ref_id = Session::get('refid');

        $applied_by = "Consultancy";
        $data = DB::table('jobseeker_register')
            ->select('jobseeker_register.*')
            ->where('applied_by', $applied_by)
            ->where('consultancy_id', $ref_id)
            ->get();
        //   ->join('customer_master', 'customer_master.id', '=', 'customers.name')


        // $data = Customer_master::orderBy('id', 'asc')->get();
        return Response::json($data);
    }
    public function get_experience($id)
    {
        $customer = DB::table('jobseeker_experience')
            ->select('jobseeker_experience.*')
            ->where('role', 'Individual')
            ->where('ref_id', $id)
            ->get();

        return Response::json($customer);
        //   ->join('customer_master', 'customer_master.id', '=', 'customers.name')


    }

    public function get_limit()
    {
        $ref_id = Session::get('refid');


        $data = DB::table('consultancy_register')
            ->select('consultancy_register.*', 'package_list_master.no_of_candidate')
            ->join('package_list_master', 'package_list_master.id', '=', 'consultancy_register.package_id')
            ->where('consultancy_register.id', $ref_id)
            ->first();
        $limit = $data->no_of_candidate;

        $found = DB::table('jobseeker_register')
            ->select('jobseeker_register.*')
            ->where('jobseeker_register.consultancy_id', $ref_id)
            ->where('jobseeker_register.applied_by', 'Consultancy')
            ->count();


        $result = 0;
        if ($limit > $found) {
            $result = 1;
        } else {
            $result = 2;
        }

        // dd($result);
        return Response::json($result);
    }
}