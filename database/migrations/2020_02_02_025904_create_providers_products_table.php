<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvidersProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providersProducts', function (Blueprint $table) {
            $table->unsignedBigInteger('idProvider');
            $table->integer('idProduct');
        });

        Schema::table('providersProducts', function($table) {
            $table->foreign('idProvider')->references('idProvider')->on('providers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('providersProducts');
    }
}
