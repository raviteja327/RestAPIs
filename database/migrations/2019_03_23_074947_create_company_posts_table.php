<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_posts', function (Blueprint $table) {
            $table->string('post_hash');
            $table->primary('post_hash');
            $table->string('post_author', 50)->nullable();
            $table->datetime('post_date')->nullable();
            $table->string('post_content')->nullable();
            $table->string('post_title', 50)->unique();
            $table->string('post_except')->nullable();
            $table->string('post_status')->nullable();
            $table->string('comment_status')->nullable();
            $table->string('post_comment')->nullable();
            $table->string('post_password');
            $table->string('post_name', 50)->nullable();
            $table->datetime('post_modified')->nullable();
            $table->datetime('post_modified_gmt')->nullable();
            $table->string('post_content_filtered')->nullable();
            $table->integer('post_parent')->nullable();
            $table->integer('menu_order')->nullable();
            $table->string('post_type')->nullable();
            $table->string('post_mine_type')->nullable();
            $table->integer('comment_count')->nullable();
            $table->string('c_token');
            $table->string('c_hash');
            $table->string('c_sec_key');
            $table->string('created_by', 50);
            $table->string('updated_by', 50);
            $table->tinyInteger('status')->default('1');
            $table->timestamps();
        });

        Schema::table('company_posts', function($table){
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
        Schema::dropIfExists('company_posts');
    }
}
