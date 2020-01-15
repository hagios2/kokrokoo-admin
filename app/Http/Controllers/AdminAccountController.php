<?php

namespace App\Http\Controllers;

use App\Events\AcceptUserEvent;
use App\User;
use Illuminate\Http\Request;

class AdminAccountController extends Controller
{
    //

    public function blockUser(Request $request){
        $user  = User::all()->where('admin_id','=',$request->input('id'))->first();

        $user->status = 'inactive';
        $user->save();
        $request->session()->flash('admin-status', 'Admin  successfully  blocked');

        return response()->json('success');
    }

    public function unblockUser(Request $request){
        $user  = User::all()->where('admin_id','=',$request->input('id'))->first();
        $user->status = 'active';
        $user->save();
        $request->session()->flash('admin-status', 'Admin  successfully  unblocked');

        return response()->json('success');
    }
}
