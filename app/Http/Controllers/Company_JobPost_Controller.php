<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect, Response;
use App\Company_Post_job;
use Session;

class Company_JobPost_Controller extends Controller
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
            return view('company_job_post');
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

        //  $image = $request->file('image');

        // $new_name = rand() . '.' . $image->getClientOriginalExtension();
        // $image->move(public_path('images'), $new_name);


        $date1 = strtr($request->date, '/', '-');
        $post_date = date('Y-m-d', strtotime($date1));

        $date2 = strtr($request->from_date, '/', '-');
        $from_date = date('Y-m-d', strtotime($date2));

        $date2 = strtr($request->to_date, '/', '-');
        $to_date = date('Y-m-d', strtotime($date2));

        $customer   =   Company_Post_job::updateOrCreate(
            ['id' => $ID],
            [
                'post_date'       =>  $post_date,
                'job_title'        =>  $request->job_title,
                'description'        =>  $request->description,
                'keywords'        =>   $request->keywords,
                'experience_from'        =>  $request->from,
                'experience_to'        =>  $request->to,
                'ctc'        =>   $request->ctc,
                'from_ctc'        =>   $request->from_ctc,
                'to_ctc'        =>   $request->to_ctc,
                'vacancies'        =>   $request->vacancies,
                'location'        =>   $request->location,
                'industry'        =>   $request->industry,
                'qualification'        =>   $request->qualification,
                'email'        =>   $request->email,
                'venue'        =>   $request->vanue,
                'date_from'        =>   $from_date,
                'date_to'        =>   $to_date,
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
        $customer  = Company_Post_job::where($where)->first();

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
        $customer = Company_Post_job::where('id', $id)->delete();
        return Response::json($customer);
    }
    public function show_all()
    {
        $role = Session::get('role');
        // $user_id = Session::get('userid');
        $ref_id = Session::get('refid');

        if ($role == "Company") {
            $data = DB::table('company_job_post')
                ->select('company_job_post.*')
                ->where('company_id', $ref_id)
                ->get();
        } else {
            $data = DB::table('company_job_post')
                ->select('company_job_post.*')
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
            $data = DB::table('company_job_post')
                ->select('company_job_post.*', 'login_master.email as company_email', 'company_register.mobile', 'company_register.company_name')
                ->join('login_master', 'login_master.ref_id', '=', 'company_job_post.company_id')
                ->join('company_register', 'company_register.id', '=', 'company_job_post.company_id')
                ->where('login_master.role', 'Company')
                ->where('status', 1)
                ->where('company_id', '!=',  $ref_id)
                ->get();
        } else {
            $data = DB::table('company_job_post')
                ->select('company_job_post.*')
                ->get();
        }

        return Response::json($data);
    }
    public function change_status(Request $request)
    {
        $id = $request->id;
        $status = $request->status;
        $data = DB::table('company_job_post')
            ->where('id', $id)
            ->update(['status' =>  $status]);
        // $where = array('ref_id' => $ref_id, 'role' => $role);
        // $customer = Login_master::where($where)->delete();
        return Response::json($data);
    }
}