<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEditionParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edition_participants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->unsignedBigInteger('edition_id')->nullable(false);
            $table->dateTime('payment_confirmed')->nullable(true);
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('editions_participants');
    }
}
