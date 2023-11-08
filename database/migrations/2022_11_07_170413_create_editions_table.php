<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('editions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 1000)->nullable(false);
            $table->string('banner', 1000)->nullable(false);
            $table->text('description', 10000)->nullable(false);
            $table->integer('max_participants');
            $table->date('inscriptions_begins_at')->nullable(true);
            $table->date('inscriptions_ends_at')->nullable(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('editions');
    }
}
