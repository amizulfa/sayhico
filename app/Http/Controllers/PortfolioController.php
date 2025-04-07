<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolio = Portfolio::all();
        return view('page.portfolio', compact('portfolio'));
    }
}
