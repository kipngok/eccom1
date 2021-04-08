<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMechanicRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mechanic_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mechanic_id');
            $table->integer('user_id');
            $table->string('notes');
            $table->integer('make_id');
            $table->integer('model_id');
            $table->string('status');
            $table->string('approved');
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
        Schema::dropIfExists('mechanic_requests');
    }
}
