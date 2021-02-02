<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_users', function (Blueprint $table) {
            $table->string('user_hash');
            $table->primary('user_hash');
            $table->string('user_name', 50);
            $table->string('user_password');
            $table->string('user_email', 100)->unique();
            $table->string('user_url')->nullable();
            $table->datetime('user_registered_at')->nullable();
            $table->string('user_activation_key')->nullable();
            $table->integer('user_status')->nullable();
            $table->string('c_token');
            $table->string('c_hash');
            $table->string('c_sec_key');
            $table->string('created_by', 50)->nullable();
            $table->string('updated_by', 50)->nullable();
            $table->string('company_db_user_hash');
            $table->tinyInteger('status')->default('1');
            $table->timestamps();
        });

        Schema::table('company_users', function($table){
            $table->foreign('c_hash')->references('c_hash')->on('companies');
            $table->foreign('c_token')->references('c_token')->on('companies');
            $table->foreign('c_sec_key')->references('c_sec_key')->on('companies');
            $table->foreign('company_db_user_hash')->references('company_db_user_hash')->on('company_db_users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_users');
    }
}
