<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    protected $table = 'kontakkami';
    protected $primaryKey = 'id_kontak';

    protected $fillable = ['firstname', 'lastname', 'email', 'phone', 'message', 'is_read'];

    // Pastikan ini di-set ke true (default-nya sudah true)
    public $timestamps = true; 
}

