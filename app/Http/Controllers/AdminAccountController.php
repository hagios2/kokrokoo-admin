<?php

namespace App\Http\Controllers;

use App\Events\AcceptUserEvent;
use App\Jobs\ClientActivationJob;
use App\Jobs\MediaActivationJob;
use App\Mail\ClientActivationMail;
use App\Mail\ClientRejectionMail;
use App\Mail\MediaActivationMail;
use App\Mail\MediaRejectionMail;
use App\Models\Role;
use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Resources\ClientResource;
use App\Http\Resources\MediaAdminResource;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

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

    public function activateClient(Client $client)
    {
        $client->update(['isActive' => 'active']);

        ClientActivationJob::dispatch($client);

        Mail::to($client)->send(new ClientActivationMail($client));

        return response()->json(['status' => 'account activated']);
    }

    public function rejectClient(client $client)
    {
        if($client->role->role == 'super_admin' && $client->company)
        {
            $avatar = $client->company->avatar;

            $path = '/var/www/html/uploads/';

            Storage::disk('local')->delete($path.$avatar->logo);

            $client->company->delete();
        }

        $msg = "Hello {$client->name}, We are sorry your registration to Kokrokoo has been rejected. Kindly contact support@kokrokooad.com for further clarifications.";

        $this->sendSms($client->name, $client->phone1, $msg);

        Mail::to($client)->send(new ClientRejectionMail($client));

        $client->delete();

        return response()->json(['message' => 'client deleted']);
    }


    public function activateMedia(User $user)
    {
        $user->update(['isActive' => 'active']);

        ///MediaActivationJob::dispatch($user);

        Mail::to($user)->send(new MediaActivationMail($user));

        return response()->json(['status' => 'account activated']);
    }

    public function rejectMedia(User $user)
    {
        if($user->role->role == 'super_admin')
        {
            $company = $user->company;

            $avatar = $company->avatar;

            $path = '/var/www/html/uploads/';

            Storage::disk('local')->delete($path.$avatar->logo);

            $avatar->delete();

            Storage::disk('local')->delete($path.$company->business_cert);

            if($company)
            {
                Storage::disk('local')->delete($path.$company->operation_cert);
            }

            $company->delete();

        }


        $msg = "Hello {$user->name}, We are sorry your registration to Kokrokoo has been rejected. Kindly contact support@kokrokooad.com for further clarifications.";

        $this->sendSms($user->name, $user->phone1, $msg);

        Mail::to($user)->send(new MediaRejectionMail($user));

        $user->delete();

        return response()->json(['message' => 'client deleted']);
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
