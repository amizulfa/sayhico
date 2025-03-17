<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaraOrderController extends Controller
{
    public function index()
    {
        return view('page.caraorder'); 
    }
}
