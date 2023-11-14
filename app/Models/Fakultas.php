<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function prodi(){
        return $this->belongsTo(Prodi::class, 'prodi_id');
    }

    public function books(){
        return $this->hasMany(Book::class,'fakultas_id');
    }
}
