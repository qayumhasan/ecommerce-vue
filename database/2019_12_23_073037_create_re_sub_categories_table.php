<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('re_sub_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('resubcate_name');
            $table->string('resubcate_slug');
            $table->string('resubcate_tag');
            $table->integer('cate_id');
            $table->integer('subcate_id');
            $table->integer('resubcate_status')->default(1);
            $table->integer('is_deleted')->default(0);
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
        Schema::dropIfExists('re_sub_categories');
    }
}
