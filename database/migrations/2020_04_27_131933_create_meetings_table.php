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
            $table->string('name', 100)->default('Meeting Name');
            $table->string('type', 100)->nullable()->default('Meeting Type');
            $table->string('location', 100)->nullable()->default('Meeting Location');
            $table->mediumText('agenda', 100)->nullable()->default('Meeting Agenda');
            $table->timestamp('datetime');
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
