<?php

namespace App\Models\Pemohon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{
    use HasFactory;
    protected $table = 'permintaan';
    protected $primaryKey = 'id_permintaan';


    protected $fillable = [
        'nama',
        'noidentitas',
        'pekerjaan',
        'notelp',
        'email',
        'detailinfo',
        'created_by'
    ];
}
