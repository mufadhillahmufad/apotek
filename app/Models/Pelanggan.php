<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $fillable = [
        'id_pelanggan',
        'nama',
        'alamat',
        'no_hp'
    ];
} 