<?php

namespace App\Models\Admin\Layanan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenyelesaianSengketa extends Model
{
    use HasFactory;
    protected $table = 'penyelesaian_sengketa';
    protected $primaryKey = 'id_penyelesaianSengketa';
    protected $fillable = [
        'nama',
        'file',
    ];
}
