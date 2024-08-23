<?php



use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cursos', function (Blueprint $table) {
            $table->integer('quantidade_alunos')->nullable(); // Adiciona a coluna quantidade_alunos
            $table->dateTime('data_inicio')->nullable(); // Adiciona a coluna data_inicio
            $table->dateTime('data_termino')->nullable(); // Adiciona a coluna data_termino
            $table->dateTime('data_fim_inscricao')->nullable(); // Adiciona a coluna data_fim_inscricao
            $table->dropColumn('data_criacao'); // Remove a coluna data_criacao
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cursos', function (Blueprint $table) {
            $table->dropColumn('quantidade_alunos');
            $table->dropColumn('data_inicio');
            $table->dropColumn('data_termino');
            $table->dropColumn('data_fim_inscricao');
            $table->timestamp('data_criacao')->nullable();
        });
    }
}

