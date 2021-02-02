<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganisationTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organisation_types', function (Blueprint $table) {
            $table->string('org_type_hash');
            $table->primary('org_type_hash');
            $table->string('org_type_name', 50)->unique();
            $table->string('org_type_desc')->nullable();
            $table->string('created_by', 50)->nullable();
            $table->string('updated_by', 50)->nullable();
            $table->string('a_hash');
            $table->tinyInteger('status')->default('1');
            $table->timestamps();
        });

        Schema::table('organisation_types', function($table){
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
        Schema::dropIfExists('organisation_types');
    }
}
