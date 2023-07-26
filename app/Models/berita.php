<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class berita extends Model
{

    protected $table='berita'; 
    protected $primaryKey = 'id_berita'; 

    use HasFactory;
    protected $fillable = [
        'name',
        'deskripsi',
        'tanggal',
        'photo',
        'link',
    ];
}
