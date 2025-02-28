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
        Schema::create('alevel_grades', function (Blueprint $table) {
            $table->id();
            $table->string('letter_grade');
            $table->double('numeric_grade');
            $table->string('start_marks');
            $table->string('end_marks');
            $table->integer('start_point');
            $table->integer('end_point');
            $table->string('remarks');  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alevel_grades');
    }
};
