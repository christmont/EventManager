<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuestSubeventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guest_subevent', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subevent_id')->unsigned();
            $table->foreign('subevent_id')->references('id')->on('subevents')->onDelete('cascade');
            $table->integer('guest_id')->unsigned();
            $table->foreign('guest_id')->references('id')->on('guests')->onDelete('cascade');
            $table->integer('subeventlog_id')->unsigned();
            $table->foreign('subeventlog_id')->references('id')->on('subeventlogs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guest_subevent');
    }
}
