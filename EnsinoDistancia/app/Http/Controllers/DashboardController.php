<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $cursos = Curso::query()
            ->where('nome', 'LIKE', "%{$search}%")
            ->orWhere('descricao', 'LIKE', "%{$search}%")
            ->get();

        return view('usuarios.dashboard', ['cursos' => $cursos]);
    }
}
