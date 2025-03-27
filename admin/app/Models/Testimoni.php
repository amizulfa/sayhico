<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    use HasFactory;

    protected $table = 'testimoni'; 
    protected $primaryKey = 'id_testi';
    public $timestamps = false;

    protected $fillable = [
        'nama_pembeli',
        'waktu_pembelian',
        'variasi',
        'deskripsi',
        'rating',
        'gambar_testi',
        'id_kategori',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }
}
