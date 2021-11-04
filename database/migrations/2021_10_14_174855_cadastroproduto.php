<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cadastroproduto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cadastroprodutos', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('NOME')->nullable()->index();
            $table->string('DESCRICAO')->nullable();
            $table->string('IMAGEM')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
