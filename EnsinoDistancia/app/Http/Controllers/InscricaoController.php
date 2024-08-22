<?php
namespace App\Http\Controllers;

use App\Models\Inscricao;
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InscricaoController extends Controller
{
    // Método para inscrever um aluno em um curso
    public function inscrever($cursoId)
    {
        $curso = Curso::find($cursoId);
        $aluno = Auth::user();

        // Verifica se o aluno já está inscrito no curso
        if ($curso->alunos()->where('user_id', $aluno->id)->exists()) {
            return redirect()->route('dashboard')->with('error', 'Você já está inscrito neste curso.');
        }

        // Cria a inscrição
        Inscricao::create([
            'curso_id' => $cursoId,
            'user_id' => $aluno->id,
        ]);

        return redirect()->route('dashboard')->with('success', 'Inscrição realizada com sucesso!');
    }

    // Método para cancelar uma inscrição (opcional)
    public function cancelar($inscricaoId)
    {
        $inscricao = Inscricao::find($inscricaoId);

        if ($inscricao && $inscricao->user_id == Auth::id()) {
            $inscricao->delete();
            return redirect()->route('dashboard')->with('success', 'Inscrição cancelada com sucesso!');
        }

        return redirect()->route('dashboard')->with('error', 'Erro ao cancelar inscrição.');
    }
    public function store(Curso $curso)
    {
        // Adiciona o curso à lista de cursos do usuário
        Auth::user()->cursos()->attach($curso->id);
        return redirect()->route('dashboard');
    }

    public function destroy(Curso $curso)
    {
        // Remove o curso da lista de cursos do usuário
        Auth::user()->cursos()->detach($curso->id);
        return redirect()->route('dashboard');
    }
}
