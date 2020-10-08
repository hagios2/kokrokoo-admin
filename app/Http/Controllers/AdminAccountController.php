<?php

namespace App\Http\Controllers;

use App\Events\AcceptUserEvent;
use App\Models\Role;
use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Resources\ClientResource;
use App\Http\Resources\MediaAdminResource;

class AdminAccountController extends Controller
{

    public function __construct()
    {
        $this->middleware('isSuperAdmin');
    }


    public function fetchNewClientAccounts()
    {
        #fetch new registered accounts to approve

        $role = Role::where('role', 'super_admin')->first();

        $client = Client::where([['role_id', $role->id], ['isActive', 'pending']])->get();

        return ClientResource::collection($client);
    }

    public function fetchNewMediaAccounts()
    {

        #fetch new registered accounts to approve

        $role = Role::where('role', 'super_admin')->first();

        $media_admin = User::where([['role_id', $role->id], ['isActive', 'pending']])->get();

        return MediaAdminResource::collection($media_admin);
    }




    public function blockClientAccount(Client $client)
    {

        $client->update(['isActive' => 'inactive']);

        return response()->json(['status' => 'account deactivated']);

    }



    public function unBlockClientAccount(Client $client)
    {

        $client->update(['isActive' => 'active']);

        return response()->json(['status' => 'account activated']);

    }


    public function blockMediaAccount(User $user)
    {
        $user->update(['isActive' => 'inactive']);

        return response()->json(['status' => 'account deactivated']);
    }



    public function unBlockMediaAccount(User $user)
    {

        $user->update(['isActive' => 'active']);

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
