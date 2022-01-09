<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request){
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $user = $this->newUser($request->all());

        if(empty($user)){
            return response([
                'message' => 'Failed to create account'
            ]);
        } else {
            return response([
                'message' => 'Account created, please verify email'
            ]);
        }
    }

    private function newUser(array $data){
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            // 'role_id' => 3,
            // 'activation_token' => Str::random(20),
        ]);
    }
}
