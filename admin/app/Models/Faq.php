<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
    protected $table = 'faqs';
    protected $primaryKey = 'id_faqs';
    protected $fillable = ['pertanyaan', 'jawaban', 'id_kategorifaqs'];
    public $timestamps = false;

    public function kategori()
    {
        return $this->belongsTo(KategoriFaq::class, 'id_kategorifaqs');
    }
}
