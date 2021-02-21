<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('c_user_hash');
            $table->primary('c_user_hash');
            $table->string('name', 50);
            $table->string('email', 100)->unique();
            $table->bigInteger('mobile')->nullable();
            $table->string('photo')->nullable();
            $table->boolean('subscriber')->nullable();
            $table->boolean('paid_subscriber')->nullable();
            $table->string('password');
            $table->string('employee_hash');
            $table->foreign('employee_hash')->references('employee_hash')->on('c_employees');
            $table->string('created_by', 50);
            $table->string('updated_by', 50);
            $table->tinyInteger('status')->default('1');
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
        Schema::dropIfExists('c_users');
    }
}
