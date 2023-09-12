<?php

namespace App\Models\Admin\Layanan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanAkses extends Model
{ 
    use HasFactory;
    protected $table = 'laporan_akses';
    protected $primaryKey = 'id_laporanAkses';
    protected $fillable = [
        'nama',
    ];
}
