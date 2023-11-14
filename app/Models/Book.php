<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'npp',
        'judul',
        'fakultas',
        'prodi',
        'jenis_buku',
        'no_urut',
        'tahun_lulus',
        'keterangan'
    ];

}