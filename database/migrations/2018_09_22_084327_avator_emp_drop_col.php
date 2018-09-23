<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AvatorEmpDropCol extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function($table) {
            $table->dropColumn('avator');
        });
    }

    public function down()
    {
        Schema::table('employees', function($table) {
            $table->integer('avator');
        });
    }
}
