<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpareRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spare_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('photo')->nullable();
            $table->string('email')->nullable();
            $table->string('notes');
            $table->integer('make_id')->nullable();
            $table->integer('model_id')->nullable();
            $table->string('status');
            $table->integer('user_id')->nullable()
            $table->string('phone')->nullable()
            $table->integer('sub_category_id')->nullable();
            $table->integer('category_id')->nullable();
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
        Schema::dropIfExists('spare_requests');
    }
}
