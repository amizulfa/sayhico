<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk'; 
    protected $primaryKey = 'id_produk'; 
    public $timestamps = false;

    protected $fillable = [
        'nama_produk',
        'harga',
        'deskripsi',
        'gambar_produk',
        'gambar_produk2',
        'gambar_produk3',
        'ukuran',
        'id_kategori'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }
}
