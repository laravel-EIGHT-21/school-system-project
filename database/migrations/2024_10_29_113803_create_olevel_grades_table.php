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
        Schema::create('olevel_grades', function (Blueprint $table) {
            $table->id();
            $table->string('grade_name');
            $table->string('start_marks');
            $table->string('end_marks');
            $table->string('remarks');  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('olevel_grades');
    }
};
