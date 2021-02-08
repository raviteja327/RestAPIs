<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrmSalesCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crm_sales_company', function (Blueprint $table) {
            $table->string('c_token');
            $table->foreign('c_token')->references('c_token')->on('companies');
            $table->string('c_hash');
            $table->foreign('c_hash')->references('c_hash')->on('companies');
            $table->string('c_sec_key');
            $table->foreign('c_sec_key')->references('c_sec_key')->on('companies');
            $table->string('sales_company_name',100)->unique();
            $table->string('sales_company_hash');
            $table->primary('sales_company_hash');
            $table->string('company_logo',100);
            $table->biginteger('mobile');
            $table->text('street_house_number')->nullable();
            $table->integer('zip_code');
            $table->string('town',100)->nullable();
            $table->string('country_hash');
            $table->foreign('country_hash')->references('country_hash')->on('countries');
            $table->string('vat_number',50);
            $table->string('coc_no',50)->nullable();
            $table->string('rsn',50)->nullable();
            $table->string('company_status',30);
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
        Schema::dropIfExists('crm_sales_company');
    }
}
