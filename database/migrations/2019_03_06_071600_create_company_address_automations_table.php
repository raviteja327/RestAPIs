<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyAddressAutomationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_address_automations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('caa_hash');
            $table->primary('caa_hash');
            $table->FLOAT('latitude', 8, 2)->nullable();
            $table->FLOAT('logitude', 8, 2)->nullable();
            $table->string('contact_person_name', 50)->unique();
            $table->bigInteger('mobile_number');
            $table->string('c_token');
            $table->string('c_hash');
            $table->string('c_sec_key');
            $table->string('created_by', 50)->nullable();
            $table->string('updated_by', 50)->nullable();
            $table->tinyInteger('status')->default('1');
            $table->timestamps();
        });

        Schema::table('company_address_automations', function($table){
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
        Schema::dropIfExists('company_address_automations');
    }
}
