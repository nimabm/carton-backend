<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use MongoDB\Laravel\Auth\User as Authenticatable;
class User extends Authenticatable
{
    use HasFactory, Notifiable , HasApiTokens;

    protected $table = 'users';
    protected $primaryKey = 'id_key';
    protected $fillable = [
        'id_key',
        'tg_id',
        'tg_name',
    ];

    public function vehicle(): \Illuminate\Database\Eloquent\Relations\BelongsTo|\MongoDB\Laravel\Relations\BelongsTo
    {
        return $this->belongsTo(UserVehicle::class,'user_id');
    }
}
