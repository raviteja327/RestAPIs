<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeSliderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_slider', function (Blueprint $table) {
            $table->string('slider_hash');
            $table->primary('slider_hash');
            $table->string('slider_name', 100)->unique();
            $table->string('animation_hash');
            $table->foreign('animation_hash')->references('animation_hash')->on('animation');
            $table->string('slider_image');
            $table->string('c_hash');
            $table->foreign('c_hash')->references('c_hash')->on('companies');
            $table->string('c_token');
            $table->foreign('c_token')->references('c_token')->on('companies');
            $table->string('c_sec_key');
            $table->foreign('c_sec_key')->references('c_sec_key')->on('companies');
            $table->string('created_by', 50);
            $table->string('updated_by', 50);
            $table->tinyinteger('status')->default('1');
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
        Schema::dropIfExists('home_slider');
    }
}
