<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCProductTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_product_types', function (Blueprint $table) {
            $table->string('product_type_hash');
            $table->primary('product_type_hash');
            $table->string('employee_hash');
            $table->foreign('employee_hash')->references('employee_hash')->on('c_employees');
            $table->string('product_type_name')->unique();
            $table->string('product_type_description')->nullable();
            $table->string('physical_product')->nullable();
            $table->string('virtual_product')->nullable();
            $table->string('downloadable_product')->nullable();
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
        Schema::dropIfExists('c_product_types');
    }
}
