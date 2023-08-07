<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mekanisme extends Model
{
    use HasFactory;
    protected $table = 'mekanisme';
    protected $primaryKey = 'id_mekanisme';
    protected $fillable = [
        'nama',
        'file',
    ];
}
