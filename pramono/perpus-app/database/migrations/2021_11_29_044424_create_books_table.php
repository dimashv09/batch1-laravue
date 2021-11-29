<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->integer('isbn')->unique();
            $table->char('title');
            $table->year('year');
            $table->foreignId('publisher_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('writer_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('catalog_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('books');
    }
}
