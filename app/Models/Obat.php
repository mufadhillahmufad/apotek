<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $fillable = [
        'kode_obat',
        'nama_obat',
        'stock_obat',
        'tanggal_expired'
    ];
}