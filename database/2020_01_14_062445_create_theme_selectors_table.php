<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThemeSelectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theme_selectors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('css_name')->unique();
            $table->string('js_name')->unique();
            $table->string('header_name')->unique();
            $table->string('footer_name')->unique();
            $table->string('theme_name')->unique();
            $table->string('theme_display_name')->unique();
            $table->string('theme_image')->unique();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('theme_selectors');
    }
}
