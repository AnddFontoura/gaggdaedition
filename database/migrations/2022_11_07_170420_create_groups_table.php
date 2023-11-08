<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->unsignedBigInteger('edition_group_id')->nullable(false);
            $table->integer('field')->nullable(false);
            $table->integer('group_position')->nullable(false);
            $table->integer('points')->default(0);
            $table->integer('matches')->default(0);
            $table->integer('victories')->default(0);
            $table->integer('drawns')->default(0);
            $table->integer('defeats')->default(0);
            $table->integer('goals_scored')->default(0);
            $table->integer('goals_conceded')->default(0);
            $table->integer('red_card')->default(0);
            $table->integer('yellow_card')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('edition_group_id')->references('id')->on('edition_groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups');
    }
}
