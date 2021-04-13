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
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('meta')->nullable();
            $table->integer('price');
            $table->integer('sale_price')->nullable();
            $table->string('description',1000);
            $table->string('featured')->nullable();
            $table->integer('quantity');
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('image4')->nullable();
            $table->integer('make_id');
            $table->integer('model_id');
            $table->integer('year')->nullable();
            $table->string('engine')->nullable();
            $table->string('fuel')->nullable();
            $table->integer('sub_category_id');
            $table->integer('category_id');
            $table->string('status');
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
        Schema::dropIfExists('products');
    }
}
