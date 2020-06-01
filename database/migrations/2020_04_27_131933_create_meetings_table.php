<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->default(12);
            $table->bigInteger('user_check_id')->unsigned()->nullable();
            $table->bigInteger('user_approve_id')->unsigned()->nullable();
            $table->bigInteger('user_deny_id')->unsigned()->nullable();
            $table->bigInteger('project_id')->unsigned()->default(12);
            $table->string('name', 100)->default('Meeting Name');
            $table->string('type', 100)->nullable()->default('Meeting Type');
            $table->string('link', 500)->nullable()->default('Meeting Link');
            $table->string('location', 500)->nullable()->default('Meeting Location');
            $table->mediumText('agenda', 100)->nullable()->default('Meeting Agenda');
            $table->longText('minutes', 100)->nullable()->default('Meeting Minutes');
            $table->integer('status')->default(0);
            $table->string('recurring_day', 500)->default('Monday');
            $table->string('recurring_time', 500)->default('00:00');
            $table->timestamp('start')->nullable();
            $table->timestamp('end')->nullable();
            $table->timestamp('approved')->nullable();
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
        Schema::dropIfExists('meetings');
    }
}
