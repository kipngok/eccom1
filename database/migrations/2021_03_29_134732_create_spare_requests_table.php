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
            $table->string('photo');
            $table->string('email');
            $table->string('notes');
            $table->integer('make_id');
            $table->integer('model_id');
            $table->string('status');
            $table->integer('subcategory_id');
            $table->integer('category_id');
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
