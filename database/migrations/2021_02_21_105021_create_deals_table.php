<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deals', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('deals_hash');
            $table->primary('deals_hash');
            $table->string('deals_name');
            $table->string('date')->nullable();
            $table->string('notes')->nullable();
            $table->string('pipeline_hash');
            $table->foreign('pipeline_hash')->references('pipeline_hash')->on('pipeline_strategies');
            $table->string('employee_hash');
            $table->foreign('employee_hash')->references('employee_hash')->on('c_employees');
            $table->string('sales_company_hash');
            $table->foreign('sales_company_hash')->references('sales_company_hash')->on('crm_sales_company');
            $table->string('c_token');
            $table->foreign('c_token')->references('c_token')->on('companies');
            $table->string('c_hash');
            $table->foreign('c_hash')->references('c_hash')->on('companies');
            $table->string('c_sec_key');
            $table->foreign('c_sec_key')->references('c_sec_key')->on('companies');
            $table->string('created_by', 50);
            $table->string('updated_by', 50);
            $table->tinyInteger('status')->default('1');
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
        Schema::dropIfExists('deals');
    }
}
