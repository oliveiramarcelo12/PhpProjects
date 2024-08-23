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
        $curso = Curso::findOrFail($cursoId);
        $aluno = Auth::user();
    
        // Verifica se o aluno já está inscrito no curso
        if ($curso->alunos()->where('user_id', $aluno->id)->exists()) {
            return redirect()->route('dashboard')->with('error', 'Você já está inscrito neste curso.');
        }
    
        // Cria a inscrição
        Inscricao::create([
            'curso_id' => $curso->id,
            'user_id' => $aluno->id,
        ]);
    
        return redirect()->route('dashboard')->with('success', 'Inscrição realizada com sucesso!');
    }
    
    // Método para cancelar uma inscrição (opcional)
    public function cancelar($inscricaoId)
    {
        // Encontrar a inscrição pelo ID e deletar
        $inscricao = Inscricao::findOrFail($inscricaoId);
        $inscricao->delete();
    
        return redirect()->back()->with('status', 'Inscrição cancelada com sucesso!');
    }
    
    
}
