<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrmSalesCompanyVisitingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crm_sales_company_visiting', function (Blueprint $table) {
            $table->string('sales_company_hash');
            $table->foreign('sales_company_hash')->references('sales_company_hash')->on('crm_sales_company');
            $table->text('street_house_number');
            $table->integer('zip_code')->unique();
            $table->string('town',100);
            $table->string('country_hash');
            $table->foreign('country_hash')->references('country_hash')->on('countries');
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
        Schema::dropIfExists('crm_sales_company_visiting');
    }
}
