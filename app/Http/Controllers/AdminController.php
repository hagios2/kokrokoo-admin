<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAdmin;
use App\Http\Resources\ActivatedClientResource;
use App\Http\Resources\ActivatedMediaResource;
use App\Http\Resources\ClientDetailResource;
use App\Http\Resources\MediaDetailResource;
use App\Jobs\SendAdminCredentialsJob;
use App\Models\Client;
use App\Models\Company;
use App\Models\Role;
use App\Notifications\SendAdminCredentialsNotification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use App\Classes\SendTextMessage;
use SendTextMessage as GlobalSendTextMessage;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('adminApiAuth');
    }


    public function activatedClient()
    {
        $client = Client::where('isActive', '!=', 'pending')->paginate(20);

        return new ActivatedClientResource($client);
    }


    public function activatedMedia()
    {
        $client = User::where('isActive', '!=', 'pending')->with('company')->paginate(20);

        return new ActivatedMediaResource($client);
    }


    public function viewClient(Client $client)
    {
        return new ClientDetailResource($client);
    }



    public function viewMedia(User $user)
    {
        return new MediaDetailResource($user);
    }

    public function fetchBankDetail(Company $company)
    {

    }

}
