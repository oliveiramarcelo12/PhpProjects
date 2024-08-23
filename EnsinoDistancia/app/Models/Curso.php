<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/Curso.php

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
        'professor_id',
        'max_vagas'  // Adicione 'max_vagas' se estiver utilizando
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

    // Define o relacionamento com inscrições
    public function inscricoes()
    {
        return $this->hasMany(Inscricao::class);
    }

    // Define o relacionamento muitos-para-muitos com usuários (alunos)
    public function alunos()
    {
        return $this->belongsToMany(User::class, 'inscricoes', 'curso_id', 'user_id');
    }

    // Atualiza o número de vagas disponíveis
   // app/Models/Curso.php

public function atualizarVagasDisponiveis($vagas)
{
    // Verifica se o número de vagas é válido (não negativo)
    if ($vagas < 0) {
        throw new \InvalidArgumentException('O número de vagas não pode ser negativo.');
    }

    $this->max_vagas = $vagas;
    $this->save();
}


    // Obtém o número de vagas restantes
    public function getVagasRestantesAttribute()
    {
        // Certifique-se de que max_vagas existe e é definido
        if (!isset($this->max_vagas)) {
            return 0;
        }
    
        // Calcula as vagas restantes
        return $this->max_vagas - $this->inscricoes->count();
    }
}
