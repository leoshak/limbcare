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
        Schema::create('question', function (Blueprint $table) {
            $table->increments('id');
            $table->string('questionTitle');
            $table->string('question');
            $table->string('questionType');
            $table->string('questionAsk');
            $table->string('questionPic')->nullable();
            $table->timestamps();
            // $table->text('replay1')->nullable();
            // $table->string('replay1_pic')->nullable();
            // $table->text('replay2')->nullable();
            // $table->string('replay2_pic')->nullable();
            // $table->text('replay3')->nullable();
            // $table->string('replay3_pic')->nullable();
            // $table->text('replay4')->nullable();
            // $table->string('replay4_pic')->nullable();
            // $table->text('replay5')->nullable();
            // $table->string('replay5_pic')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question');
    }
}
