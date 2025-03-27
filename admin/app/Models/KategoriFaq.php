<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriFaq extends Model
{
    use HasFactory;
    protected $table = 'kategori_faqs';
    protected $primaryKey = 'id_kategorifaqs';
    protected $fillable = ['nama_kategori'];
    public $timestamps = false;

    public function faqs()
    {
        return $this->hasMany(Faq::class, 'id_kategorifaqs');
    }
}
