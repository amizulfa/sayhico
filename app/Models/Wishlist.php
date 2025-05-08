<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wishlist extends Model
{
    use HasFactory;

    protected $table = 'wishlist';

    // Tambahkan 'tanggal_simpan' ke fillable
    protected $fillable = ['id_user', 'id_produk', 'tanggal_simpan'];

    public $timestamps = false; // Karena tabel ini tidak pakai created_at dan updated_at

    protected $casts = [
        'tanggal_simpan' => 'date', // Biar otomatis diparse jadi Carbon date object
    ];

    // Relasi ke model Produk
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id_produk');
    }
}
