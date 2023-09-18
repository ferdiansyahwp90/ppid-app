<?php

namespace App\Models\Admin\DaftarInformasi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sertamerta extends Model
{
    protected $table='sertamerta'; 
    protected $primaryKey = 'id_sertamerta'; 

    use HasFactory;
    protected $fillable = [
        'deskripsi',
    ];
}