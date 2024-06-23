<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory;

    protected $table = 'kota';

    protected $primaryKey = 'idKota'; // Specify the custom primary key

    protected $fillable = [
        'namaKota',
        'namaPemimpin',
        'tglBerdiri',
        'jmlPenduduk',
        'luasWilayah',
        'jenisKota',
        'keunggulan'
    ];
}
