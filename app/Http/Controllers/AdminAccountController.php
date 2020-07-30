<?php

namespace App\Http\Controllers;

use App\Events\AcceptUserEvent;
use App\User;
use App\Client;
use Illuminate\Http\Request;
use App\Http\Resources\ClientResource;
use App\Http\Resources\MediaAdminResource;

class AdminAccountController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    
    public function fetchNewAccounts()
    {

        #fetch new registered accounts to approve

        $client = Client::where([['role', 'super_admin'], ['isActive', 'pending']])->get();

        $media_admin = User::where([['role', 'super_admin'], ['isActive', 'pending']])->get();

        return response()->json(['clients' => ClientResource::collection($client), 'media' => MediaAdminResource::collection($media)]);
    }


    public function blockClientAccount(Client $client)
    {

        $client->update(['isActive' => 'active']);

        return response()->json(['status' => 'account activated']);

    }



    public function unBlockClientAccount(Client $client)
    {

        $client->update(['isActive' => 'inactive']);

        return response()->json(['status' => 'account activated']);

    }


    public function blockMediaAccount(User $user)
    {
        $user->update(['isActive' => 'active']);

        return response()->json(['status' => 'account activated']);
    }



    public function unBlockMediaAccount(User $user)
    {

        $user->update(['isActive' => 'inactive']);

        return response()->json(['status' => 'account activated']);
    }


  /*   public function blockUser(Request $request){
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
    } */


}
