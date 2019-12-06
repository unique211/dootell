<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect, Response;
use App\Company_emp_experience;
use Session;

class Companty_emp_ExperienceController extends Controller
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

            return view('company_emp_experience');
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

        $image = $request->file('image');

        // $new_name = rand() . '.' . $image->getClientOriginalExtension();
        // $image->move(public_path('images'), $new_name);


        $date1 = strtr($request->date, '/', '-');
        $doj = date('Y-m-d', strtotime($date1));


        $date2 = strtr($request->date2, '/', '-');
        $leave_date = date('Y-m-d', strtotime($date2));

        // $date2 = strtr($request->leave_date, '/', '-');
        // $leave_date = date('Y-m-d', strtotime($date2));
        $customer   =   Company_emp_experience::updateOrCreate(
            ['id' => $ID],
            [
                'emp_id'       =>  $request->emp_name,
                'designation'        =>  $request->designation,
                'doj'        =>  $doj,
                'leave_date'        =>   $leave_date,
                'company_id'        =>  $company_id,

            ]

        );

        $exp = $customer->id;
        return Response::json($exp);
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
        $customer  = Company_emp_experience::where($where)->first();

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
        $customer = Company_emp_experience::where('id', $id)->delete();
        return Response::json($customer);
    }
    public function show_all()
    {
        $role = Session::get('role');
        // $user_id = Session::get('userid');
        $ref_id = Session::get('refid');

        if ($role == "Company") {
            $data = DB::table('company_employee_experience')
                ->select('company_employee_experience.*', 'company_employee.full_name')
                ->join('company_employee', 'company_employee.id', '=', 'company_employee_experience.emp_id')
                ->where('company_employee_experience.company_id', $ref_id)
                ->get();
        } else {
            $data = DB::table('company_employee_experience')
                ->select('company_employee_experience.*', 'company_employee.full_name')
                ->join('company_employee', 'company_employee.id', '=', 'company_employee_experience.emp_id')
                ->get();
        }



        return Response::json($data);
    }

    public function get_letter(Request $request)
    {
        $ID = $request->btnprint;
        $data1 = DB::table('company_employee_experience')
            ->select('company_employee_experience.*', 'company_employee.full_name', 'company_register.company_name', DB::raw('DATE_FORMAT(company_employee_experience.doj, "%d/%m/%Y") as new_doj'), DB::raw('DATE_FORMAT(company_employee_experience.leave_date, "%d/%m/%Y") as new_leave_date'))
            ->join('company_employee', 'company_employee.id', '=', 'company_employee_experience.emp_id')
            ->join('company_register', 'company_register.id', '=', 'company_employee_experience.company_id')
            ->where('company_employee_experience.id', $ID)
            ->get();
        //  dd($data);

        $data['letter_data'] = $data1;
        return view('exp_letter', $data);
    }
}