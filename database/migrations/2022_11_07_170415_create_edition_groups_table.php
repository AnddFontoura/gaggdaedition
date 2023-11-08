<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEditionGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edition_groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('edition_id')->nullable(false);
            $table->string('name', 100)->nullable(false);
            $table->string('icon', 1000)->nullable(true);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('edition_id')->references('id')->on('editions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('editions_groups');
    }
}
