<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Curso extends Model
{
    use HasFactory;

    // Atributos que podem ser preenchidos em massa
    protected $fillable = ['nome', 'descricao', 'data_criacao', 'professor_id'];
    
    // Definição dos tipos de dados dos atributos
    protected $casts = [
        'data_criacao' => 'datetime',
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

}
