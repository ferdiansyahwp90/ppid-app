<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanAkses extends Model
{
    use HasFactory;
    protected $table = 'laporanAkses';
    protected $primaryKey = 'id_laporanAkses';
    protected $fillable = [
        'nama',
        'file',
    ];
}
