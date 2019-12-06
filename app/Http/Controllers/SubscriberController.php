<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect, Response;
use App\Login_master;
use App\Subscriber_register;
use Illuminate\Support\Facades\DB;
use Session;

class SubscriberController extends Controller
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
            return view('subscriber_list', $data);
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
        // $user_id = $request->session()->get('userid');

        //  $image = $request->file('image');

        // $new_name = rand() . '.' . $image->getClientOriginalExtension();
        // $image->move(public_path('images'), $new_name);


        $date1 = strtr($request->date, '/', '-');
        $date = date('Y-m-d', strtotime($date1)); //should be course_date
        $customer   =   Subscriber_register::updateOrCreate(
            ['id' => $ID],
            [
                'date'       =>   $date,
                'name'        =>  $request->full_name,
                'mobile'        =>   $request->mobile,
                'address'        =>   $request->address,
                'aadhar'        =>   $request->aadhar,



            ]

        );
        $ref_id = $customer->id;
        $str = $request->password;

        $role = "Subscriber";
        if ($str != "") {
            $md5 = md5($str);
            $password = base64_encode($md5);
            $customer2   =   Login_master::updateOrCreate(
                ['ref_id' => $ref_id, 'role' => $role],
                [

                    'role'        =>   $role,
                    'email'        =>   $request->email,
                    'password'        =>    $password,

                ]

            );
        } else {
            $customer2   =   Login_master::updateOrCreate(
                ['ref_id' => $ref_id, 'role' => $role],
                [

                    'role'        =>   $role,
                    'email'        =>   $request->email,

                ]

            );
        }

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
        $customer = DB::table('subscriber_register')
            ->select('subscriber_register.*',  'login_master.email', 'login_master.password')
            ->join('login_master', 'login_master.ref_id', '=', 'subscriber_register.id')
            ->where('login_master.role', 'Subscriber')
            ->where('subscriber_register.id', $id)
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
        $customer = Subscriber_register::where('id', $id)->delete();
        $where = array('ref_id' => $id, 'role' => 'Subscriber');
        $customer2 = Login_master::where($where)->delete();


        return Response::json($customer);
    }
    public function show_all()
    {

        $ref_id = Session::get('refid');
        $role = Session::get('role');

        if ($role == "Subscriber") {
            $data = DB::table('subscriber_register')
                ->select('subscriber_register.*', 'login_master.email')
                ->join('login_master', 'login_master.ref_id', '=', 'subscriber_register.id')
                ->where('role', 'Subscriber')
                ->where('subscriber_register.id', $ref_id)
                ->get();
        } else {
            $data = DB::table('subscriber_register')
                ->select('subscriber_register.*', 'login_master.email')
                ->join('login_master', 'login_master.ref_id', '=', 'subscriber_register.id')
                ->where('role', 'Subscriber')
                ->get();
        }



        //   ->join('customer_master', 'customer_master.id', '=', 'customers.name')


        // $data = Customer_master::orderBy('id', 'asc')->get();
        return Response::json($data);
    }
}