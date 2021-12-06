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
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('place_id');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('location_description')->nullable();
            $table->float('discount')->nullable();
            $table->string('discount_code')->nullable();
            $table->float('subtotal');
            $table->float('tax')->nullable();
            $table->float('total');
            $table->string('payment_gateway')->nullable();
            $table->string('status')->nullable();
            $table->integer('is_paid')->nullable();
            $table->integer('rider_id');
            $table->string('affiliate_code')->nullable();
            $table->string('paying_number')->nullable();
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
