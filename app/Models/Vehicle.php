<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use MongoDB\Laravel\Eloquent\Model;
class Vehicle extends Model
{
    use SoftDeletes;

    protected $table = 'vehicles';
    protected $fillable = [
        'plate_number',
        'type',
        'gas_remain',
        'gas_max',
        'health',
        'metadata',
    ];
}
