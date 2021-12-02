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
            $table->year('year')->nullable();
            $table->bigInteger('stock')->nullable();
            $table->integer('price')->nullable();
            $table->foreignId('publisher_id')->nullable()->constrained();
            $table->foreignId('writer_id')->nullable()->constrained();
            $table->foreignId('catalog_id')->nullable()->constrained();
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
