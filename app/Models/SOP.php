<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SOP extends Model
{
    use HasFactory;

    protected $table = 'sop';
    protected $primaryKey = 'id_sop';
    protected $fillable = [
        'deskripsi',
    ];
}