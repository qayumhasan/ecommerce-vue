<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlashDealDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flash_deal_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('flash_deal_id');
            $table->unsignedBigInteger('product_id');
            $table->bigInteger('discount');
            $table->string('discount_type');
            $table->boolean('is_deleted')->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->foreign('flash_deal_id')->references('id')->on('flash_deals')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flash_deal_details');
    }
}
