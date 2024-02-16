<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';
    protected $guarded = [];
    protected $fillable = [
        'judul',
        'slug',
        'sampul',
        'penulis',
        'penerbit_id',
        'kategori_id',
        'rak_id',
        'stok',
    ];

    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class, 'penerbit_id', 'id');
    }

    public function Kategori()
    {
        return $this->belongsTo(Category::class, 'kategori_id', 'id');
    }

    public function rak()
    {
        return $this->belongsTo(Rak::class, 'rak_id', 'id');
    }

    public function buku()
    {
        return $this->hasMany(DetailPeminjaman::class);
    }

    public function peminjaman()
    {
        return $this->hasMany(DetailPeminjaman::class);
    }
}
