<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookTypes extends Model
{
    use HasFactory;

    protected $fillable = [
        'name' 
    ];

    public function jenis_book(){
        return $this->hasMany(Book::class, 'jenis_buku');
    }
}
