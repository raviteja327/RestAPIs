<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
            Schema::create('coupons', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->string('coupon_hash');
                $table->primary('coupon_hash');
                $table->string('product_hash');
                $table->string('company_hash');
                $table->string('coupon_code', 50)->nullable();
                $table->string('coupon_amount', 50)->nullable();
                $table->string('coupon_name', 50)->unique();
                $table->string('coupon_description')->nullable();
                $table->tinyinteger('total_stock')->nullable();
                $table->dateTime('active_date')->nullable();
                $table->dateTime('expiry_date')->nullable();
                $table->string('c_token');
                $table->string('c_hash');
                $table->string('c_sec_key');
                $table->string('created_by', 50);
                $table->string('updated_by', 50);
                $table->string('company_db_user_hash');
                $table->tinyInteger('status')->default('1');
                $table->timestamps();
            });
    
            Schema::table('coupons', function($table){
                $table->foreign('company_db_user_hash')->references('company_db_user_hash')->on('company_db_users');
                $table->foreign('product_hash')->references('product_hash')->on('c_products');
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
        Schema::dropIfExists('coupons');
    }
}
