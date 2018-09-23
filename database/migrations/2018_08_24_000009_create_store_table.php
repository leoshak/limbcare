<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store', function (Blueprint $table) {
            $table->increments('id');
            $table->string('iteamname');
            $table->integer('iteam_quantity');
            $table->string('company');
            $table->integer('iteam_max')->nullable();
            $table->integer('iteam_min')->nullable();
            $table->string('quantity_type')->nullable();
            $table->string('pic');
            $table->string('Data_entry_ID');
            $table->string('Data_update_ID');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store');
    }
}
