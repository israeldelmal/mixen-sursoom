<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSursoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sursoom', function (Blueprint $table) {
            $table->increments('id');
            $table->string('img_1', 300);
            $table->string('img_2', 300);
            $table->string('img_3', 300);
            $table->string('img_4', 300);
            $table->string('img_5', 300);
            $table->string('img_6', 300);
            $table->string('header_h1', 300);
            $table->string('header_sub', 500);
            $table->string('about_h1', 300);
            $table->text('about_content', 10000);
            $table->string('break_h1', 300);
            $table->string('products_h1', 300);
            $table->text('products_sub', 1000);
            $table->string('docs_h1', 300);
            $table->text('docs_content_1', 10000);
            $table->string('docs_h2', 300);
            $table->text('docs_content_2', 10000);
            $table->string('blog_h1', 300);
            $table->text('blog_sub', 1000);
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
        Schema::dropIfExists('sursoom');
    }
}
