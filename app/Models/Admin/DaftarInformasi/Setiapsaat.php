<?php

namespace App\Models\Admin\DaftarInformasi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setiapsaat extends Model
{
    protected $table='setiapsaat'; 
    protected $primaryKey = 'id_setiapsaat'; 

    use HasFactory;
    protected $fillable = [
        'deskripsi',
    ];
}