<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect, Response;
use App\Employee;
use App\Login_master;
use Session;


class EmployeeController extends Controller
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
            $ref_id = Session::get('refid');
            $sidebar = DB::table('user_rights')
                ->select('user_rights.*', 'menu_master.menu_name', 'menu_master.sub_menu_name')
                ->join('menu_master', 'menu_master.id', '=', 'user_rights.menu_id')
                ->where('user_rights.ref_id', $ref_id)
                ->orderBy('menu_master.order', 'asc')
                ->get();

            $count = count($sidebar);

            if ($count > 0) {
                $data['sidebar'] = $sidebar;
            } else {
                $data['sidebar'] = null;
            }

            return view('employee', $data);
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

        $groups_id = $request->groups_id;
        $string = implode(',', $groups_id);

        $date1 = strtr($request->date, '/', '-');
        $date = date('Y-m-d', strtotime($date1));

        $customer   =   Employee::updateOrCreate(
            ['id' => $ID],
            [
                'employee_name'        =>  $request->employee_name,
                'doj'        =>  $date,
                'user_type'        => $request->user_type,
                'mobile'        => $request->mobile,
                'email'        =>  $request->email,
                'groups_id'        =>  $string,
                'user_id'        =>  $company_id,
            ]

        );
        $ref_id = $customer->id;
        $str = $request->password;

        $role =    $request->user_type;
        if ($str != "") {
            $md5 = md5($str);
            $password = base64_encode($md5);
            $customer2   =   Login_master::updateOrCreate(
                ['ref_id' => $ref_id, 'role' => $role],
                [

                    'role'        =>   $request->user_type,
                    'email'        =>   $request->email,
                    'password'        =>    $password,

                ]

            );
        } else {
            $customer2   =   Login_master::updateOrCreate(
                ['ref_id' => $ref_id, 'role' => $role],
                [
                    'role'        =>   $request->user_type,
                    'email'        =>   $request->email,
                ]

            );
        }
        $urdata = $request->urdata;
        $u_rights = "";
        $cnt = 0;
        foreach ($urdata as $value) {
            $u_rights = array(
                'ref_id' => $ref_id,
                'menu_id' => $value[0],
                'user_rights' => $value[1],
                'user_id' => $company_id,
            );

            $result =  DB::table('user_rights')
                ->Insert($u_rights);
            $cnt++;
        }



        //    return Response::json($groups_id);
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
        $where = array('id' => $id);
        $customer  = Employee::where($where)->first();

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
        $customer = Employee::where('id', $id)->delete();

        // $where = array('ref_id' => $id, 'role' => 'Consultancy');
        // $customer2 = Login_master::where($where)->delete();
        DB::table('user_rights')->where('ref_id', $id)->delete();
        return Response::json($customer);
    }
    public function show_all()
    {
        //  $role = Session::get('role');
        // $user_id = Session::get('userid');
        //  $ref_id = Session::get('refid');


        $data = DB::table('employee')
            ->select('employee.*')
            ->whereNOTIn('user_type', function ($query) {
                $query->select('user_type')->from('employee')->where('user_type', 'Superadmin');
            })
            ->get();




        return Response::json($data);
    }
    public function delete_from_login(Request $request)
    {
        $ref_id = $request->id;
        $role = $request->user_type;
        $where = array('ref_id' => $ref_id, 'role' => $role);
        $customer = Login_master::where($where)->delete();
        return Response::json($customer);
    }

    public function get_menu()
    {

        $data = DB::table('menu_master')
            // ->select([DB::RAW('DISTINCT(menu_name)'), 'menu_master.id'])
            ->select('menu_master.id', 'menu_master.menu_name')
            ->distinct('menu_name')
            ->get();
        return Response::json($data);
    }
    public function get_sub_menu($id)
    {

        $data = DB::table('menu_master')
            ->select('menu_master.*')
            ->where('id', $id)

            ->get();
        return Response::json($data);
    }

    public function user_rights($id)
    {

        $data = DB::table('user_rights')
            ->select('user_rights.*')
            ->where('ref_id', $id)

            ->get();
        return Response::json($data);
    }
    public function delete_from_user_rights(Request $request)
    {
        $ref_id = $request->save_update;

        // $where = array('ref_id' => $ref_id);
        $customer =  DB::table('user_rights')->where('ref_id', $ref_id)->delete();
        return Response::json($customer);
    }
}