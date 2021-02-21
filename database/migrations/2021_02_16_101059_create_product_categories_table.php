<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_categories', function (Blueprint $table) {
            $table->string('product_categories_hash');
            $table->primary('product_categories_hash');
            $table->string('product_categories_name')->unique();
            $table->string('category_description')->nullable();
            $table->tinyInteger('sub_category')->nullable();
            $table->string('product_categories_image')->nullable();
            $table->string('category_details')->nullable();
            $table->string('company_db_user_hash');
            $table->foreign('company_db_user_hash')->references('company_db_user_hash')->on('company_db_users');
            $table->string('c_hash');
            $table->foreign('c_hash')->references('c_hash')->on('companies');
            $table->string('c_token');
            $table->foreign('c_token')->references('c_token')->on('companies');
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
        Schema::dropIfExists('product_categories');
    }
}
