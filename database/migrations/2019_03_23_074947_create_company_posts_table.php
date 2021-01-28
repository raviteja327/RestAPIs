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
            $table->string('post_author', 50);
            $table->datetime('post_date');
            $table->string('post_content');
            $table->string('post_title', 50);
            $table->string('post_except');
            $table->string('post_status');
            $table->string('comment_status');
            $table->string('post_comment');
            $table->string('post_password', 20);
            $table->string('post_name', 50);
            $table->datetime('post_modified');
            $table->datetime('post_modified_gmt');
            $table->string('post_content_filtered');
            $table->integer('post_parent');
            $table->integer('menu_order');
            $table->string('post_type');
            $table->string('post_mine_type');
            $table->integer('comment_count');
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
