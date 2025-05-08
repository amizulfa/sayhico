<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
     protected $table = 'produk'; // Nama tabel di database
    protected $primaryKey = 'id_produk'; // Primary key tabel

    protected $fillable = [
        'nama_produk',
        'harga',
        'deskripsi',
        'gambar_produk',
        'ukuran',
        'id_kategori',
        'best_seller'
    ];

    // Relasi ke tabel kategori (Setiap produk memiliki satu kategori)
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }
}
