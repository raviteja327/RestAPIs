<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrontendCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frontend_company', function (Blueprint $table) {
            $table->string('company_name',50)->unique();
            $table->string('company_email',150)->unique();
            $table->string('c_token')->unique();
            $table->string('c_hash');
            $table->primary('c_hash');
            $table->string('c_sec_key')->unique();
            $table->biginteger('mobile');
            $table->string('password');
            $table->tinyinteger('android_service')->nullable();
            $table->tinyinteger('website_service')->nullable();
            $table->tinyinteger('ios_service')->nullable();
            $table->tinyinteger('application_service');
            $table->tinyinteger('email_verification_details')->default(1);
            $table->string('plan_hash');
            $table->foreign('plan_hash')->references('plan_hash')->on('plans');
            $table->string('template_name')->unique();
            $table->string('template_hash')->nullable();
            $table->string('logo_file')->nullable();
            $table->string('certificate_file')->nullable();
            $table->string('created_by',50)->nullable();
            $table->string('updated_by',50)->nullable();
            $table->string('source',10);
            $table->tinyinteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('frontend_company');
    }
}
