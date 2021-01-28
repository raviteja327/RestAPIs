<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatesDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states_districts', function (Blueprint $table) {
            $table->string('dist_hash');
            $table->primary('dist_hash');
            $table->string('dist_name', 50);
            $table->string('dist_desc')->nullable();
            $table->integer('dist_code')->nullable();
            $table->string('created_by', 50);
            $table->string('updated_by', 50);
            $table->string('country_hash');
            $table->string('a_hash');
            $table->string('state_hash');
            $table->tinyInteger('status')->default('1');
            $table->timestamps();
        });

        Schema::table('states_districts', function($table){
            $table->foreign('a_hash')->references('a_hash')->on('admin_users');
            $table->foreign('country_hash')->references('country_hash')->on('countries');
            $table->foreign('state_hash')->references('state_hash')->on('country_states');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('states_districts');
    }
}
