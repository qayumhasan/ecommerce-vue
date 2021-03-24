<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_name');
            $table->string('product_sku');
            $table->integer('cate_id');
            $table->integer('subcate_id');
            $table->integer('resubcate_id');
            $table->string('product_price');
            $table->string('color');
            $table->string('variations');
            $table->integer('allow_product_condition')->default(0);
            $table->integer('product_condition');
            $table->integer('brand');
            $table->integer('allow_product_measurement')->default(0);
            $table->integer('product_measurement');
            $table->integer('allow_flash_deal')->default(0);
            $table->string('flash_deal_start_date');
            $table->string('flash_deal_end_date');
            $table->integer('flash_deal_type');
            $table->string('flash_deal_price');
            $table->text('product_description');
            $table->text('buy_and_return_policy');
            $table->string('shipping_time');
            $table->string('meta_tag');
            $table->string('meta_description');
            $table->string('photos');
            $table->string('thumbnail_img');
            $table->integer('number_of_sale')->nullable();
            $table->integer('is_deleted')->default(0);
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('products');
    }
}
