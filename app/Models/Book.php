<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Scout\Searchable;

class Book extends Model
{
    use HasFactory, HasApiTokens, Searchable;

    protected $fillable = [
        'nama',
        'npp',
        'judul',
        'fakultas_id',
        'prodi_id',
        'jenis_buku',
        'no_urut',
        'tahun_lulus',
        'keterangan'
    ];

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class, 'fakultas_id', 'id');
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id', 'id');
    }

    public function jenis_book()
    {
        return $this->belongsTo(BookTypes::class, 'jenis_buku', 'id');
    }

    public function toSearchableArray()
    {
        return [
            'nama' => $this->nama,
            'npp' => $this->npp,
            'judul' => $this->judul,
        ];
    }
}
