<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->date('start_date');
            $table->integer('duration');
            $table->string('image')->nullable();
            $table->unsignedTinyInteger('is_active')->default(1); // Campo tinyint(1) para activar/desactivar
            $table->timestamps();
        });
    
        // Llama al seeder
        $this->call(CourseSeeder::class);
    }
    
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course');
    }
};
