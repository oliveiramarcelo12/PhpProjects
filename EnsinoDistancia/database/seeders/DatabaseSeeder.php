<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Atualiza max_vagas para todos os registros na tabela cursos
        DB::table('cursos')->update(['max_vagas' => 10]); // Define o valor padrão, ajuste conforme necessário
    }
}
