<?php

// app/Models/User.php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'user_type',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Método para verificar o tipo de usuário
    public function isProfessor()
    {
        return $this->user_type === 'professor';
    }

    // Define o relacionamento com os cursos
    public function cursos()
    {
        return $this->hasMany(Curso::class, 'professor_id');
    }
}
