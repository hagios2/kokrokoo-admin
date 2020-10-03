<?php

namespace App\Http\Controllers;

use App\Events\AcceptUserEvent;
use App\Events\BlockUserEvent;
use App\Events\UnblockUserEvent;
use App\Jobs\AcceptUserMailJob;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserAccountController extends Controller
{
    //
    public function acceptUser(Request $request){
        $user  = User::all()->except('password','name','phone1','phone2')->where('client_id','=',$request->input('id'))->first();
        $user->isActive = 'active';
        $user->save();
        \event(new AcceptUserEvent($user));

        $request->session()->flash('approve-user', 'User  successfully  approved');


        return  response()->json('success');
    }

    public function blockUser(Request $request){
        $user  = User::all()->except('password','name','phone1','phone2')->where('client_id','=',$request->input('id'))->first();

        $user->isActive = 'inactive';
        $user->save();

        $request->session()->flash('approve-user', 'User successfully  blocked');


        return  response()->json('success');
    }

    public function unblockUser(Request $request){
        $user  = User::all()->except('password','name','phone1','phone2')->where('client_id','=',$request->input('id'))->first();
        $user->isActive = 'active';
        $user->save();
        $request->session()->flash('approve-user', 'Successfully  successfully  unblocked');

        return  response()->json('success');
    }


}
