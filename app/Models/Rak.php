<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rak extends Model
{
    use HasFactory;

    protected $table = 'rak';
    protected $fillable = ['rak', 'baris', 'kategori_id', 'slug'];

    public function Kategori(){
        return $this->belongsTo(Category::class, 'kategori_id', 'id');
    }

    public function buku(){
        return $this->hasMany(Buku::class);
    }

    public function favorit(){
        return $this->hasMany(Favorit::class);
    }
}
