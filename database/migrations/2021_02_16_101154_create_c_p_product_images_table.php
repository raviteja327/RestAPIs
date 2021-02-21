<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCPProductImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_p_product_images', function (Blueprint $table) {
            $table->string('product_hash');
            $table->foreign('product_hash')->references('product_hash')->on('c_products');
            $table->string('image_url')->nullable();
            $table->string('img_extension')->nullable();
            $table->string('img_type')->nullable();
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
        Schema::dropIfExists('c_p_product_images');
    }
}
