<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 255);
            $table->string('referencia', 255);
            $table->float('preco', 5) ;
            $table->unsignedBigInteger('produto_id');
            $table->unsignedBigInteger('endereco_entrega_id');

            $table->timestamps();
            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->foreign('endereco_entrega_id')->references('id')->on('endereco_entrega');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendas');
    }
}
