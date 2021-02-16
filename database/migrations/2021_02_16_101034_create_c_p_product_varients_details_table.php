<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCPProductVarientsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_p_product_varients_details', function (Blueprint $table) {
            $table->string('product_hash');
            $table->foreign('product_hash')->references('product_hash')->on('c_products');
            $table->string('product_varient_hash');
            $table->foreign('product_varient_hash')->references('product_varient_hash')->on('c_p_product_varients');
            $table->string('product_varient_name_details')->nullable();
            $table->string('employee_hash');
            $table->foreign('employee_hash')->references('employee_hash')->on('c_employees');
            $table->string('c_hash');
            $table->foreign('c_hash')->references('c_hash')->on('companies');
            $table->string('c_token');
            $table->foreign('c_token')->references('c_token')->on('companies');
            $table->string('created_by',50)->nullable();
            $table->string('updated_by',50)->nullable();
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('c_p_product_varients_details');
    }
}
