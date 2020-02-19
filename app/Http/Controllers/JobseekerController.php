<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect, Response;
use App\Login_master;
use App\Jobseeker_register;
use App\Jobseeker_experience;
use App\Transactions;
use Illuminate\Support\Facades\DB;
use PaytmWallet;
use Session;
use Illuminate\Support\Facades\Validator;

class JobseekerController extends Controller
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
            return view('jobseeker_list', $data);
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

        $date2 = strtr($request->dob, '/', '-');
        $date3 = date('Y-m-d', strtotime($date2));
        $applied_by = "Self";

        $customer   =   Jobseeker_register::updateOrCreate(
            ['id' => $ID],
            [
                'date'       =>   $date,
                'full_name'        =>  $request->full_name,
                'mobile'        =>  $request->mobile,
                'education'        =>    trim(strtoupper($request->education)),
                'course'        =>   $request->course,
                'specialization'        =>  trim(strtoupper($request->specialization)),
                'skill'        => trim(strtoupper($request->skill)),
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
                'reference'        =>  $request->reference,
                'profile_photo'        =>  $request->filehidden1,
                'resume_doc'        =>  $request->filehidden2,
                'package_id'        =>  $request->package_id,
                'email'        =>   $request->email,
                'int_job_location'        =>   trim(strtoupper($request->int_job_location)),
                'applied_by'        =>   $applied_by,
                'consultancy_id'        =>  0,

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

        $role = "Individual";
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
        $chk_exp = DB::table('jobseeker_experience')
            ->select('jobseeker_experience.*')
            ->where('role', 'Individual')
            ->where('ref_id', $ref_id)
            ->get();
        $cnt = count($chk_exp);
        if ($cnt > 0) {
            DB::table('jobseeker_experience')->where('ref_id', $ref_id)->where('role', 'Individual')->delete();
        }

        if($ID==""){
            $where=array('role'=>$role,'ref_id'=>$ref_id);
            Login_master::where($where)->update(['payment_status' => 0]);
            Jobseeker_register::where('id',$ref_id)->update(['payment_status' => 0]);
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
            ->select('jobseeker_register.*',   'login_master.password')
            ->join('login_master', 'login_master.ref_id', '=', 'jobseeker_register.id')
            ->where('login_master.role', 'Individual')
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
        $customer2 = Login_master::where($where)->delete();
        $customer3 = Jobseeker_experience::where($where)->delete();


        return Response::json($customer);
    }
    public function uploadingfile_profile(Request $request)
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

            $dir = 'uploads/Jobseeker/profile/';
            $filename = uniqid() . '_' . time() . '.' . $extension;

            // echo  dd($filename);
            $request->file('file')->move($dir, $filename);

            return $filename;
        }
    }
    public function uploadingfile_resume(Request $request)
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

            $dir = 'uploads/Jobseeker/resume/';
            $filename = uniqid() . '_' . time() . '.' . $extension;

            // echo  dd($filename);
            $request->file('file')->move($dir, $filename);

            return $filename;
        }
    }
    public function uploadingfile_document(Request $request)
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

            $dir = 'uploads/Jobseeker/document/';
            $filename = uniqid() . '_' . time() . '.' . $extension;

            // echo  dd($filename);
            $request->file('file')->move($dir, $filename);

            return $filename;
        }
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
        $applied_by = "Self";




        $role = Session::get('role');
        // $user_id = Session::get('userid');
        $ref_id = Session::get('refid');

        if ($role == "Individual") {
            $data = DB::table('jobseeker_register')
                ->select('jobseeker_register.*', 'login_master.expire_date', 'package_list_master.package_price')
                ->join('login_master', 'login_master.ref_id', '=', 'jobseeker_register.id')

                ->join('package_list_master', 'package_list_master.id', '=', 'jobseeker_register.package_id')
                ->where('login_master.role', 'Individual')
                ->where('applied_by', $applied_by)
                ->where('jobseeker_register.id', $ref_id)
                ->get();
        } else {
            $data = DB::table('jobseeker_register')
                ->select('jobseeker_register.*', 'login_master.expire_date', 'package_list_master.package_price')
                ->join('login_master', 'login_master.ref_id', '=', 'jobseeker_register.id')

                ->join('package_list_master', 'package_list_master.id', '=', 'jobseeker_register.package_id')
                ->where('login_master.role', 'Individual')
                ->where('applied_by', $applied_by)
                ->get();
        }
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

    public function order(Request $request)
    {
        $id = $request->return_id;

        $data = DB::table('jobseeker_register')
            ->select('jobseeker_register.*', 'package_list_master.package_validity', 'package_list_master.package_price')
            ->join('package_list_master', 'package_list_master.id', '=', 'jobseeker_register.package_id')
            ->where('jobseeker_register.id', $id)
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
        $role = "Individual";
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
                'callback_url' => url('api/payment/status_jobseeker')
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
            return redirect('update_payment_status_jobseeker');
           // return redirect('/');
        }
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
            return redirect('update_payment_status_jobseeker');
            //return redirect('/');
            // dd('Payment Successfully Paid.');
        } else if ($transaction->isFailed()) {
            Transactions::where('order_id', $order_id)->update(['status' => 1, 'transaction_id' => $transaction->getTransactionId()]);
            dd('Payment Failed.');
        }
    }

    public function change_jobseeker_payment_status(Request $request)
    {
        $id = Session::get('payment_ref_id');
        $role = Session::get('payment_role');

        $where=array('role'=>$role,'ref_id'=>$id);
        Login_master::where($where)->update(['payment_status' => 1]);
        Jobseeker_register::where('id',$id)->update(['payment_status' => 1]);

        $request->session()->forget('payment_ref_id');
        $request->session()->forget('payment_role');


        return redirect('/');
    }
}
