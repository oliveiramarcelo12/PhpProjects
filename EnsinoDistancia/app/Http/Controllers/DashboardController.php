<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Exibir a página do dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Retorne a view do dashboard. Certifique-se de que a view exista em resources/views
        return view('dashboard.index');
    }
}
