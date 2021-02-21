<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_products', function (Blueprint $table) {
            $table->string('product_hash');
            $table->primary('product_hash');
            $table->string('product_img_type')->nullable();
            $table->string('product_name')->unique();
            $table->string('product_description')->nullable();
            $table->string('product_short_description')->nullable();
            $table->string('product_type_hash');
            $table->foreign('product_type_hash')->references('product_type_hash')->on('c_product_types');
            $table->string('product_categories_hash');
            $table->foreign('product_categories_hash')->references('product_categories_hash')->on('product_categories');
            $table->string('product_featured_img_url')->nullable();
            $table->string('product_tags')->nullable();
            $table->string('meta_tags')->nullable();
            $table->string('employee_hash');
            $table->foreign('employee_hash')->references('employee_hash')->on('c_employees');
            $table->string('order_type_hash');
            $table->foreign('order_type_hash')->references('order_type_hash')->on('order_type');
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
        Schema::dropIfExists('c_products');
    }
}
