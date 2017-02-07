<?php

namespace App\Http\Controllers\Auth\web;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function userAuth(Request $request)
    {
        $credentials = $request->only('user_name', 'password', 'remember');

        if(Auth::attempt(['user_name' => $credentials['user_name'], 'password' => $credentials['password']], $credentials['remember'])){
          return redirect()->route('manager');
        }

        return back();


    }
}
