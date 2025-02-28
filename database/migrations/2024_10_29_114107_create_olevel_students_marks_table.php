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
        Schema::create('olevel_students_marks', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->string('id_no')->nullable();
            $table->integer('year_id')->nullable();
            $table->integer('class_id')->nullable();
            $table->integer('term_id')->nullable();
            $table->integer('subject_id')->nullable();
            $table->integer('exam_type_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->double('paper1_marks')->nullable();
            $table->double('paper2_marks')->nullable();
            $table->double('paper3_marks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('olevel_students_marks');
    }
};
