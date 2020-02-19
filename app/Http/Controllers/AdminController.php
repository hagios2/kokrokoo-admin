<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAdmin;
use App\Jobs\SendAdminCredentialsJob;
use App\Notifications\SendAdminCredentialsNotification;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use App\Classes\SendTextMessage;
use SendTextMessage as GlobalSendTextMessage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $users  = User::all();
            return datatables()->of($users)
                ->addColumn('action', function ($row) {
                    $btn = '<div class="btn-group btn-group-sm"> ';
                    $btn = $btn .  '<button data-toggle="tooltip"   data-id="' . $row->admin_id . '" data-original-title="Edit" class="edit btn btn-success btn-sm unblock-admin" id="' . $row->status . '"><i class="fa fa-unlock"></i></button>';
                    $btn = $btn . ' <button data-toggle="tooltip"  data-id="' . $row->admin_id . '" data-original-title="Delete" class="btn btn-danger btn-sm block-admin" id="' . $row->status . '"><i class="fa fa-lock"></i> </button>';
                    $btn = $btn . '</div';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return  view('admin.create_users.manage_admins');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create_users.create_admin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'title' => ['required'],
            'phone' => ['required', 'unique:kokrokoo_admins'],
            'email' => ['required', 'unique:kokrokoo_admins'],
        ]);



        if (Auth::user()->status ==  'active'  && Auth::user()->role == 'Super_admin') {
            $unique_id = uniqid('K', true);
            if (User::where('admin_id', '=', $unique_id)) {
                $unique_id = uniqid('K', true);
            }

            //generate password
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
            $password = substr(str_shuffle($chars), 0, 8);
            //$password =  '123456';


            $admin =   User::create([
                'admin_id' => $unique_id,
                'name' => $request->input('name'),
                'title' => $request->input('title'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'status' => 'active',
                'role' => $request->input('role'),
                'password' => Hash::make($password),
            ]);
            // send sms
            $sendMessage = new SendTextMessage();
            $sendMessage->message($request->input('name'), $request->input('email'), $password, config('app.sms_username'), config('app.sms_password'), $request->input('phone'));

            SendAdminCredentialsJob::dispatch($admin, $password);
            //  Notification::send($admin, new SendAdminCredentialsNotification($admin,$password));
            return redirect()->back()->with('admin-created', 'Admin  successfully created');
        } else {

            return redirect()->back()->with('not_super_admin', 'Sorry you do not have permission for this action');
        }
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
