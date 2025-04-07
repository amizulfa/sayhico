<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table = 'faqs';
    protected $primaryKey = 'id_faqs';
    public $timestamps = false;

    protected $fillable = ['pertanyaan', 'jawaban', 'id_kategorifaqs'];

    public function kategori()
    {
        return $this->belongsTo(KategoriFaq::class, 'id_kategorifaqs', 'id_kategorifaqs');
    }
}
