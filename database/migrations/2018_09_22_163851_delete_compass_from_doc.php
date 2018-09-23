<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteCompassFromDoc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doctors', function($table) {
            $table->dropColumn('compass');
        });
    }

    public function down()
    {
        Schema::table('doctors', function($table) {
            $table->integer('compass');
        });
    }
}
