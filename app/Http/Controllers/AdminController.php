<?php

namespace App\Http\Controllers;

use App\Http\Resources\ActivatedClientResource;
use App\Http\Resources\ActivatedMediaResource;
use App\Http\Resources\ClientDetailResource;
use App\Http\Resources\MediaDetailResource;
use App\Http\Resources\NewMediaGroupResource;
use App\Mail\ClientActivationMail;
use App\Mail\NewMediaHouseMail;
use App\Mail\NewMediaHouseRejectionMail;
use App\MediaGroup;
use App\Models\Client;
use App\Models\Company;
use App\Models\Role;
use App\Models\User;
use \App\Services\SendTextMessage;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Mail;


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

    public function newMediaGroup()
    {
        $companies = Company::query()->where([['company_type', 'media_company'], ['reviewed', false]])->paginate(10);

        return new NewMediaGroupResource($companies);
    }


    public function approvedMediaGroup()
    {
        $companies = Company::query()->where([['company_type', 'media_company'], ['reviewed', true]])->paginate(10);

        return new NewMediaGroupResource($companies);
    }

    public function acceptNewMediaHouse(Company $company)
    {
        $company->update(['reviewed' => true]);

        $media_group = MediaGroup::query()->where('company_id', $company->id)->first();

        $user = User::find($media_group->user_id);

        $sendMsg = new SendTextMessage(env("SMS_USERNAME"), env("SMS_PASSWORD"));

        $msg = "Hello {$user->name}, Congratulations on your successful registration to Kokrokoo. You may proceed to access your account!";

        $sendMsg->sendSms($user->name, $user->phone1, $msg);

        Mail::to($user)->send(new NewMediaHouseMail($company));

        Mail::to($company->company_email)->send(new NewMediaHouseMail($company));

        return response()->json(['message' => 'account has been accepted']);
    }

    public function rejectNewMediaHouse(Company $company)
    {
        $sendMsg = new SendTextMessage(env("SMS_USERNAME"), env("SMS_PASSWORD"));

        $media_group = MediaGroup::query()->where('company_id', $company->id)->first();

        $user = User::find($media_group->user_id);

        $msg = "Hello {$user->name}, Your registration has been rejected and you have been unsuccessfully in adding a New Media House to your account. Kindly contact us via support@kokrokooad.com for further clarifications.Thank you!";

        $sendMsg->sendSms($user->name, $user->phone1, $msg);

        Mail::to($user)->send(new NewMediaHouseRejectionMail($company));

        Mail::to($company->company_email)->send(new NewMediaHouseRejectionMail($company));

        $company->delete();

        return response()->json(['message' => 'account has been accepted']);
    }

    public function fetchBankDetail(Company $company)
    {

    }

}
