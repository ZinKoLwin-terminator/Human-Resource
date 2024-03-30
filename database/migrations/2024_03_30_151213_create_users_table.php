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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable()->unique();
            $table->integer('interview')->default(1)->comment('0:cancel;1:pending;2:complete');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('profile_image')->nullable();
            $table->date('hire_date')->nullable();
            $table->string('job_id')->nullable();
            $table->string('salary')->nullable();
            $table->string('commission_pct')->nullable();
            $table->string('manager_id')->nullable();
            $table->string('department_id')->nullable();
            $table->string('position_id')->nullable();
            $table->rememberToken();
            $table->tinyInteger('is_role')->default(1)->comment('0:Employee;1:HR');
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
        Schema::dropIfExists('users');
    }
};
