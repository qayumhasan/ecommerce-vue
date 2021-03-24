<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('facebook')->default(1);
            $table->integer('google')->default(1);
            $table->integer('smtp')->default(1);
            $table->integer('cashondelevery')->default(1);
            $table->integer('paypal')->default(1);
            $table->integer('stripe')->default(1);
            $table->integer('ssl_commercez')->default(1);
            $table->integer('sms')->default(1);
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
        Schema::dropIfExists('activations');
    }
}
