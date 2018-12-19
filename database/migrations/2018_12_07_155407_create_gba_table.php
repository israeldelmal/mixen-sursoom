<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGbaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gba', function (Blueprint $table) {
            $table->increments('id');
            $table->string('header_h1', 300);
            $table->string('header_sub', 300);
            $table->string('header_logo', 300);
            $table->string('header_img', 300);
            $table->string('about_h1', 300);
            $table->text('about_content', 10000);
            $table->string('about_img', 300);
            $table->string('break_h1', 300);
            $table->string('break_img', 300);
            $table->string('solutions_h1', 300);
            $table->string('solutions_sub', 300);
            $table->string('sistems_h1', 300);
            $table->string('sistems_img', 300);
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
        Schema::dropIfExists('gba');
    }
}
