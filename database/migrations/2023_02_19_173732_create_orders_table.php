<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->date('order_date');
            $table->unsignedBigInteger('untaxed_total');
            $table->unsignedBigInteger('vat');
            $table->unsignedBigInteger('grand_total');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('delivery_address');
            $table->string('phone_number');
            $table->enum('status', ['in progress', 'in delivery', 'completed']);
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('orders');
    }
}
