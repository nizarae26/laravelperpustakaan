<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorit extends Model
{
    use HasFactory;

    protected $table = 'favorit';
    protected $fillable = ['users_id', 'buku_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id', 'id');
    }

    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class, 'penerbit_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(category::class, 'kategori_id', 'id');
    }
}
