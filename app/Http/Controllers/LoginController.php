<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Login_master;
use Redirect, Response;
use Session;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->session()->exists('userid')) {
            $request->session()->flush();
        }
        return view('login');
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
        //
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
        //
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
        //
    }
    public function chk_email($id)
    {
        $where = array('email' => $id);
        $user  = User_master::where($where)->get();
        $cnt = count($user);
        return Response::json($cnt);
    }
    public function chk_userid($id)
    {
        $where = array('user_id' => $id);
        $user  = Login_master::where($where)->get();
        $cnt = count($user);
        return Response::json($cnt);
    }
    public function check_login(Request $request)
    {
        $user_id = $request->user_id;
        //   $password = $request->password;

        $str = $request->password;
        $md5 = md5($str);
        $password = base64_encode($md5);


        $msg = 0;
        $user = DB::table('login_master')
            ->select('login_master.*')
            ->where('email', $user_id)
            ->where('password', $password)
            ->get();

        $cnt = count($user);



        if ($cnt > 0) {
            $get_password = "";
            $get_user_id = "";
            $get_role = "";
            $get_id = "";


            foreach ($user as $user1) {
                $get_password =  $user1->password;
                $get_user_id =  $user1->email;
                $get_role =  $user1->role;
                $get_id =  $user1->id;
                $get_ref_id =  $user1->ref_id;
            }


            if (($get_user_id == $user_id) && ($get_password == $password)) {

                if ($get_role == "Consultancy" || $get_role == "Company" || $get_role == "Individual") {
                    $date = date('Y-m-d');
                    $exp = DB::table('login_master')
                        ->select('login_master.*')
                        ->where('email', $user_id)
                        ->where('password', $password)
                        ->where('expire_date', '>',   $date)
                        ->get();
                    $cnt1 = count($exp);
                    if ($cnt1 > 0) {
                        $msg = 1;
                        $request->session()->put('userid',  $user_id);
                        $request->session()->put('role',  $get_role);
                        $request->session()->put('id',  $get_id);
                        $request->session()->put('refid',  $get_ref_id);
                    } else {
                        $msg = 2;
                    }
                } else {
                    $msg = 1;
                    $request->session()->put('userid',  $user_id);
                    $request->session()->put('role',  $get_role);
                    $request->session()->put('id',  $get_id);
                    $request->session()->put('refid',  $get_ref_id);
                }



                // date_default_timezone_set('Asia/Kolkata');
                // $date = date("Y-m-d H:i:s");

                // $user = DB::table('login_logs')->insertGetId(['user_id' => $user_id, 'login_time' => $date]);

                // $request->session()->put('logs',  $user);



            }
        }

        return $msg;
        //   return Response::json($msg);
    }

    public function dashboard(Request  $request)
    {
        if (!$request->session()->exists('userid')) {

            return redirect('/');
        } else {
            $role = Session::get('role');

            if ($role == "Subscriber") {

                $ref_id = Session::get('refid');
                $result = array();

                $data1 = DB::table('subscribed_groups')
                    ->select('subscribed_groups.*', 'groups.group_name')
                    ->join('groups', 'groups.id', '=', 'subscribed_groups.group_id')
                    ->where('subscriber_id', $ref_id)
                    ->get();




                $cnt1 = count($data1);
                if ($cnt1 > 0) {
                    //   $data['subscribed']  = null;
                    $data2 = array();
                    $x = 0;

                    foreach ($data1 as $value) {
                        $group_name = $value->group_name;
                        $group_id = $value->group_id;
                        $count = "";
                        $data3 = DB::table('posts')
                            ->select('posts.*')
                            ->where('group_id', $group_id)
                            ->get();
                        $count = count($data3);

                        $result[] = array(

                            'notification' => $count,
                            'group_name' => $group_name,
                            'group_id' => $group_id,

                        );
                    }
                    $data['subscribed'] = $result;

                    //array_push($data, $data2);
                    //
                    //    $data['subscribed'] = $data2;
                } else {
                    $data['subscribed']  = null;
                }
                //   $data['df'] = $data;
                //   $data['subscribed'] = $data1;
                return view('dashboard', $data);
                // dd($data);
            } else if ($role == "Company") {
                $ref_id = Session::get('refid');

                $data1 = DB::table('company_customer')
                    ->select('company_customer.*')
                    ->where('company_id', $ref_id)
                    ->get();
                $data['customer'] = count($data1);
                $data2 = DB::table('company_employee')
                    ->select('company_employee.*')
                    ->where('company_id', $ref_id)
                    ->get();
                $data['employee'] = count($data2);
                $data3 = DB::table('company_job_post')
                    ->select('company_job_post.*')
                    ->where('company_id', $ref_id)
                    ->get();
                $data['job'] = count($data3);

                // $data['count'] = array(
                //     'company_customer' => $cnt1,
                //     'company_employee' => $cnt2,
                //     'company_job_post' => $cnt3,
                // );




                return view('dashboard', $data);
            } else if ($role == "Consultancy") {

                $ref_id = Session::get('refid');
                $applied = "Consultancy";
                $data1 = DB::table('jobseeker_register')
                    ->select('jobseeker_register.*')
                    ->where('consultancy_id', $ref_id)
                    ->where('applied_by', $applied)
                    ->get();
                $data['students'] = count($data1);

                return view('dashboard', $data);
            } else if ($role == "Individual") {
                $ref_id = Session::get('refid');
                $data1 = DB::table('consultancy_register')
                    ->select('consultancy_register.*')
                    ->get();
                $data['consultancy_register'] = count($data1);
                $data2 = DB::table('company_register')
                    ->select('company_register.*')
                    ->get();
                $data['company_register'] = count($data2);
                $data3 = DB::table('subscriber_register')
                    ->select('subscriber_register.*')
                    ->get();
                $data['subscriber_register'] = count($data3);
                $data4 = DB::table('jobseeker_register')
                    ->select('jobseeker_register.*')
                    ->get();
                $data['jobseeker_register'] = count($data4);
                return view('dashboard', $data);
            } else {
                $ref_id = Session::get('refid');
                $data1 = DB::table('consultancy_register')
                    ->select('consultancy_register.*')
                    ->get();
                $data['consultancy_register'] = count($data1);
                $data2 = DB::table('company_register')
                    ->select('company_register.*')
                    ->get();
                $data['company_register'] = count($data2);
                $data3 = DB::table('subscriber_register')
                    ->select('subscriber_register.*')
                    ->get();
                $data['subscriber_register'] = count($data3);
                $data4 = DB::table('jobseeker_register')
                    ->select('jobseeker_register.*')
                    ->get();
                $data['jobseeker_register'] = count($data4);



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




                return view('dashboard', $data);
            }
        }
    }

    public function get_mobile_number($id)
    {
        $email = $id;
        $id = "";
        $data1 = DB::table('login_master')
            ->select('login_master.*')
            ->where('email', $email)
            ->first();

        $role = $data1->role;
        $ref_id = $data1->ref_id;

        $data2 = "";
        $mobile = "";

        if ($role == "Company") {
            $data2 = DB::table('company_register')
                ->select('company_register.*')
                ->where('id', $ref_id)
                ->first();
            $mobile =  $data2->mobile;
        } else if ($role == "Consultancy") {
            $data2 = DB::table('consultancy_register')
                ->select('consultancy_register.*')
                ->where('id', $ref_id)
                ->first();
            $mobile =  $data2->mobile;
        } else if ($role == "Individual") {
            $data2 = DB::table('jobseeker_register')
                ->select('jobseeker_register.*')
                ->where('id', $ref_id)
                ->first();
            $mobile =  $data2->mobile;
        } else if ($role == "Subscriber") {
            $data2 = DB::table('subscriber_register')
                ->select('subscriber_register.*')
                ->where('id', $ref_id)
                ->first();
            $mobile =  $data1->mobile;
        } else {
            $data2 = DB::table('employee')
                ->select('employee.*')
                ->where('id', $ref_id)
                ->first();
            $mobile =  $data2->mobile;
        }
        return $mobile;
    }
    public function change_password(Request  $request)
    {
        $email = $request->email;

        $str = $request->password;
        $md5 = md5($str);
        $password = base64_encode($md5);
        date_default_timezone_set('Asia/Kolkata');
        $date = date("Y-m-d H:i:s");


        $user  = DB::table('login_master')
            ->where('email', $email)
            ->update(['password' => $password, 'updated_at' =>  $date]);
        return Response::json($user);
    }
    public function get_user_details($id)
    {
        $email = $id;
        $id = "";
        $data1 = DB::table('login_master')
            ->select('login_master.*')
            ->where('email', $email)
            ->first();

        Session::put('reference_id', $data1->ref_id);
        //  Session::flush();
        return Response::json($data1);
    }
    public function get_current_rights($id)
    {
        $ref_id = Session::get('refid');
        $role = Session::get('role');
        $sub_menu = $id;
        $data1 = DB::table('user_rights')
            ->select('user_rights.*', 'menu_master.sub_menu_name')
            ->join('menu_master', 'menu_master.id', '=', 'user_rights.menu_id')
            ->where('user_rights.ref_id', $ref_id)
            ->where('menu_master.sub_menu_name', $sub_menu)
            ->get();
        $cnt = count($data1);
        $return = 2;
        if ($cnt > 0) {
            $rights = "";
            foreach ($data1 as $val) {
                $rights = $val->user_rights;
            }

            $return = $rights;
        } else {
            $return = 2;
        }
        // dd($return);
        return Response::json($return);
    }
}