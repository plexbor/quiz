<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrizeActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prize_actions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('prize_id');
            $table->integer('type');
            $table->timestamps();

            $table->foreign('prize_id')->on('prizes')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prize_actions');
    }
}
