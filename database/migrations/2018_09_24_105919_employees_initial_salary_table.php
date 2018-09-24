<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EmployeesInitialSalaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_initial_salary', function (Blueprint $table) {
            $table->increments('id');
            $table->string('emp_id');
            $table->string('employeeType');
            $table->double('basic_salary');
            $table->double('overdue')->nullable();
            $table->DATE('date');
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
        Schema::dropIfExists('employee_initial_salary');
    }
}
