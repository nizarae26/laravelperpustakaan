<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Livewire\WithPagination;

class Buku extends Model
{
    use HasFactory;
    use WithPagination;
    protected $paginationTheme = 'bootsrtap';

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
        return $this->hasMany(Peminjaman::class);
    }

    public function ulasan()
    {
        return $this->hasMany(Ulasan::class);
    }

    public function favorit()
    {
        return $this->hasMany(Favorit::class);
    }
}
