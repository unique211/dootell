<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect, Response;
use App\Posts;
use Session;
use Illuminate\Support\Facades\Validator;



class PostsController extends Controller
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
            return view('posts', $data);
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
        $user_id = $request->session()->get('refid');


        $date1 = strtr($request->date, '/', '-');
        $date = date('Y-m-d', strtotime($date1));

        $customer   =   Posts::updateOrCreate(
            ['id' => $ID],
            [
                'date'        =>  $date,
                'group_id'        =>  $request->group_name,
                'title'        => $request->title,
                'description'        =>  $request->description,
                'image'        =>  $request->filehidden1,
                'user_id'        =>  $user_id,
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
        $customer  = Posts::where($where)->first();

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
        $customer = Posts::where('id', $id)->delete();
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


                $data = DB::table('posts')
                    ->select('posts.*', 'groups.group_name')
                    ->join('groups', 'groups.id', '=', 'posts.group_id')
                    ->whereIn('groups.id', $tmp)
                    ->get();
                $result = $data;
            }
        } else {
            $data = DB::table('posts')
                ->select('posts.*', 'groups.group_name')
                ->join('groups', 'groups.id', '=', 'posts.group_id')
                ->get();
            $result = $data;
        }






        return Response::json($result);
    }

    public function uploadingfile_post(Request $request)
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

            $dir = 'uploads/posts';
            $filename = uniqid() . '_' . time() . '.' . $extension;

            // echo  dd($filename);
            $request->file('file')->move($dir, $filename);

            return $filename;
        }
    }
}