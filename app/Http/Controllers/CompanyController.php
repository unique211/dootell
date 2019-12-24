<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect, Response;
use App\Login_master;
use App\Company_register;
use App\Transactions;
use Illuminate\Support\Facades\DB;
use Session;
use PaytmWallet;
use Illuminate\Support\Facades\Validator;


class CompanyController extends Controller
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
            return view('company_list', $data);
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
        $date = date('Y-m-d', strtotime($date1));
        $customer   =   Company_register::updateOrCreate(
            ['id' => $ID],
            [
                'date'       =>   $date,
                'contact_person'        =>  $request->contact_person_name,
                'package_id'        =>  $request->package_id,
                'mobile'        =>   $request->mobile,
                'company_name'        =>   $request->company_name,
                'industry_type'        =>   $request->industry_type,
                'company_address'        =>  $request->company_address,
                'city'        =>  $request->city,
                'reference'        =>  $request->reference,
                'logo'        =>  $request->filehidden1,

            ]

        );
        $ref_id = $customer->id;
        $str = $request->password;


        $packag_id = $request->package_id;

        $date2 = DB::table('package_list_master')
            ->select('package_list_master.*')
            ->where('package_list_master.id', $packag_id)
            ->first();
        $validity = $date2->package_validity;
        date_default_timezone_set('Asia/Kolkata');
        $date2 = date("Y-m-d");
        $date3 = date('Y-m-d', strtotime($date . ' + ' . $validity . ' days'));

        $role = "Company";
        if ($str != "") {
            $md5 = md5($str);
            $password = base64_encode($md5);
            $customer2   =   Login_master::updateOrCreate(
                ['ref_id' => $ref_id, 'role' => $role],
                [

                    'role'        =>   $role,
                    'email'        =>   $request->email,
                    'password'        =>    $password,
                    'expire_date'        =>    $date3,
                    'payment_status'        =>  0,
                ]

            );
        } else {
            $customer2   =   Login_master::updateOrCreate(
                ['ref_id' => $ref_id, 'role' => $role],
                [

                    'role'        =>   $role,
                    'email'        =>   $request->email,
                    'expire_date'        =>    $date3,

                ]

            );
        }
        if($ID==""){
            $where=array('role'=>$role,'ref_id'=>$ref_id);
            Login_master::where($where)->update(['payment_status' => 0]);
            Company_register::where('id',$ref_id)->update(['payment_status' => 0]);
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

        $customer = DB::table('company_register')
            ->select('company_register.*',  'login_master.email', 'login_master.password')
            ->join('login_master', 'login_master.ref_id', '=', 'company_register.id')
            ->where('login_master.role', 'Company')
            ->where('company_register.id', $id)
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
        $customer = Company_register::where('id', $id)->delete();
        $where = array('ref_id' => $id, 'role' => 'Company');
        $customer2 = Login_master::where($where)->delete();


        return Response::json($customer);
    }
    public function show_all()
    {
        $role = Session::get('role');
        // $user_id = Session::get('userid');
        $ref_id = Session::get('refid');

        if ($role == "Company") {
            $data = DB::table('company_register')
                ->select('company_register.*', 'login_master.email', 'login_master.expire_date', 'package_list_master.package_price')
                ->join('login_master', 'login_master.ref_id', '=', 'company_register.id')
                ->join('package_list_master', 'package_list_master.id', '=', 'company_register.package_id')
                ->where('login_master.role', 'Company')
                ->where('company_register.id', $ref_id)
                ->get();
        } else {
            $data = DB::table('company_register')
                ->select('company_register.*', 'login_master.email', 'login_master.expire_date', 'package_list_master.package_price')
                ->join('login_master', 'login_master.ref_id', '=', 'company_register.id')
                ->join('package_list_master', 'package_list_master.id', '=', 'company_register.package_id')
                ->where('login_master.role', 'Company')
                ->get();
        }


        return Response::json($data);
    }

    public function order(Request $request)
    {


        $id = $request->return_id;
        $role = "Company";
        $data = DB::table('company_register')
            ->select('company_register.*', 'package_list_master.package_validity', 'package_list_master.package_price', 'login_master.email')
            ->join('package_list_master', 'package_list_master.id', '=', 'company_register.package_id')
            ->join('login_master', 'login_master.ref_id', '=', 'company_register.id')
            ->where('login_master.role', $role)
            ->where('company_register.id', $id)
            ->first();





        //  $input = $data->all();
        //  $input['order_id'] = $data->mobile . rand(1, 100);
        //   $input['fee'] = $data->package_price;
        // $input['uer'] = 50;

        //  $input = $data;
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $input = substr(
            str_shuffle($str_result),
            0,
            10
        );
        //  $input =  rand(1, 100);
        //  $input['fee'] = 50;

        $payment_for = "Registration";
        //EventRegistration::create($input);

        $request->session()->put('payment_ref_id',  $id);
        $request->session()->put('payment_role',  $role);

        if ($data->package_price > 0) {

            $data1 = array(
                'ref_id' => $id,
                'role' => $role,
                'order_id' => $input,
                'transaction_id' => 0,
                'payment_for' => $payment_for,
                'status' => 0,
                'amount' => $data->package_price,
            );

            Transactions::create($data1);

            $payment = PaytmWallet::with('receive');
            $payment->prepare([
                'order' => $input,
                'user' => $data->mobile,
                'mobile_number' => $data->mobile,
                'email' => $data->email,
                'amount' => $data->package_price,
                'callback_url' => url('api/payment/status')
            ]);


            return $payment->receive();
        } else {
            $data1 = array(
                'ref_id' => $id,
                'role' => $role,
                'order_id' => $input,
                'transaction_id' => 0,
                'payment_for' => $payment_for,
                'status' => 2,
                'amount' => $data->package_price,
            );

            Transactions::create($data1);



            return redirect('update_payment_status_company');

        }

        //   dd($id);
        //  return Redirect::$payment->receive();
        //   return redirect()->$payment->receive();
    }


    /**
     * Obtain the payment information.
     *
     * @return Object
     */
    public function paymentCallback()
    {
        $transaction = PaytmWallet::with('receive');


        $response = $transaction->response();
        $order_id = $transaction->getOrderId();


        if ($transaction->isSuccessful()) {
            Transactions::where('order_id', $order_id)->update(['status' => 2, 'transaction_id' => $transaction->getTransactionId()]);

            return redirect('update_payment_status_company');

            // dd('Payment Successfully Paid.');
        } else if ($transaction->isFailed()) {
            Transactions::where('order_id', $order_id)->update(['status' => 1, 'transaction_id' => $transaction->getTransactionId()]);
            dd('Payment Failed.');
        }
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

            $dir = 'uploads/Company/logo';
            $filename = uniqid() . '_' . time() . '.' . $extension;

            // echo  dd($filename);
            $request->file('file')->move($dir, $filename);

            return $filename;
        }
    }
    public function change_company_payment_status(Request $request)
    {
        $id = Session::get('payment_ref_id');
        $role = Session::get('payment_role');

        $where=array('role'=>$role,'ref_id'=>$id);
        Login_master::where($where)->update(['payment_status' => 1]);
        Company_register::where('id',$id)->update(['payment_status' => 1]);

        $request->session()->forget('payment_ref_id');
        $request->session()->forget('payment_role');


        return redirect('/');
    }
}
