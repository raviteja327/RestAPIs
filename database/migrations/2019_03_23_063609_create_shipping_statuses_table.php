<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_statuses', function (Blueprint $table) {
            $table->string('shipping_status_hash');
            $table->primary('shipping_status_hash');
            $table->string('shipping_status_name', 50)->unique();
            $table->string('c_token');
            $table->string('c_hash');
            $table->string('c_sec_key');
            $table->string('created_by', 50);
            $table->string('updated_by', 50);
            $table->tinyInteger('status')->default('1');
            $table->timestamps();
        });

        Schema::table('shipping_statuses', function($table){
            $table->foreign('c_hash')->references('c_hash')->on('companies');
            $table->foreign('c_token')->references('c_token')->on('companies');
            $table->foreign('c_sec_key')->references('c_sec_key')->on('companies');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipping_statuses');
    }
}
