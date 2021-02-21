<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animation', function (Blueprint $table) {
            $table->string('animation_hash');
            $table->primary('animation_hash');
            $table->string('animation_name', 30)->unique();
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
        Schema::dropIfExists('animation');
    }
}
