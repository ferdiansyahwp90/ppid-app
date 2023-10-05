<?php

namespace App\Models\Admin\Settings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Myprofile extends Model
{
    use HasFactory;

    protected $table = 'myprofile';
    protected $primaryKey = 'id_myprofile';
    protected $fillable = [
        'deskripsi',
    ];
}