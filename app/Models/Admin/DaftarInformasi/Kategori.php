<?php

namespace App\Models\Admin\DaftarInformasi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table='kategori'; 
    protected $primaryKey = 'id_kategori'; 

    use HasFactory;
    protected $fillable = [
        'nama',
        'status',
    ];
}