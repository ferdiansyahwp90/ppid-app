<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenyelesaianSengketa extends Model
{
    use HasFactory;
    protected $table = 'penyelesaianSengketa';
    protected $primaryKey = 'id_penyelesaianSengketa';
    protected $fillable = [
        'nama',
        'file',
    ];
}
