<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payroll', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('employee_id')->nullable();
            $table->string('number_of_day_work')->nullable();
            $table->string('bonus')->nullable();
            $table->string('overtime')->nullable();
            $table->string('gross_salary')->nullable();
            $table->string('cash_advance')->nullable();
            $table->string('late_hours')->nullable();
            $table->string('absent_days')->nullable();
            $table->string('sss_contribution')->nullable();
            $table->string('philhealth')->nullable();
            $table->string('total_deductions')->nullable();
            $table->string('netpay')->nullable();
            $table->string('payroll_monthly')->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payroll');
    }
};
