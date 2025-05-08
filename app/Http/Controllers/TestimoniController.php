<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimoni;

class TestimoniController extends Controller
{
    public function index()
    {
        $whatsapp = Testimoni::where('platform', 'whatsapp')->get();
        $instagram = Testimoni::where('platform', 'instagram')->get();

        return view('page.testimoni', compact('whatsapp', 'instagram'));
    }
}
