<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFooterOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footer_options', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('footer_text');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('copyright');
            $table->string('payment_image')->nullable();
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
        Schema::dropIfExists('footer_options');
    }
}
