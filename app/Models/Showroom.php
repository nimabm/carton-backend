<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Showroom extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'vehicle_id',
        'from_user_id',
        'to_user_id',
        'price',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class,'vehicle_id');
    }
    public function oldUser()
    {
        return $this->belongsTo(User::class,'from_user_id');
    }

    public function newUser()
    {
        return $this->belongsTo(User::class,'to_user_id');
    }
}
