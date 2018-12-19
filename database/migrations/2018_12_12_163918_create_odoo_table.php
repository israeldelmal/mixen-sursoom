<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOdooTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('odoo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('header_img', 300);
            $table->string('header_h1', 300);
            $table->string('about_h1', 300);
            $table->text('about_content', 10000);
            $table->string('about_img', 300);
            $table->string('clients_h1', 300);
            $table->string('apps_h1', 300);
            $table->string('break_h1', 300);
            $table->string('break_img', 300);
            $table->string('meth_h1', 300);
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
        Schema::dropIfExists('odoo');
    }
}
