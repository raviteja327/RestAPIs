<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emails', function (Blueprint $table) {
            $table->string('emails_hash');
            $table->primary('emails_hash');
            $table->string('user_hash');
            $table->string('subject');
            $table->string('message');
            $table->string('c_token');
            $table->string('c_hash');
            $table->string('c_sec_key');
            $table->string('created_by', 50);
            $table->string('updated_by', 50);
            $table->tinyInteger('status')->default('1');
            $table->timestamps();
        });

        Schema::table('emails', function($table){
            $table->foreign('user_hash')->references('user_hash')->on('company_users');
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
        Schema::dropIfExists('emails');
    }
}
