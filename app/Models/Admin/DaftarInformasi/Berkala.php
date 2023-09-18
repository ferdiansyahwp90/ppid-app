<?php

namespace App\Models\Admin\DaftarInformasi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berkala extends Model
{
    protected $table='berkala'; 
    protected $primaryKey = 'id_berkala'; 

    use HasFactory;
    protected $fillable = [
        'deskripsi',
    ];
}