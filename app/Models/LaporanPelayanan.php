<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPelayanan extends Model
{
    use HasFactory;
    protected $table = 'laporanPelayanan';
    protected $primaryKey = 'id_laporanPelayanan';
    protected $fillable = [
        'nama',
        'file',
    ];
}
