<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_comments', function (Blueprint $table) {
            $table->string('comment_hash');
            $table->primary('comment_hash');
            $table->string('post_hash');
            $table->string('comment_author', 50);
            $table->string('comment_author_email', 100)->unique();
            $table->string('comment_author_url')->nullable();
            $table->string('comment_author_ip')->nullable();
            $table->string('comment_content')->nullable();
            $table->string('comment_karma')->nullable();
            $table->string('comment_approved', 20)->nullable();
            $table->string('comment_agent', 50)->nullable();
            $table->string('comment_parent')->nullable();
            $table->datetime('comment_date')->nullable();
            $table->datetime('comment_date_gmt')->nullable();
            $table->string('user_hash');
            $table->string('c_token');
            $table->string('c_hash');
            $table->string('c_sec_key');
            $table->string('created_by', 50)->nullable();
            $table->string('updated_by', 50)->nullable();
            $table->tinyInteger('status')->default('1');
            $table->timestamps();
        });

        Schema::table('post_comments', function($table){
            $table->foreign('c_hash')->references('c_hash')->on('companies');
            $table->foreign('c_token')->references('c_token')->on('companies');
            $table->foreign('c_sec_key')->references('c_sec_key')->on('companies');
            $table->foreign('user_hash')->references('user_hash')->on('company_users');
            $table->foreign('post_hash')->references('post_hash')->on('company_posts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_comments');
    }
}
