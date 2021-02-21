<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCOverviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_overviews', function (Blueprint $table) {
            $table->string('c_overview_hash');
            $table->primary('c_overview_hash');
            $table->string('c_full_name', 50)->unique();
            $table->string('c_founded', 50)->nullable();
            $table->string('c_founder', 50)->nullable();
            $table->string('c_ceo', 50)->nullable();
            $table->string('c_industry', 50)->nullable();
            $table->string('c_headquaters', 50)->nullable();
            $table->string('c_revenue', 50)->nullable();
            $table->string('c_sector', 50)->nullable();
            $table->string('c_website')->nullable();
            $table->string('c_token');
            $table->string('c_hash');
            $table->string('c_sec_key');
            $table->string('created_by', 50);
            $table->string('updated_by', 50);
            $table->tinyInteger('status')->default('1');
            $table->timestamps();
        });

        Schema::table('c_overviews', function($table){
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
        Schema::dropIfExists('c_overviews');
    }
}
