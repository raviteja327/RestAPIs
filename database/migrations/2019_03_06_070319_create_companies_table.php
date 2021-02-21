<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**p
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->string('company_hash');
            $table->primary('company_hash');
            $table->string('company_name', 50);
            $table->string('company_email', 100)->unique();
            $table->string('c_token')->unique();
            $table->string('c_hash')->unique();
            $table->string('c_sec_key')->unique();
            $table->tinyInteger('email_verification_details')->default('1');
            $table->string('created_by', 50);
            $table->string('updated_by', 50);
            $table->string('a_hash');
            $table->string('org_type_hash');
            $table->string('org_indus_type_hash');
            $table->string('application_type');
            $table->string('password_cnf');
            $table->tinyInteger('status')->default('1');
            $table->timestamps();
        });

        Schema::table('companies', function($table){
            $table->foreign('a_hash')->references('a_hash')->on('admin_users');
            $table->foreign('org_type_hash')->references('org_type_hash')->on('organisation_types');
            $table->foreign('org_indus_type_hash')->references('org_indus_type_hash')->on('organisation_industry_types');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('companies');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
       
    }
}
