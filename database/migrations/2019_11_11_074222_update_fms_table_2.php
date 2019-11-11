<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFmsTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fms', function (Blueprint $table) {
            
            $table->float('voltage')->nullable();
            $table->float('current')->nullable();
            $table->float('power')->nullable();
            $table->float('temperature')->nullable();
            $table->boolean('genStatus')->nullable();
            $table->bigInteger('voltage_log_id')->unsigned()->nullable();
            $table->bigInteger('current_log_id')->unsigned()->nullable();
            $table->bigInteger('power_log_id')->unsigned()->nullable();
            $table->bigInteger('temperature_log_id')->unsigned()->nullable();
            $table->bigInteger('genStatus_log_id')->unsigned()->nullable();
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
