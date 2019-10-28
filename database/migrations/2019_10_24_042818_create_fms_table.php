<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->float('fillLevel')->nullable();
            $table->boolean('status')->nullable();
            $table->bigInteger('fillLevel_log_id')->unsigned()->nullable();
            $table->bigInteger('status_log_id')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fms');
    }
}
