<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('meta_title')->nullable();
            $table->string('meta_author')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_key')->nullable();
            $table->text('google_verification')->nullable();
            $table->text('bing_verification')->nullable();
            $table->text('google_analytic')->nullable();
            $table->text('alexa_analytic')->nullable();
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
        Schema::dropIfExists('seo');
    }
}
