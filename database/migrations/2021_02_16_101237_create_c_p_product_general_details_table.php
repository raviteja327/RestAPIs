<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCPProductGeneralDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_p_product_general_details', function (Blueprint $table) {
            $table->string('product_hash');
            $table->foreign('product_hash')->references('product_hash')->on('c_products');
            $table->integer('regular_price')->nullable();
            $table->integer('selling_price')->nullable();
            $table->string('product_sku')->nullable();
            $table->date('scheduled_from_date')->nullable();
            $table->date('scheduled_to_date')->nullable();
            $table->string('employee_hash');
            $table->foreign('employee_hash')->references('employee_hash')->on('c_employees');
            $table->string('c_hash');
            $table->foreign('c_hash')->references('c_hash')->on('companies');
            $table->string('c_token');
            $table->foreign('c_token')->references('c_token')->on('companies');
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
        Schema::dropIfExists('c_p_product_general_details');
    }
}
