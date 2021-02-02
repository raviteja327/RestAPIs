<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCUserRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_user_roles', function (Blueprint $table) {

            $table->engine = 'InnoDB';
            $table->string('c_role_hash');
            $table->primary('c_role_hash');
            $table->string('c_role_name', 50)->unique();
            $table->string('c_role_description')->nullable();
            $table->string('a_hash');
            $table->string('created_by', 50)->nullable();
            $table->string('updated_by', 50)->nullable();
            $table->tinyInteger('status')->default('1');
            $table->timestamps();
        });
        Schema::table('c_user_roles', function($table){
            $table->foreign('a_hash')->references('a_hash')->on('admin_users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('c_user_roles');
    }
}
