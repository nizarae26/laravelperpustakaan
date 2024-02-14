<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $table = "kategori";
    protected $fillable = [
        'nama',
        'slug',
    ];

    protected $guarded = [];

    public function rak(){
        return $this->hasMany(Rak::class);
    }

    public function buku(){
        return $this->hasMany(Buku::class);
    }
}
