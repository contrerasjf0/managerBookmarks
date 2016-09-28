<?php

namespace App\Http\Controllers\Auth\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Http\Requests\Api\User\RegisterRequest;

class RegisterUserController extends Controller
{
	public function store(RegisterRequest $request){
		$user = new User;

		$user->name = $request->get('name');
		$user->last_name = $request->get('last_name');
		$user->user_name = $request->get('user_name');
		$user->email = $request->get('email');
		$user->pleasures = $request->get('pleasures');
		$user->password = $request->get('password');

		$user->save();

		return response()->json([
				'status' => '201',
				'id' => $user->id,
				'message' => 'User created',
			]);
	}
}
