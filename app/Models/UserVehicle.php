<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use MongoDB\Laravel\Eloquent\Model;

class UserVehicle extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'vehicle_id',
        'showroom_id',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class,'vehicle_id');
    }
}
