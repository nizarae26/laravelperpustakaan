<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    use HasFactory;

    public $table = "penerbit";
    protected $fillable = [
        'nama',
        'slug',
    ];

    public function buku(){
        return $this->hasMany(Buku::class);
    }

    public function favorit(){
        return $this->hasMany(Favorit::class);
    }
}
