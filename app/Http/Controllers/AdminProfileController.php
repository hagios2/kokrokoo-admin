<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    
    public function __construction()
    {

        $this->middleware('auth:admin');
    
    }
    
    public function update(UpdateProfileRequest $request)
    {

        auth()->guard('admin')->user()->update($request->validated());

        return response()->json(['status' => 'updated']);

    }


    public function getAuthAdmin()
    {

       return auth()->guard('admin')->user();
    }


    public function updatePassword(ChangePasswordRequest $request)
    {
        $admin = auth()->guard('admin')->user();
        

        if(Hash::check($request->old_password, $admin->password))
        {
        
            $admin->update(['password' => Hash::make($request->new_password)]);

            return response()->json(['status' => 'updated']);
        }

        return response()->json(['status' => 'invalid password']);
      
    }

}
