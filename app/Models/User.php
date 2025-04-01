<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'user'; // Sesuaikan nama tabel dengan database

    protected $primaryKey = 'id_user'; // Sesuaikan dengan primary key
    public $timestamps = false; 

    protected $fillable = [
        'nama',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
    
    // Relasi ke Wishlist
    public function wishlist()
    {
        return $this->hasMany(Wishlist::class, 'id_user', 'id_user');
    }

}
