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
        Schema::create('fees_category_amounts', function (Blueprint $table) {
            $table->id();
            $table->string('rand_no');
            $table->integer('fee_category_id');
            $table->integer('class_id');
            $table->double('amount');
            $table->integer('term_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fees_category_amounts');
    }
};
