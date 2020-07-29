<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecoEntrega extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('endereco_entrega', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produto_id') ;
            $table->string('uf', 20) ;
            $table->string('cidade',255) ;
            $table->string('bairro', 255) ;
            $table->string('rua'. 255) ;
            $table->string('numero', 20);
            $table->string('cep', 10) ;
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
        Schema::dropIfExists('endereco_entrega');
    }
}
