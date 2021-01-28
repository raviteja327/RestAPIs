<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('country_hash');
            $table->primary('country_hash');
            $table->string('country_name', 50);
            $table->string('country_desc')->nullable();
            $table->integer('country_code')->nullable();
            $table->string('created_by', 50);
            $table->string('updated_by', 50);
            $table->string('a_hash');
            $table->tinyInteger('status')->default('1');
            $table->timestamps();
        });

        Schema::table('countries', function($table){
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
        Schema::dropIfExists('countries');
    }
}
