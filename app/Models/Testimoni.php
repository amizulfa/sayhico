<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    use HasFactory;

    protected $table = 'testimoni'; // Nama tabel
    protected $primaryKey = 'id_testi'; // Primary key

    protected $fillable = [
        'nama_pembeli',
        'waktu_pembelian',
        'variasi',
        'deskripsi',
        'rating',
        'gambar_testi',
        'kategori'
    ];

    // Relasi ke kategori
    public function kategoriData()
    {
        return $this->belongsTo(Kategori::class, 'kategori', 'id_kategori'); // Sesuaikan nama tabel dan foreign key
    }
}
