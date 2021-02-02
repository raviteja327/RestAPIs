<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_pages', function (Blueprint $table) {
            $table->string('c_company_hash');
            $table->primary('c_company_hash');
            $table->string('c_page_name', 50)->unique();
            $table->string('custom_field', 50)->nullable();
            $table->string('author', 50)->nullable();
            $table->string('c_page_description')->nullable();
            $table->string('c_link_id', 50)->nullable();
            $table->string('c_news', 100)->nullable();
            $table->string('c_partners', 100)->nullable();
            $table->string('c_reference', 100)->nullable();
            $table->string('c_carreer', 100)->nullable();
            $table->string('c_contact', 50)->nullable();
            $table->string('c_overview', 100)->nullable();
            $table->string('c_location', 50)->nullable();
            $table->string('c_token');
            $table->string('c_hash');
            $table->string('c_sec_key');
            $table->string('created_by', 50)->nullable();
            $table->string('updated_by', 50)->nullable();
            $table->tinyInteger('status')->default('1');
            $table->timestamps();
        });

        Schema::table('company_pages', function($table){
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
        Schema::dropIfExists('company_pages');
    }
}
