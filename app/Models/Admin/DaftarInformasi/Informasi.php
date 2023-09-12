<?php

namespace App\Models\Admin\DaftarInformasi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    protected $table='informasi'; 
    protected $primaryKey = 'id_informasi'; 

    use HasFactory;
    protected $fillable = [
        'deskripsi',
        'status',
    ];
}