<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscricao extends Model
{
    protected $table = 'inscricoes'; // Define o nome correto da tabela

    protected $fillable = [
        'curso_id', 'user_id',
    ];

    // Relacionamento com o model Curso
    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    // Relacionamento com o model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
