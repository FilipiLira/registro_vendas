<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesProviders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_providers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('provider_id')->nullable(false);
            $table->unsignedBigInteger('sale_id')->nullable(false);
            $table->timestamps();

            $table->foreign('provider_id')->references('id')->on('providers');
            $table->foreign('sale_id')->references('id')->on('sales');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales_providers');
    }
}
