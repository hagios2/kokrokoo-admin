<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    public function update(Request $request)
    {
        $admin=[
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'title'  => $request->input('title'),
            'phone' => $request->input('phone')
        ];

        User::whereAdmin_id(Auth()->user()->admin_id)->update($admin);
        $request->session()->flash('profile_edit', 'Admin profile successfully updated');

        return  redirect()->back();

    }

    public function updatePassword(){

    }

}
