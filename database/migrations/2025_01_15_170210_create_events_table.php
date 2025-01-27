<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_category')->constrained('categories')->onDelete('cascade');
            $table->string('title_event');
            $table->string('subtitle')->nullable();
            $table->text('description');
            $table->text('content');
            $table->text('requirements');
            $table->date('ini_date');
            $table->date('end_date');
            $table->decimal('price', 8, 2);
            $table->string('location');
            $table->integer('capacity');
            $table->string('language')->default('español');
            $table->timestamps();
            $table->decimal('latitude', 10, 8)->nullable();     
            $table->decimal('longitude', 11, 8)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
};
