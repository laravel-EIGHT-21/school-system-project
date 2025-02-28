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
        Schema::create('student_fees', function (Blueprint $table) {
            $table->id();
            $table->integer('year_id')->nullable();
            $table->integer('class_id')->nullable();
            $table->integer('student_id')->nullable();
            $table->string('id_no')->nullable();
            $table->integer('fee_category_id')->nullable();
            $table->integer('term_id')->nullable();
            $table->string('date')->nullable();
            $table->string('month')->nullable();
            $table->string('year')->nullable();
            $table->string('payment_mode')->nullable();
            $table->double('fee_amount')->nullable();
            $table->double('totalfee_amount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_fees');
    }
};
