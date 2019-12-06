<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect, Response;
use App\Company_employee;
use Session;
use Illuminate\Support\Facades\Validator;


class Company_employeeController extends Controller
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
            return view('company_employee');
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
        $company_id = $request->session()->get('refid');

        //   $image = $request->file('image');

        // $new_name = rand() . '.' . $image->getClientOriginalExtension();
        // $image->move(public_path('images'), $new_name);


        $date1 = strtr($request->date, '/', '-');
        $doj = date('Y-m-d', strtotime($date1));

        $date2 = strtr($request->leave_date, '/', '-');
        $leave_date = date('Y-m-d', strtotime($date2));

        $customer   =   Company_employee::updateOrCreate(
            ['id' => $ID],
            [
                'full_name'       =>   $request->full_name,
                'gender'        =>  $request->gender,
                'education'        =>  $request->education,
                'designation'        =>   $request->designation,
                'experience'        =>  $request->experience,
                'doj'        =>  $doj,
                'leave_date'        =>  $leave_date,
                'experience_certificate'        =>  $request->experience_certificate,
                'notice_period'        =>  $request->notice_period,
                'notice_month'        =>  $request->notice_months,
                'reason'        =>  $request->reason,
                'profile_picture'        =>  $request->filehidden1,
                'aadhar'        =>  $request->aadhar,
                'behaviour'        =>  $request->behaviour,
                'attendence'        =>  $request->attendence,
                'sincetity'        =>  $request->sincerity,
                'dependability'        =>  $request->dependability,
                'company_id'        =>  $company_id,


            ]

        );
        return Response::json($customer);
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
        $where = array('id' => $id);
        $customer  = Company_employee::where($where)->first();

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
        $customer = Company_employee::where('id', $id)->delete();
        return Response::json($customer);
    }
    public function show_all()
    {
        $role = Session::get('role');
        // $user_id = Session::get('userid');
        $ref_id = Session::get('refid');

        if ($role == "Company") {
            $data = DB::table('company_employee')
                ->select('company_employee.*')
                ->where('company_id', $ref_id)
                ->get();
        } else {
            $data = DB::table('company_employee')
                ->select('company_employee.*')
                ->get();
        }


        return Response::json($data);
    }
    public function show_all2()
    {
        $role = Session::get('role');
        // $user_id = Session::get('userid');
        $ref_id = Session::get('refid');

        if ($role == "Company") {
            $data = DB::table('company_employee')
                ->select('company_employee.*', 'login_master.email', 'company_register.mobile', 'company_register.company_name')
                ->join('login_master', 'login_master.ref_id', '=', 'company_employee.company_id')
                ->join('company_register', 'company_register.id', '=', 'company_employee.company_id')
                ->where('login_master.role', 'Company')
                ->where('status', 1)
                ->where('company_id', '!=',  $ref_id)
                ->get();
        } else {
            $data = DB::table('company_employee')
                ->select('company_employee.*')
                ->get();
        }


        return Response::json($data);
    }
    public function uploadingfile(Request $request)
    {

        // $filename = $request->file('file');
        // dd($request->file('file'));


        $validator = Validator::make($request->all(), [ // <---
            'file' => 'required|file|max:1024',

        ]);



        if ($validator->fails()) {
            return 0;
        } else {
            $extension = $request->file('file')->getClientOriginalExtension();

            $dir = 'uploads/Company/employee';
            $filename = uniqid() . '_' . time() . '.' . $extension;

            // echo  dd($filename);
            $request->file('file')->move($dir, $filename);

            return $filename;
        }
    }
    public function change_status(Request $request)
    {
        $id = $request->id;
        $status = $request->status;
        $data = DB::table('company_employee')
            ->where('id', $id)
            ->update(['status' =>  $status]);
        // $where = array('ref_id' => $ref_id, 'role' => $role);
        // $customer = Login_master::where($where)->delete();
        return Response::json($data);
    }

    public function get_limit()
    {
        $ref_id = Session::get('refid');


        $data = DB::table('company_register')
            ->select('company_register.*', 'package_list_master.no_of_candidate')
            ->join('package_list_master', 'package_list_master.id', '=', 'company_register.package_id')
            ->where('company_register.id', $ref_id)
            ->first();
        $limit = $data->no_of_candidate;

        $found = DB::table('company_employee')
            ->select('company_employee.*')
            ->join('company_register', 'company_register.id', '=', 'company_employee.company_id')
            ->where('company_register.id', $ref_id)
            ->count();


        $result = 0;
        if ($limit > $found) {
            $result = 1;
        } else {
            $result = 2;
        }

        //  dd($result);
        return Response::json($result);
    }
}