<?php

namespace App\Http\Controllers;

use App\Models\UserVehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserVehicleController extends Controller
{
    public function index()
    {
        return UserVehicle::with('vehicle')->where('user_id',auth()->user()->id)->get();
    }

}
