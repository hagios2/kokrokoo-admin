<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()) {
            $users  = User::all();
            return datatables()->of($users)
                ->addColumn('action', function($row){
                    $btn = '<div class="btn-group btn-group-sm"> ';
                    $btn =$btn.  '<button data-toggle="tooltip"    data-id="'.$row->client_id.'" data-original-title="Edit" class="edit btn btn-success btn-sm accept-user" id="'.$row->isActive.'"><i class="fa fa-check"></i></button>';
                    $btn = $btn.' <button data-toggle="tooltip"  data-id="'.$row->client_id.'" data-original-title="Delete" class="btn btn-primary btn-sm unblock-user"  id="'.$row->isActive.'"><i class="fa fa-unlock"></i> </button>';
                    $btn = $btn.' <button data-toggle="tooltip"  data-id="'.$row->client_id.'" data-original-title="Delete" class="btn btn-danger btn-sm block-user"  id="'.$row->isActive.'"><i class="fa fa-lock"></i> </button>';
                    $btn = $btn . '</div';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
       return  view('admin.users.users');
    }

    /**
     * Display a listing of the new users resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function newUsers(){

        if(request()->ajax()) {
            $users  = User:: all('account_type')->where('account_type','=','personal')->get();
            die($users);

            return datatables()->of($users)
                ->addColumn('action', function($row){
                    $btn = '<div class="btn-group btn-group-sm"> ';
                    $btn =$btn.  '<button data-toggle="tooltip"  data-id="'.$row->client_id.'" data-original-title="Edit" class="edit btn btn-success btn-sm accept-user" id="accept-users"><i class="fa fa-check"></i></button>';
                    $btn = $btn.' <button data-toggle="tooltip"  data-id="'.$row->client_id.'" data-original-title="Delete" class="btn btn-primary btn-sm unblock-user"><i class="fa fa-unlock"></i> </button>';
                    $btn = $btn.' <button data-toggle="tooltip"  data-id="'.$row->client_id.'" data-original-title="Delete" class="btn btn-danger btn-sm block-user"><i class="fa fa-lock"></i> </button>';
                    $btn = $btn . '</div';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.users.new_users');
    }

    /**
     * Display a listing of the  org. users resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function orgUsers(){
        return view('admin.users.org_users');
    }

    /**
     * Display a listing of the personal users resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function personalUsers(){
        return view('admin.users.personal_users');
    }

    /**
     * Display a listing of the media house resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mediaHouse(){
        return view('admin.users.media_house');
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
}
