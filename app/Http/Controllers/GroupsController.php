<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect, Response;
use App\Groups;
use Session;
use Illuminate\Support\Facades\Validator;



class GroupsController extends Controller
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
            return view('groups', $data);
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

        $amount = 0;
        $group_amt = $request->amount;
        if ($group_amt == "") {
            $amount = 0;
        } else {
            $amount = $group_amt;
        }

        $customer   =   Groups::updateOrCreate(
            ['id' => $ID],
            [
                'group_name'        =>  $request->group_name,
                'subject'        =>  $request->subject,
                'amount'        =>  $amount,
                'image'        =>  $request->filehidden1,
                'user_id'        =>  $company_id,

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
        $customer  = Groups::where($where)->first();

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
        $customer = Groups::where('id', $id)->delete();
        return Response::json($customer);
    }
    public function show_all()
    {
        $role = Session::get('role');
        // $user_id = Session::get('userid');
        $ref_id = Session::get('refid');
        $result = array();
        if ($role == "Group_Admin") {

            $data1 = DB::table('employee')
                ->select('employee.*')
                ->where('id', $ref_id)
                ->get();

            foreach ($data1 as $val) {
                $grp = $val->groups_id;
                $tmp = explode(',', $grp);

                // $itmp = implode(",", $tmp);
                // $st = "(" . $itmp . ")";
                $data2 = DB::table('groups')
                    ->select('groups.*')
                    ->whereIn('id', $tmp)
                    ->get();
                $result = $data2;
            }
        } else {
            $data = DB::table('groups')
                ->select('groups.*')
                ->get();
            $result = $data;
        }





        return Response::json($result);
    }
    public function uploadingfile_group(Request $request)
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

            $dir = 'uploads/groups';
            $filename = uniqid() . '_' . time() . '.' . $extension;

            // echo  dd($filename);
            $request->file('file')->move($dir, $filename);

            return $filename;
        }
    }
}