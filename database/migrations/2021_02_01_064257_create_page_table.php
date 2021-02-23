<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page', function (Blueprint $table) {
            $table->string('c_hash');
            $table->foreign('c_hash')->references('c_hash')->on('companies');
            $table->string('c_token');
            $table->foreign('c_token')->references('c_token')->on('companies');
            $table->string('c_sec_key');
            $table->foreign('c_sec_key')->references('c_sec_key')->on('companies');
            $table->string('page_title', 50)->unique();
            $table->string('page_hash');
            $table->primary('page_hash');
            $table->string('page_description')->nullable();
            $table->string('meta_keys', 100);
            $table->text('social_media_links');
            $table->tinyinteger('publish_now')->nullable();
            $table->timestamp('publish_later')->nullable();
            $table->string('image', 100);
            $table->string('parent_group', 100)->nullable();
            $table->string('home_slider_hash');
            $table->string('mini_slider_hash');
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
        Schema::dropIfExists('page');
    }
}
