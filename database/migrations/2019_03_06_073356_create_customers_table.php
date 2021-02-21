<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->string('customer_hash');
            $table->primary('customer_hash');
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('email', 100)->unique();
            $table->bigInteger('home_phone');
            $table->bigInteger('contact_number');
            $table->string('door_no', 50)->nullable();
            $table->string('region', 50)->nullable();
            $table->string('city', 50)->nullable();
            $table->integer('postal_code')->nullable();
            $table->string('country', 50);
            $table->string('c_token');
            $table->string('created_by', 50);
            $table->string('updated_by', 50);
            $table->tinyInteger('status')->default('1');
            $table->timestamps();
        });

        Schema::table('customers', function($table){
            $table->foreign('c_token')->references('c_token')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
