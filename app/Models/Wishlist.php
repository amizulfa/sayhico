<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = 'wishlist'; // Nama tabel jika tidak sesuai dengan konvensi Laravel
    protected $fillable = ['id_user', 'id_produk'];
    public $timestamps = false; 

    // Relasi ke model Produk
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id_produk');
    }
}

