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
        Schema::create('primary_marks', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->string('year')->nullable();
            $table->string('class')->nullable();
            $table->string('term')->nullable();
            $table->integer('subject_id')->nullable();
            $table->string('exam_type')->nullable();
            $table->integer('user_id')->nullable();
            $table->double('marks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('primary_marks');
    }
};
