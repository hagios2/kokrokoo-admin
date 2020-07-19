<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\Request;

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


    public function updatePassword(){

    }

}
