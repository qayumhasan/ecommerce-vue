<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGatewayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gateway', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('str_publish_key')->nullable();
            $table->string('str_secret_key')->nullable();
            $table->string('pay_client_id')->nullable();
            $table->string('pay_secret_key')->nullable();
            $table->string('mol_publish_key')->nullable();
            $table->string('mol_secret_key')->nullable();
            $table->string('twocheck_publish_key')->nullable();
            $table->string('twocheck_secret_key')->nullable();
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
        Schema::dropIfExists('gateway');
    }
}
