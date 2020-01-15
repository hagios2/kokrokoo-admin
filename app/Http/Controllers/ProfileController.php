<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
    public function show()
    {
        $admin = User::select('name','email','title','phone')->where('admin_id', '=',Auth()->user()->admin_id)->get();
        $name = $admin[0]->name;
        $email = $admin[0]->email;
        $title  = $admin[0]->title;
        $phone  = $admin[0]->phone;
        return view('admin.AdminProfile.profile')->with(['name'=>$name,'email'=>$email,'title'=>$title,'phone'=>$phone]);


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
    public function update(Request $request)
    {
          $admin =  User::all()->where('admin_id','=',Auth()->user()->admin_id)->get();
          $admin->name = $request->input('name');
          $admin->email = $request->input('email');
          $admin->title  = $request->input('title');
          $admin->phone = $request->input('phone');
          $admin->save();
          return  redirect()->back()->with(['profile_edit','Admin profile successfully updated']);
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
