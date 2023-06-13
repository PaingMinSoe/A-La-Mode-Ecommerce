<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->string('id')->unique()->primary();
//            $table->id();
            $table->string('name');
            $table->float('price');
            $table->enum('size', ['XS','S','M','L','XL','2XL','3XL']);
            $table->string('color');
            $table->enum('gender', ['Male', 'Female', 'Kid']);
            $table->integer('instock');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id');
            $table->string('front_image');
            $table->string('back_image');
            $table->float('average_rating')->default(0);
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('brand_id')->references('id')->on('brands');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
