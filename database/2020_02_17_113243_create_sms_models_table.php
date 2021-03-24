<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmsModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms_models', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sms_url');
            $table->string('sms_username');
            $table->string('sms_password');
            $table->string('sms_type');
            $table->string('sms_masking');
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
        Schema::dropIfExists('sms_models');
    }
}
