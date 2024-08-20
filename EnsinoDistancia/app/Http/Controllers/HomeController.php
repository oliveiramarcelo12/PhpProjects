<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Exibir a página inicial
    public function index()
    {
        return view('home');
    }
}
