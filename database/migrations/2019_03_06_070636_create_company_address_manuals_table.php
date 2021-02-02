<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyAddressManualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_address_manuals', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('company_address_manuals_hash');
            $table->primary('company_address_manuals_hash');
            $table->string('address1', 100)->nullable();
            $table->string('address2', 100)->nullable();
            $table->string('street', 100)->nullable();
            $table->string('landmark', 100)->nullable();
            $table->integer('pincode')->unique();
            $table->string('contact_person_name', 50);
            $table->bigInteger('mobile_number');
            $table->string('c_token');
            $table->string('c_hash');
            $table->string('c_sec_key');
            $table->string('created_by', 50)->nullable();
            $table->string('updated_by', 50)->nullable();
            $table->string('dist_hash');
            $table->string('state_hash');
            $table->string('country_hash');
            $table->tinyInteger('status')->default('1');
            $table->timestamps();
        });

        Schema::table('company_address_manuals', function($table){
            $table->foreign('dist_hash')->references('dist_hash')->on('states_districts');
            $table->foreign('state_hash')->references('state_hash')->on('country_states');
            $table->foreign('country_hash')->references('country_hash')->on('countries');
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
        Schema::dropIfExists('company_address_manuals');
    }
}
