<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PPID extends Model
{
    use HasFactory;

    protected $table = 'ppid';
    protected $primaryKey = 'id_ppid';
    protected $guarded = [];
}