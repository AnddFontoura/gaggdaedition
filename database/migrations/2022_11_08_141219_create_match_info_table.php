<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_info', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('match_id')->nullable(false);
            $table->unsignedBigInteger('group_id')->nullable(false);
            $table->integer('victories')->default(0);
            $table->integer('drawns')->default(0);
            $table->integer('defeats')->default(0);
            $table->integer('goals_scored')->default(0);
            $table->integer('goals_conceded')->default(0);
            $table->integer('red_card')->default(0);
            $table->integer('yellow_card')->default(0);
            $table->timestamps();
            $table->softDeletes();

            
            $table->foreign('match_id')->references('id')->on('matches');
            $table->foreign('group_id')->references('id')->on('groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('match_info');
    }
}
