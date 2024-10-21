<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function register()
    {
        User::create(['id_key'=>'3','tg_id'=>'1114','tg_name'=>'nima']);
    }

    public function login()
    {
        $u =  User::where('id_key','3')->first();
        $token = $u->createToken('telegram');
        return response()->json(['token' => $token->plainTextToken]);
    }
    public function logout()
    {
        Auth::logout();
        return response()->json(['message' => 'Successfully logged out']);
    }
}
