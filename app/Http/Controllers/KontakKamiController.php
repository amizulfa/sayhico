<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KontakKamiController extends Controller
{
    public function index()
    {
        return view('page.kontakkami'); 
    }
}
