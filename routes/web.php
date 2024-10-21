<?php

use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


///////default route
Route::get('/', function () {
    return view('welcome');
});

Route::get('/ping', function () {
    $connection = DB::connection('mongodb');
    $msg = 'MongoDB is accessible!';
    try {
        $connection->command(['ping' => 1]);
    } catch (\Exception  $e) {
        $msg = 'MongoDB is not accessible. Error: ' . $e->getMessage();
    }
    return ['msg' => $msg];
});
