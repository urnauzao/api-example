<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 60)->comment("Nome do curso");
            $table->string('descricao', 255)->comment("Descrição do curso");
            $table->integer('maximo_alunos')->nullable()->comment("Máximo de alunos permitidos");
            $table->float('preco',7,2)->comment("Preço do curso");
            $table->softDeletes();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursos');
    }
};
