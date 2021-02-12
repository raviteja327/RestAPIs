<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_invoices', function (Blueprint $table) {
            $table->string('invoice_hash');
            $table->primary('invoice_hash');
            $table->string('order_hash');
            $table->string('product_hash');
            $table->string('coupon_hash');
            $table->integer('quantity')->nullable();
            $table->integer('price')->nullable();
            $table->string('c_token');
            $table->string('c_hash');
            $table->string('c_sec_key');
            $table->string('created_by', 50)->nullable();
            $table->string('updated_by', 50)->nullable();
            $table->tinyInteger('status')->default('1');
            $table->timestamps();
        });

        Schema::table('item_invoices', function($table){
            $table->foreign('order_hash')->references('order_hash')->on('orders');
            $table->foreign('product_hash')->references('product_hash')->on('products');
            $table->foreign('c_hash')->references('c_hash')->on('companies');
            $table->foreign('c_token')->references('c_token')->on('companies');
            $table->foreign('c_sec_key')->references('c_sec_key')->on('companies');
            $table->foreign('coupon_hash')->references('coupon_hash')->on('coupons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_invoices');
    }
}
