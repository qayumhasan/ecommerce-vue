<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderPlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_places', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('shipping_id');
            $table->string('payment_method_id');
            $table->text('comment')->nullable();
            $table->string('order_id');
            $table->string('user_id');
            $table->string('cart_id');
            $table->string('total_price');
            $table->string('total_quantity');
            $table->integer('cupon_value');
            $table->integer('cupon_discount');
            $table->string('is_paid')->default(0);
            $table->string('status')->nullable();
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
        Schema::dropIfExists('order_places');
    }
}
