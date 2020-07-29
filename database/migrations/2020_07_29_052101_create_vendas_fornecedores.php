<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendasFornecedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas_fornecedores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fornecedor_id');
            $table->unsignedBigInteger('venda_id');
            $table->timestamps();

            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
            $table->foreign('venda_id')->references('id')->on('vendas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendas_fornecedores');
    }
}
