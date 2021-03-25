<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cupons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cupon_type');
            $table->string('cupon_code');
            $table->string('minimum_shopping');
            $table->text('product_id');
            $table->double('discount');
            $table->integer('discount_type');
            $table->string('cupon_start_date');
            $table->string('cupon_end_date');
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
        Schema::dropIfExists('cupons');
    }
}
