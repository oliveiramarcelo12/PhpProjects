<?php

// database/migrations/xxxx_xx_xx_add_max_vagas_to_cursos_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMaxVagasToCursosTable extends Migration
{
    public function up()
    {
        Schema::table('cursos', function (Blueprint $table) {
            $table->integer('max_vagas')->default(0)->after('data_fim_inscricao');
        });
    }

    public function down()
    {
        Schema::table('cursos', function (Blueprint $table) {
            $table->dropColumn('max_vagas');
        });
    }
}
