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
            $table->string('question_title');
            $table->string('question_type');
            $table->string('Queston');
            $table->string('question_pic')->nullable();
            $table->text('replay1')->nullable();
            $table->string('replay1_pic')->nullable();
            $table->text('replay2')->nullable();
            $table->string('replay2_pic')->nullable();
            $table->text('replay3')->nullable();
            $table->string('replay3_pic')->nullable();
            $table->text('replay4')->nullable();
            $table->string('replay4_pic')->nullable();
            $table->text('replay5')->nullable();
            $table->string('replay5_pic')->nullable();
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
