<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PPID extends Model
{
    use HasFactory;

    protected $table = 'seputar';
    protected $primaryKey = 'id_seputar';
    protected $fillable = [
        'deskripsi',
    ];
}