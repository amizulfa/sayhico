<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriFaq extends Model
{
    protected $table = 'kategori_faqs';
    protected $primaryKey = 'id_kategorifaqs';
    public $timestamps = false;

    protected $fillable = ['nama_kategori'];

    public function faqs()
    {
        return $this->hasMany(Faq::class, 'id_kategorifaqs', 'id_kategorifaqs');
    }
}
