<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterGroupsTableAddFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('groups', function (Blueprint $table) {
            $table->integer('points')->default(0);
            $table->integer('matches')->default(0);
            $table->integer('victories')->default(0);
            $table->integer('drawns')->default(0);
            $table->integer('defeats')->default(0);
            $table->integer('goals_scored')->default(0);
            $table->integer('goals_conceded')->default(0);
            $table->integer('red_card')->default(0);
            $table->integer('yellow_card')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('groups', function (Blueprint $table) {
            $table->dropColumn(['matches', 'points', 'victories', 'drawns', 'defeats', 'goals_scored', 'goals_conceded', 'red_card', 'yellow_card']);
        });
    }
}
