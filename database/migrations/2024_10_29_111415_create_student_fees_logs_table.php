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
        Schema::create('student_fees_logs', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->integer('previous_fees')->nullable();
            $table->integer('present_fees')->nullable();
            $table->integer('increment_fees')->nullable();
            $table->integer('previous_balance')->nullable();
            $table->integer('current_balance')->nullable();
            $table->date('effected_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_fees_logs');
    }
};
