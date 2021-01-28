<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderStatusHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_status_histories', function (Blueprint $table) {
            $table->string('order_status_history_hash');
            $table->primary('order_status_history_hash');
            $table->string('invoice_hash');
            $table->string('status_hash');
            $table->string('shipping_status_hash');
            $table->timestamp('date_time');
            $table->string('c_token');
            $table->string('c_hash');
            $table->string('c_sec_key');
            $table->string('created_by', 50);
            $table->string('updated_by', 50);
            $table->tinyInteger('status')->default('1');
            $table->timestamps();
        });

        Schema::table('order_status_histories', function($table){
            $table->foreign('invoice_hash')->references('invoice_hash')->on('item_invoices');
            $table->foreign('status_hash')->references('status_hash')->on('order_status_s');
            $table->foreign('c_hash')->references('c_hash')->on('companies');
            $table->foreign('c_token')->references('c_token')->on('companies');
            $table->foreign('c_sec_key')->references('c_sec_key')->on('companies');
            $table->foreign('shipping_status_hash')->references('shipping_status_hash')->on('shipping_statuses');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_status_histories');
    }
}
