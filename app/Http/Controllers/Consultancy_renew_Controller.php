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

class Consultancy_renew_Controller extends Controller
{
    public function order(Request $request)
    {


        $id = $request->return_id;
        $package_id = $request->package_id;
        $request->session()->put('package_id',  $package_id);

        $role = "Consultancy";
        $data2 =  DB::table('package_list_master')
            ->select('package_list_master.*')
            ->where('id', $package_id)
            ->first();

        $data = DB::table('consultancy_register')
            ->select('consultancy_register.*', 'login_master.email')
            ->join('login_master', 'login_master.ref_id', '=', 'consultancy_register.id')
            ->where('login_master.role', $role)
            ->where('consultancy_register.id', $id)
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
        $role = "Consultancy";
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
                'callback_url' => url('api/payment/status_consultancy2')
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

            return redirect('renew_consultancy');
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
            return redirect('renew_consultancy');

            //  dd('Payment Successfully Paid.');
        } else if ($transaction->isFailed()) {
            Transactions::where('order_id', $order_id)->update(['status' => 1, 'transaction_id' => $transaction->getTransactionId()]);
            dd('Payment Failed.');
        }
    }

    public function renew_consultancy()
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
        $result = DB::table('login_master')
            ->where('ref_id', $reference_id)
            ->where('role', 'Consultancy')
            ->update(['expire_date' => $date2]);
        $result2 = DB::table('consultancy_register')
            ->where('id', $reference_id)
            ->update(['package_id' => $package_id]);

        Session::flush();

        return redirect('/');
    }
}