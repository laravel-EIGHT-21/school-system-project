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
        Schema::create('school_clinics', function (Blueprint $table) {
            $table->id();
            $table->string('clinic_no');
            $table->integer('student_id');
            $table->string('class')->nullable();
            $table->string('term')->nullable();
            $table->string('illness')->nullable();
            $table->integer('medicine_id');
            $table->string('dosage')->nullable();
            $table->string('diagnostics')->nullable();
            $table->string('medic_status')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('date')->nullable();
            $table->string('month')->nullable();
            $table->string('year')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_clinics');
    }
};
