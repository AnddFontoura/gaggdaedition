<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('challenger_1')->nullable(false);
            $table->unsignedBigInteger('challenger_2')->nullable(false);
            $table->integer('match_number')->nullable(false);
            $table->integer('challenger_1_score')->nullable(true)->default(0);
            $table->integer('challenger_2_score')->nullable(true)->default(0);
            $table->enum('type', ['GROUP', 'OCTAVES', 'QUARTER', 'SEMI', 'FINAL'])->default('GROUP');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('challenger_1')->references('id')->on('groups');
            $table->foreign('challenger_2')->references('id')->on('groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches');
    }
}
