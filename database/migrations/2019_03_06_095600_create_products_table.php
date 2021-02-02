<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('product_hash');
            $table->primary('product_hash');
            $table->string('product_categories_type_hash');
            $table->string('company_hash');
            $table->string('product_categories_image', 100)->unique();
            $table->string('tags', 100)->nullable();
            $table->string('attributes', 100)->nullable();
            $table->decimal('unit_price', 8, 2)->nullable();
            $table->integer('total_stock')->nullable();
            $table->tinyInteger('units_in_stock')->nullable();
            $table->tinyInteger('units_in_order')->nullable();
            $table->string('c_token');
            $table->string('c_hash');
            $table->string('c_sec_key');
            $table->string('created_by', 50)->nullable();
            $table->string('updated_by', 50)->nullable();
            $table->string('company_db_user_hash');
            $table->tinyInteger('status')->default('1');
            $table->timestamps();
        });

        Schema::table('products', function($table){
            $table->foreign('company_db_user_hash')->references('company_db_user_hash')->on('company_db_users');
            $table->foreign('product_categories_type_hash')->references('product_categories_type_hash')->on('product_categories');
            $table->foreign('c_hash')->references('c_hash')->on('companies');
            $table->foreign('c_token')->references('c_token')->on('companies');
            $table->foreign('c_sec_key')->references('c_sec_key')->on('companies');
            $table->foreign('company_hash')->references('company_hash')->on('companies');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
