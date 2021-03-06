<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect, Response;
use App\Login_master;
use App\Transactions;
use App\Cunsultancy_register;
use Session;
use PaytmWallet;

class Jobseeker_renew_Controller extends Controller
{
    public function order(Request $request)
    {


        $id = $request->return_id;
        $package_id = $request->package_id;
        $request->session()->put('package_id',  $package_id);

        $role = "Individual";
        $data2 =  DB::table('package_list_master')
            ->select('package_list_master.*')
            ->where('id', $package_id)
            ->first();

        $data = DB::table('jobseeker_register')
            ->select('jobseeker_register.*', 'login_master.email')
            ->join('login_master', 'login_master.ref_id', '=', 'jobseeker_register.id')
            ->where('login_master.role', $role)
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






        if ($data2->package_price > 0) {

            $data1 = array(
                'ref_id' => $id,
                'role' => $role,
                'order_id' => $input,
                'transaction_id' => 0,
                'payment_for' => $payment_for,
                'status' => 0,
                'amount' => $data2->package_price,
            );


            Transactions::create($data1);

            $payment = PaytmWallet::with('receive');
            $payment->prepare([
                'order' => $input,
                'user' => $data->mobile,
                'mobile_number' => $data->mobile,
                'email' => $data->email,
                'amount' => $data2->package_price,
                'callback_url' => url('api/payment/status_jobseeker2')
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
                'amount' => $data2->package_price,
            );


            Transactions::create($data1);

            return redirect('renew_jobseeker');
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
            return redirect('renew_jobseeker');

            //  dd('Payment Successfully Paid.');
        } else if ($transaction->isFailed()) {
            Transactions::where('order_id', $order_id)->update(['status' => 1, 'transaction_id' => $transaction->getTransactionId()]);
            dd('Payment Failed.');
        }
    }

    public function renew_jobseeker()
    {
        $package_id = Session::get('package_id');
        $reference_id = Session::get('reference_id');
        // dd($package_id . ',' . $reference_id);
        $date2 = DB::table('package_list_master')
            ->select('package_list_master.*')
            ->where('package_list_master.id', $package_id)
            ->first();

        $validity = $date2->package_validity;
        date_default_timezone_set('Asia/Kolkata');
        $date = date("Y-m-d");
        $date2 = date('Y-m-d', strtotime($date . ' + ' . $validity . ' days'));

        $set = array('expire_date' => $date2, 'payment_status' => 1);
        $result = DB::table('login_master')
            ->where('ref_id', $reference_id)
            ->where('role', 'Individual')
            ->update($set);

        $set1 = array('package_id' => $package_id, 'payment_status' => 1);
        $result2 = DB::table('jobseeker_register')
            ->where('id', $reference_id)
            ->update($set1);

        Session::flush();
        return redirect('/');
    }
}
