<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect, Response;
use App\Subscribed_Groups;
use App\Login_master;
use App\Transactions;
use Session;
use PaytmWallet;

class Subscribe_groupsController extends Controller
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
            return view('subscribe_groups');
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
    { }

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
        $customer = Subscribed_Groups::where('id', $id)->delete();
        return Response::json($customer);
    }

    public function show_all()
    {
        $role = Session::get('role');
        // $user_id = Session::get('userid');
        $ref_id = Session::get('refid');


        $data = DB::table('subscribed_groups')
            ->select('subscribed_groups.*', 'groups.group_name', 'groups.subject', 'groups.image')
            ->join('groups', 'groups.id', '=', 'subscribed_groups.group_id')
            ->where('subscriber_id', $ref_id)
            ->get();



        return Response::json($data);
    }
    public function show_all2()
    {
        $ref_id = Session::get('refid');

        $data = DB::table('groups')
            ->select('groups.*')
            ->whereNOTIn('id', function ($query) use ($ref_id) {
                $query->select('group_id')->from('subscribed_groups')->where('subscriber_id', $ref_id);
            })
            ->get();

        return Response::json($data);
    }
    public function add_subscribe_group(Request $request)
    {
        $ref_id = Session::get('refid');

        $data = array(
            'group_id'        =>   $request->id,
            'amount'        =>   $request->amount,
            'subscriber_id'        =>   $ref_id,

        );
        $result =  DB::table('subscribed_groups')
            ->Insert($data);

        return Response::json($result);
    }

    public function get_notification($id)
    {
        $data1 = DB::table('posts')
            ->select('posts.*', 'groups.group_name', DB::raw('DATE_FORMAT(posts.date, "%d/%m/%Y") as new_date'))
            ->join('groups', 'groups.id', '=', 'posts.group_id')
            ->where('group_id', $id)
            ->orderBy('date', 'DESC')
            ->get();
        // $data = DB::table('posts')
        //     ->select('posts.*')
        //     ->where('group_id', $id)
        //     ->get();

        $data2 = "";
        $result = array();



        $cnt1 = count($data1);
        $data['notification'] = null;

        if ($cnt1 > 0) {

            foreach ($data1 as $value) {
                $group_id = $value->group_id;
                $post_id = $value->id;


                date_default_timezone_set('Asia/Kolkata');
                $date = date("Y-m-d H:i:s");

                $data2 = DB::table('group_comment')
                    ->select('group_comment.*', 'subscriber_register.name', DB::raw('DATE_FORMAT(group_comment.updated_at, "%d %M,%Y") as comment_date'))
                    ->join('subscriber_register', 'subscriber_register.id', '=', 'group_comment.user_id')
                    ->where('group_comment.group_id', $group_id)
                    ->where('group_comment.post_id', $post_id)
                    ->orderBy('group_comment.updated_at', 'desc')
                    ->get();
                $cnt2 = count($data2);
                $abc = null;
                if ($cnt2 > 0) {
                    $abc = $data2;
                } else {
                    $abc = null;
                }
                $result[] = array(
                    'id' => $value->id,
                    'group_id' => $value->group_id,
                    'group_name' => $value->group_name,
                    'title' => $value->title,
                    'new_date' => $value->new_date,
                    'image' => $value->image,
                    'description' => $value->description,
                    'comments' => $abc,

                );
            }
            $data['notification'] = $result;
            $data['date'] = $result;
        } else {
            $data['notification'] = null;
        }


        return view('notification2', $data);
    }
    public function add_comment(Request $request)
    {
        $ref_id = Session::get('refid');
        $group_id = $request->group_id;
        $post_id = $request->post_id;
        $comment = $request->comment;

        date_default_timezone_set('Asia/Kolkata');
        $date = date("Y-m-d H:i:s");

        $data = array(
            'group_id'        =>   $group_id,
            'post_id'        =>   $post_id,
            'comment'        =>   $comment,
            'user_id'        =>   $ref_id,
            'created_at'        =>   $date,
            'updated_at'        =>   $date,

        );
        $result =  DB::table('group_comment')
            ->Insert($data);

        return Response::json($result);
    }

    public function get_comment(Request $request)
    {
        $ref_id = Session::get('refid');
        $group_id = $request->group_id;
        $post_id = $request->post_id;


        date_default_timezone_set('Asia/Kolkata');
        $date = date("Y-m-d H:i:s");

        $data = DB::table('group_comment')
            ->select('group_comment.*')
            ->where('group_id', $group_id)
            ->where('post_id', $post_id)
            ->get();


        return Response::json($data);
    }
    public function order(Request $request)
    {

        $id = Session::get('refid');
        $amount =  $request->return_id;
        $group_id =  $request->group_id;






        $request->session()->put('group_id',  $group_id);
        $request->session()->put('amount',  $amount);
        // $id = $request->return_id;
        $role = "Subscriber";
        $data = DB::table('subscriber_register')
            ->select('subscriber_register.*', 'login_master.email')
            ->join('login_master', 'login_master.ref_id', '=', 'subscriber_register.id')
            ->where('login_master.role', $role)
            ->where('subscriber_register.id', $id)
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
        // $role = "Subscriber";
        $payment_for = "Subscription";
        //EventRegistration::create($input);

        if ($amount > 0) {
            $data1 = array(
                'ref_id' => $id,
                'role' => $role,
                'order_id' => $input,
                'transaction_id' => 0,
                'payment_for' => $payment_for,
                'status' => 0,
                'amount' => $amount,
            );


            Transactions::create($data1);

            $payment = PaytmWallet::with('receive');
            $payment->prepare([
                'order' => $input,
                'user' => $data->mobile,
                'mobile_number' => $data->mobile,
                'email' => $data->email,
                'amount' => $amount,

                'callback_url' => url('api/payment/status_subscribe')
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
                'amount' => $amount,
            );


            Transactions::create($data1);
            return redirect('save_group');
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

            return redirect('save_group');
        } else if ($transaction->isFailed()) {
            Transactions::where('order_id', $order_id)->update(['status' => 1, 'transaction_id' => $transaction->getTransactionId()]);
            dd('Payment Failed.');
        }
    }
    public function add_subscribe_group2()
    {
        $group_id = Session::get('group_id');
        $ref_id = Session::get('refid');
        $amount = Session::get('amount');
        $data = array(
            'group_id'        =>   $group_id,
            'amount'        =>   $amount,
            'subscriber_id'        =>   $ref_id,

        );
        $result =  DB::table('subscribed_groups')
            ->Insert($data);
        return redirect('subscribe_group');
    }
}