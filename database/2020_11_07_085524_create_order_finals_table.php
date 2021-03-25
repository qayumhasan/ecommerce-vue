<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderFinalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_finals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('invoice_id');
            $table->integer('user_id');
            $table->string('total_price');
            $table->integer('total_quantity');
            $table->integer('payment_type');
            $table->integer('shipping_type')->default(1);
            $table->text('shipping_address');
            $table->integer('dalevary');
            $table->integer('payment_status')->default(0);
            $table->string('cupon_value');
            $table->integer('payment_secoure_id');
            $table->text('product');
            $table->string('cus_name');
            $table->string('phone');
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
        Schema::dropIfExists('order_finals');
    }
}
