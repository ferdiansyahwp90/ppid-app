<?php

namespace App\Models\Admin\DaftarInformasi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dikecualikan extends Model
{
    protected $table='dikecualikan'; 
    protected $primaryKey = 'id_dikecualikan'; 

    use HasFactory;
    protected $fillable = [
        'deskripsi',
    ];
}