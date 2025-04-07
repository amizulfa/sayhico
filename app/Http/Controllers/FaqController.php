<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\KategoriFaq;


class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::with('kategori')->get();
        $kategoriFaqs = KategoriFaq::all();
        return view('page.faqs', compact('faqs', 'kategoriFaqs'));
    }
}
