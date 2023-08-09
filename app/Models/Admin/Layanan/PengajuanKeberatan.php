<?php

namespace App\Models\Admin\Layanan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanKeberatan extends Model
{
    use HasFactory;
    protected $table = 'pengajuan_keberatan';
    protected $primaryKey = 'id_pengajuanKeberatan';
    protected $fillable = [
        'nama',
        'file',
    ];
}
