<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VoltageLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voltage_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('fms_id')->unsigned();
            $table->float('voltage');
            $table->timestamps();
            $table->foreign('fms_id')->references('id')->on('fms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
