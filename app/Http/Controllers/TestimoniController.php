<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    public function index()
    {
        return view('page.testimoni');
    }
}
