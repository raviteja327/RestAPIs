<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrmTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crm_tasks', function (Blueprint $table) {
            $table->string('c_hash');
            $table->foreign('c_hash')->references('c_hash')->on('companies');
            $table->string('c_token');
            $table->foreign('c_token')->references('c_token')->on('companies');
            $table->string('c_sec_key');
            $table->foreign('c_sec_key')->references('c_sec_key')->on('companies');
            $table->string('sales_company_hash');
            $table->foreign('sales_company_hash')->references('sales_company_hash')->on('crm_sales_company');
            $table->string('task_name',100)->unique();
            $table->string('task_hash');
            $table->primary('task_hash');
            $table->string('task_type',50);
            $table->timestamp('followup_date')->nullable();
            $table->string('notes',100)->nullable();
            $table->string('email_template',100);
            $table->tinyinteger('assign_task')->default(1)->nullable();
            $table->string('created_by',50)->nullable();
            $table->string('updated_by',50)->nullable();
            $table->tinyinteger('status')->default(1);
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
        Schema::dropIfExists('crm_tasks');
    }
}
