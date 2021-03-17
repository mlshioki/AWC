<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriaTabelaVendas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Vendas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('cliente_id')->unsigned();
            $table->bigInteger('funcionario_id')->unsigned();
            $table->date('data');
            $table->double('valor', 10, 2);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Vendas');
    }
}
