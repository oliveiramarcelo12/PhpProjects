<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;

class CursoController extends Controller
{
    // Listar todos os cursos
    public function index()
    {
        $cursos = Curso::all();
        return view('cursos.index', compact('cursos'));
    }

    // Exibir o formulário para criar um novo curso
    public function create()
    {
        return view('cursos.create');
    }

    // Armazenar um novo curso
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'data_criacao' => 'required|date',
            'professor_id' => 'required|exists:professores,id',
        ]);

        Curso::create($validated);

        return redirect()->route('cursos.index');
    }

    // Exibir o formulário para editar um curso existente
    public function edit(Curso $curso)
    {
        return view('cursos.edit', compact('curso'));
    }

    // Atualizar um curso existente
    public function update(Request $request, Curso $curso)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'data_criacao' => 'required|date',
            'professor_id' => 'required|exists:professores,id',
        ]);

        $curso->update($validated);

        return redirect()->route('cursos.index');
    }

    // Deletar um curso existente
    public function destroy(Curso $curso)
    {
        $curso->delete();
        return redirect()->route('cursos.index');
    }
}
