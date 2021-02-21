<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyDbUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_db_users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('company_db_user_hash');
            $table->primary('company_db_user_hash');
            $table->string('company_db_user_name', 100);
            $table->string('company_db_user_email', 100)->unique();
            $table->string('company_db_user_password');
            $table->bigInteger('mobile');
            $table->tinyInteger('email_verification_details')->default('1');
            $table->tinyInteger('company_db_user_status')->default('1');
            $table->string('c_token');
            $table->string('c_hash');
            $table->string('c_sec_key');
            $table->string('created_by', 50);
            $table->string('updated_by', 50);
            $table->tinyInteger('status')->default('1');
            $table->timestamps();
        });

        Schema::table('company_db_users', function($table){
            $table->foreign('c_hash')->references('c_hash')->on('companies');
            $table->foreign('c_token')->references('c_token')->on('companies');
            $table->foreign('c_sec_key')->references('c_sec_key')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_db_users');
    }
}
