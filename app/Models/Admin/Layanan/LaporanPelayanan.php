<?php

namespace App\Models\Admin\Layanan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPelayanan extends Model
{
    use HasFactory;
    protected $table = 'laporan_pelayanan';
    protected $primaryKey = 'id_laporanPelayanan';
    protected $fillable = [
        'nama',
    ];
}
