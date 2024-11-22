<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    protected $fillable = [
        'plat_motor',
        'tipe_motor',
        'merk_motor',
        'desc_kerusakan',
        'foto_motor',
    ];
}
