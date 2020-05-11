<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->default(12);
            $table->bigInteger('user_check_id')->unsigned()->nullable();
            $table->bigInteger('user_approve_id')->unsigned()->nullable();
            $table->bigInteger('user_deny_id')->unsigned()->nullable();
            $table->bigInteger('funding_agency_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('alias')->nullable();
            $table->longText('description')->nullable()->default('Project Description');
            $table->longText('outcomes')->nullable()->default('Project Outcomes');
            $table->timestamp('start')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));;
            $table->timestamp('end')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));;
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('projects');
    }
}
