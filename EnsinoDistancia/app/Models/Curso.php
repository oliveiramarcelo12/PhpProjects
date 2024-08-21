<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao', 'data_criacao', 'professor_id'];

    // Define o relacionamento com o professor (usuário)
    public function professor()
    {
        return $this->belongsTo(User::class, 'professor_id');
    }
}
