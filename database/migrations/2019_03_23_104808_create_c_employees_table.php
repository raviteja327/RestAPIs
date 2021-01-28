<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_employees', function (Blueprint $table) {
            $table->string('employee_hash');
            $table->primary('employee_hash');
            $table->string('company_hash');
            $table->string('c_role_hash');
            $table->string('first_name', 50);
            $table->string('password');
            $table->string('last_name', 50);
            $table->string('email', 100);
            $table->datetime('birth_date');
            $table->string('address', 100);
            $table->string('city', 50);
            $table->string('region', 50);
            $table->integer('postal_code');
            $table->string('country', 50);
            $table->bigInteger('home_phone');
            $table->decimal('salary', 10, 2);
            $table->string('c_token');
            $table->string('c_hash');
            $table->string('c_sec_key');
            $table->string('created_by', 50);
            $table->string('updated_by', 50);
            $table->tinyInteger('status')->default('1');
            $table->timestamps();
        });

        Schema::table('c_employees', function($table){
            $table->foreign('c_hash')->references('c_hash')->on('companies');
            $table->foreign('c_token')->references('c_token')->on('companies');
            $table->foreign('c_sec_key')->references('c_sec_key')->on('companies');
            $table->foreign('c_role_hash')->references('c_role_hash')->on('c_user_roles');
            $table->foreign('company_hash')->references('company_hash')->on('companies');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('c_employees');
    }
}
