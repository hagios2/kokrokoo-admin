<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function logout()
    {
        $token = auth()->guard('admin')->user()->token();

        $token->revoke();

        return response()->json(['status' => 'logout success']);

    }
}
