<?php

// app/Http/Controllers/CursoController.php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::where('professor_id', Auth::id())->get();
        return view('cursos.index', compact('cursos'));
    }

    public function create()
    {
        return view('cursos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'data_criacao' => 'required|date',
        ]);

        Curso::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'data_criacao' => $request->data_criacao,
            'professor_id' => Auth::id(),
        ]);

        return redirect()->route('cursos.index')->with('success', 'Curso criado com sucesso.');
    }

    public function edit(Curso $curso)
    {
        $this->authorize('update', $curso);
        return view('cursos.edit', compact('curso'));
    }

    public function update(Request $request, Curso $curso)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'data_criacao' => 'required|date',
        ]);

        $curso->update([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'data_criacao' => $request->data_criacao,
        ]);

        return redirect()->route('cursos.index')->with('success', 'Curso atualizado com sucesso.');
    }
}
