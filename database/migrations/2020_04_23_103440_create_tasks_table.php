<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->default(12);
            $table->bigInteger('user_check_id')->unsigned()->nullable();
            $table->bigInteger('user_approve_id')->unsigned()->nullable();
            $table->bigInteger('user_deny_id')->unsigned()->nullable();
            $table->bigInteger('project_id')->default(12);
            $table->string('name', 100)->nullable()->default('Task Name');
            $table->longText('description')->nullable()->default('Task Description');       
            $table->integer('status')->default(0);
            $table->timestamp('start')->nullable();
            $table->timestamp('end')->nullable();
            $table->timestamp('started')->nullable();
            $table->timestamp('ended')->nullable();
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
        Schema::dropIfExists('tasks');
    }
}
