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
        Schema::create('Members', function (Blueprint $table) {
            $table->id();
            $table->string('Name', 64);
            $table->char('Gender', 1);
            $table->char('Phone_Number', 15);
            $table->text('Address');
            $table->string('Email', 64);
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
        Schema::dropIfExists('Members');
    }
};
