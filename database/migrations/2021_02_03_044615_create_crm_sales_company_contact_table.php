<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrmSalesCompanyContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crm_sales_company_contact', function (Blueprint $table) {
            $table->string('sales_company_hash');
            $table->foreign('sales_company_hash')->references('sales_company_hash')->on('crm_sales_company');
            $table->string('first_name',50);
            $table->string('sur_name',20)->nullable();
            $table->biginteger('mobile');
            $table->string('email',100)->unique();
            $table->string('contact_hash');
            $table->primary('contact_hash');
            $table->string('image',150);
            $table->string('job_title',50);
            $table->tinyinteger('gender');
            $table->string('language',50)->nullable();
            $table->timestamp('time_zone');
            $table->string('description')->nullable();
            $table->string('created_by',50)->nullable();
            $table->string('updated_by',50)->nullable();
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
        Schema::dropIfExists('crm_sales_company_contact');
    }
}
