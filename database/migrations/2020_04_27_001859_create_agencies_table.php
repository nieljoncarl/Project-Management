<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agencies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->string('name', 100)->default('Agency Name');
            $table->string('address', 100)->nullable()->default('Agency Address');
            $table->string('image', 100)->nullable()->default('Agency Logo');
            $table->string('contact_number', 100)->nullable()->default('+639123456789');
            $table->string('contact_email', 100)->nullable()->default('contact@fundingagency.com');
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
        Schema::dropIfExists('agencies');
    }
}
