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
            $table->integer('isbn');
            $table->string('title', 64);
            $table->integer('year');
            $table->foreignId('publisher_id')->constrained(); // Set ForeignKey of Publisher Table
            $table->foreignId('author_id')->constrained(); // Set ForeignKey of Author Table
            $table->foreignId('catalog_id')->constrained(); // Set ForeignKey of Catalog Table
            $table->integer('qty');
            $table->integer('price');
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
