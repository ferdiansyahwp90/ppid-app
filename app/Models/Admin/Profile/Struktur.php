<?php

namespace App\Models\Admin\Profile;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Struktur extends Model
{
    use HasFactory;

    protected $table = 'struktur';
    protected $primaryKey = 'id_struktur';
    protected $fillable = [
        'photo',
    ];
}