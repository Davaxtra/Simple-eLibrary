<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;

    protected $fillable = [
        "name", "fakultas_id"
    ];
    
    public function fakultas(){
        return $this->hasMany(Fakultas::class, 'fakultas_id');
    }

    public function books(){
        return $this->hasMany(Book::class,'prodi_id');
    }
}
