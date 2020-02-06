<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderProducts', function (Blueprint $table) {
            $table->integer('idProduct');
            $table->string('name', 200);
            $table->integer('quantity');
            $table->unsignedBigInteger('idOrder');
        });

        Schema::table('orderProducts', function($table) {
            $table->foreign('idOrder')->references('idOrder')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orderProducts');
    }
}
