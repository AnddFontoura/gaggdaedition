<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterMatchesTableAddNewEnum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('matches', function (Blueprint $table) {
            $table->enum('type', ['GROUP', 'OCTAVES', 'QUARTER', 'SEMI', 'FINAL'])->default('GROUP')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('matches', function (Blueprint $table) {
            $table->enum('type', ['GROUP', 'QUARTER', 'SEMI', 'FINAL'])->default('GROUP')->change();
        });
    }
}
