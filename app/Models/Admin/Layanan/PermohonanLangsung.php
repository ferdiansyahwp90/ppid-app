<?php

namespace App\Models\Admin\Layanan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermohonanLangsung extends Model
{
    use HasFactory;
    protected $table = 'permohonan_langsung';
    protected $primaryKey = 'id_permohonanLangsung';
    protected $fillable = [
        'nama',
        'file',
    ];
}
