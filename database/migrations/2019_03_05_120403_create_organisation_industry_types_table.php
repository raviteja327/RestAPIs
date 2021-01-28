<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganisationIndustryTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organisation_industry_types', function (Blueprint $table) {
            $table->string('org_indus_type_hash');
            $table->primary('org_indus_type_hash');
            $table->string('org_indus_type_name', 50);
            $table->string('org_indus_type_desc')->nullable();
            $table->string('created_by', 50);
            $table->string('updated_by', 50);
            $table->string('a_hash');
            $table->string('org_type_hash');
            $table->tinyInteger('status')->default('1');
            $table->timestamps();
        });

        Schema::table('organisation_industry_types', function($table){
            $table->foreign('a_hash')->references('a_hash')->on('admin_users');
            $table->foreign('org_type_hash')->references('org_type_hash')->on('organisation_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organisation_industry_types');
    }
}
