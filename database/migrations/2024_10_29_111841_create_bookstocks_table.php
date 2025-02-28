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
        Schema::create('bookstocks', function (Blueprint $table) {
            $table->id();
            $table->string('book_name');
            $table->string('book_qty');
            $table->string('edition');
            $table->integer('author_id');
            $table->integer('category_id');
            $table->string('price')->nullable(); 
            $table->string('purchase_date');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookstocks');
    }
};
