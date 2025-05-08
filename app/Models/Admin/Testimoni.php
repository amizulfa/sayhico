<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    use HasFactory;

    protected $table = 'testi'; 
    protected $primaryKey = 'id_testi';
    public $timestamps = false;

    protected $fillable = [
        'media',
        'platform',
    ];
}
