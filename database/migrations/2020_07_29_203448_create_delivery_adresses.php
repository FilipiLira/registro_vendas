<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryAdresses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_adresses', function (Blueprint $table) {
            $table->id();
            $table->string('uf', 20)->nullable(false);
            $table->string('city',255)->nullable(false);
            $table->string('neighborhood', 255)->nullable(false);
            $table->string('street', 255)->nullable(false);
            $table->string('number', 20);
            $table->string('postal_code', 10);
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
        Schema::dropIfExists('delivery_adresses');
    }
}
