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
        'tahun_lulus',
        'keterangan'
    ];
}