<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermohonanLangsung extends Model
{
    use HasFactory;
    protected $table = 'permohonanLangsung';
    protected $primaryKey = 'id_permohonanLangsung';
    protected $fillable = [
        'nama',
        'file',
    ];
}
