<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    // Atributos que podem ser preenchidos em massa
    protected $fillable = [
        'nome', 
        'descricao', 
        'quantidade_alunos', 
        'data_inicio', 
        'data_termino', 
        'data_fim_inscricao', 
        'professor_id'
    ];
    
    // Definição dos tipos de dados dos atributos
    protected $casts = [
        'data_inicio' => 'datetime',
        'data_termino' => 'datetime',
        'data_fim_inscricao' => 'datetime',
    ];

    // Define o relacionamento com o professor (usuário)
    public function professor()
    {
        return $this->belongsTo(User::class, 'professor_id');
    }

    public function inscricoes()
    {
        return $this->hasMany(Inscricao::class);
    }

    public function alunos()
    {
        return $this->belongsToMany(User::class, 'inscricoes', 'curso_id', 'user_id');
    }
    


    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'inscricoes', 'curso_id', 'user_id')
                    ->withPivot('id'); // Adicione outros campos da tabela pivot se necessário
    }

    // Atualiza o número de vagas disponíveis
    public function atualizarVagasDisponiveis($vagas)
    {
        $this->vagas_disponiveis = $vagas;
        $this->save();
    }

}
