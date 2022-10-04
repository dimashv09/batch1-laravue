<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Books', function (Blueprint $table) {
            $table->id();
            $table->integer('isbn');
            $table->string('title', 64);
            $table->integer('year');
            $table->unsignedBigInteger('Publisher_id');
            $table->unsignedBigInteger('Author_id');
            $table->unsignedBigInteger('Catalog_id');
            $table->integer('qty');
            $table->integer('price');
            $table->timestamps();

            $table->foreign('Publisher_id')->references('id')->on('Publishers');
            $table->foreign('Author_id')->references('id')->on('Authors');
            $table->foreign('Catalog_id')->references('id')->on('Catalogs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Books');
    }
};
