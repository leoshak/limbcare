<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('queston', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Queston');
            $table->string('replay1');
            $table->string('replay2');
            $table->string('replay3');
            $table->string('replay4');
            $table->string('replay5');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('queston');
    }
}
