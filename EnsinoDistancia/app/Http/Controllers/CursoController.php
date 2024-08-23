<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
            'quantidade_alunos' => 'required|integer',
            'data_inicio' => 'required|date',
            'data_termino' => 'required|date',
            'data_fim_inscricao' => 'required|date|before:data_inicio',
        ]);

        Curso::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'quantidade_alunos' => $request->quantidade_alunos,
            'data_inicio' => $request->data_inicio,
            'data_termino' => $request->data_termino,
            'data_fim_inscricao' => $request->data_fim_inscricao,
            'professor_id' => Auth::id(),
        ]);

        return redirect()->route('cursos.index')->with('success', 'Curso criado com sucesso.');
    }

    public function edit(Curso $curso)
    {
        return view('cursos.edit', compact('curso'));
    }

    public function update(Request $request, Curso $curso)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'quantidade_alunos' => 'required|integer',
            'data_inicio' => 'required|date',
            'data_termino' => 'required|date',
            'data_fim_inscricao' => 'required|date|before:data_inicio',
        ]);

        $curso->update([
            'nome' => $request->input('nome'),
            'descricao' => $request->input('descricao'),
            'quantidade_alunos' => $request->input('quantidade_alunos'),
            'data_inicio' => $request->input('data_inicio'),
            'data_termino' => $request->input('data_termino'),
            'data_fim_inscricao' => $request->input('data_fim_inscricao'),
        ]);

        return redirect()->route('cursos.index')->with('success', 'Curso atualizado com sucesso!');
    }
    public function show($id)
    {
        // Certifique-se de que $id é numérico
        $id = (int)$id;
        $curso = Curso::findOrFail($id);
        return view('cursos.show', compact('curso'));
    }
    
    

    public function dashboard()
    {
        $user = Auth::user();

        if ($user && $user->user_type === 'professor') {
            // Se o usuário for um professor
            $cursos = Curso::with('alunos')->where('professor_id', $user->id)->get();
        } else {
            // Se o usuário for um aluno
            $cursos = Curso::with('professor')->whereHas('alunos', function ($query) use ($user) {
                $query->where('id', $user->id);
            })->get();
        }

        return view('dashboard', compact('cursos'));
    }

    public function destroy(Curso $curso)
    {
        // Verificar se o usuário autenticado é o professor que criou o curso
        if (Auth::id() !== $curso->professor_id) {
            return redirect()->route('dashboard')->with('error', 'Você não tem permissão para excluir este curso.');
        }

        // Excluir o curso
        $curso->delete();

        return redirect()->route('dashboard')->with('success', 'Curso excluído com sucesso.');
    }

    public function showCoursesForStudents()
    {
        $cursos = Curso::with('professor')->get();
        return view('cursos.aluno', compact('cursos'));
    }

    public function aluno()
    {
        // Obtém a lista de cursos disponíveis para alunos
        $cursos = Curso::where('data_fim_inscricao', '>=', now())->get();
    
        // Passa a variável $cursos para a view
        return view('cursos.aluno', compact('cursos'));
    }
    

    // Exibe a lista de alunos inscritos para um curso
    public function mostrarAlunos($id)
    {
        $curso = Curso::findOrFail($id);

        // Verifica se o usuário é professor do curso
        if (Auth::user()->cursos->contains($curso)) {
            $alunos = $curso->usuarios; // Lista de alunos inscritos
            return view('cursos.alunos', compact('curso', 'alunos'));
        }

        return redirect()->route('home')->with('error', 'Você não tem permissão para acessar esta página.');
    }

    // Atualiza o número de vagas disponíveis
    public function atualizarVagas(Request $request, $id)
    {
        $request->validate([
            'vagas_disponiveis' => 'required|integer|min:0',
        ]);

        $curso = Curso::findOrFail($id);

        // Verifica se o usuário é professor do curso
        if (Auth::user()->cursos->contains($curso)) {
            $curso->atualizarVagasDisponiveis($request->vagas_disponiveis);
            return redirect()->route('cursos.mostrar_alunos', $id)->with('status', 'Número de vagas atualizado com sucesso!');
        }

        return redirect()->route('home')->with('error', 'Você não tem permissão para acessar esta página.');
    }
    public function alunoIndex()
    {
        $cursos = Curso::where('data_fim_inscricao', '>=', now())->get();
        return view('cursos.aluno_index', compact('cursos'));
    }
    
    public function showAllCourses(Request $request)
    {
        $search = $request->input('search');
        $cursos = Curso::when($search, function ($query, $search) {
            return $query->where('nome', 'like', "%{$search}%");
        })->with('professor')->get(); // Certifique-se de que 'professor' está carregado

        return view('dashboard', compact('cursos'));
    }

}
