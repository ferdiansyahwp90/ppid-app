<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPemohon extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'nama', 'gender', 'phone', 'identity_photo', 'driver_license', 'selfie_photo'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
