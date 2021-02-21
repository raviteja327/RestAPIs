<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePipelineStrategiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pipeline_strategies', function (Blueprint $table) {
            $table->string('pipeline_hash');
            $table->primary('pipeline_hash');
            $table->string('pipeline_name', 50);
            $table->string('employee_hash');
            $table->foreign('employee_hash')->references('employee_hash')->on('c_employees');
            $table->string('c_token');
            $table->foreign('c_token')->references('c_token')->on('companies');
            $table->string('c_hash');
            $table->foreign('c_hash')->references('c_hash')->on('companies');
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
        Schema::dropIfExists('pipeline_strategies');
    }
}
