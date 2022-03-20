<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('priority')->nullable()->comment('Low Normal High Urgent');
            $table->unsignedInteger('status_id')->nullable();
            $table->unsignedInteger('type_id');
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('complete_date')->nullable();
            $table->string('customer_type')->nullable()->comment('Lead Opportunity Customer Close');
            $table->unsignedInteger('customer_id')->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('created_by_id');
            $table->unsignedInteger('modified_by_id')->nullable();
            $table->unsignedInteger('assigned_user_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('status_id');
            $table->index('type_id');
            $table->index('customer_id');
            $table->index('created_by_id');
            $table->index('modified_by_id');
            $table->index('assigned_user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
