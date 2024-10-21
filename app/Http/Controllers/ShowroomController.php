<?php

namespace App\Http\Controllers;

use App\Models\Showroom;
use App\Models\User;
use App\Models\UserVehicle;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class ShowroomController extends Controller
{
    public function index()
    {
        return Showroom::with('vehicle')->get();
    }

    public function sellCancel(Request $request)
    {
        $showroom = Showroom::where('vehicle_id',$request->vehicle_id)
            ->where('from_user_id',auth()->user()->id)
            ->first();
        if(!$showroom instanceof Showroom)
            return response()->json(['success' => false]);

        $showroom->delete();

        $userVehicle = new UserVehicle();
        $userVehicle->user_id = auth()->user()->id;
        $userVehicle->vehicle_id = $showroom->vehicle_id;
        $userVehicle->showroom_id = $showroom->id;
        $userVehicle->save();
        return response()->json(['success' => true]);
    }

    public function sell(Request $request)
    {
        $userVehicle = UserVehicle::where('vehicle_id',$request->vehicle_id)
            ->where('user_id',auth()->user()->id)
            ->first();
        //delete user vehicle
        $userVehicle->delete();
        //add to showroom
        $showroom = new Showroom();
        $showroom->vehicle_id = $userVehicle->vehicle_id;
        $showroom->from_user_id = $userVehicle->user_id;
        $showroom->to_user_id = null;
        $showroom->price = $request->price;
        $showroom->save();

        return response()->json(['success' => true]);
    }

    public function buy(Request $request)
    {
        $showroom =  Showroom::where('id', $request->showroom_id)->first();
        if(!$showroom instanceof Showroom)
            return response()->json(['success' => false]);

        //reduce balance for to user
        //todo
        //add balance for from user
        //todo

        //assign vehicle to user
        $userVehicle = new UserVehicle();
        $userVehicle->user_id = auth()->user()->id;
        $userVehicle->vehicle_id = $showroom->vehicle_id;
        $userVehicle->showroom_id = $showroom->id;
        $userVehicle->save();

        //delete vehicle from showroom
        $showroom->to_user_id = auth()->user()->id;
        $showroom->save();
        $showroom->delete();
        //log
        //todo
        return response()->json(['success' => true]);
    }

    public function show(Showroom $showroom)
    {
        return $showroom;
    }

    public function destroy(Showroom $showroom)
    {
        $showroom->delete();

        return response()->json();
    }
}
