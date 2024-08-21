<?php

// database/migrations/xxxx_xx_xx_create_cursos_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id(); // Cria a coluna "id" como chave primária
            $table->string('nome'); // Nome do curso
            $table->text('descricao'); // Descrição do curso
            $table->date('data_criacao'); // Data de criação do curso
            //$table->unsignedBigInteger('professor_id'); // ID do professor
           // $table->foreign('professor_id')->references('id')->on('usuarios')->onDelete('cascade'); // Chave estrangeira para a tabela de usuários
            $table->timestamps(); // Colunas de timestamps (created_at e updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};
