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
        Schema::create('issued_books', function (Blueprint $table) {
            $table->id();
            $table->integer('assign_student_id');
            $table->integer('class_id');
            $table->integer('year_id');
            $table->integer('term_id');
            $table->integer('book_id');
            $table->timestamp('issue_date');
            $table->string('return_date')->nullable();
            $table->string('issue_status')->nullable();
            $table->string('return_day')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issued_books');
    }
};
