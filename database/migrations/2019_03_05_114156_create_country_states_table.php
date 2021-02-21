<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountryStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country_states', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('state_hash');
            $table->primary('state_hash');
            $table->string('state_name', 50)->unique();
            $table->string('state_desc')->nullable();
            $table->integer('state_code')->nullable();
            $table->string('created_by', 50);
            $table->string('updated_by', 50);
            $table->string('country_hash');
            $table->string('a_hash');
            $table->tinyInteger('status')->default('1');
            $table->timestamps();
        });

        Schema::table('country_states', function($table){
            $table->foreign('a_hash')->references('a_hash')->on('admin_users');
            $table->foreign('country_hash')->references('country_hash')->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('country_states');
    }
}
