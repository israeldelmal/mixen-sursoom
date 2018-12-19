<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetadataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metadata', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ss_title', 300);
            $table->string('ss_description', 155);
            $table->string('ss_keywords', 300);
            $table->string('gba_title', 300);
            $table->string('gba_description', 155);
            $table->string('gba_keywords', 300);
            $table->string('odoo_title', 300);
            $table->string('odoo_description', 155);
            $table->string('odoo_keywords', 300);
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
        Schema::dropIfExists('metadata');
    }
}
