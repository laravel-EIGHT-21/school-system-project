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
        Schema::create('medicines_stocks', function (Blueprint $table) {
            $table->id();
            $table->integer('medicine_id')->nullable();
            $table->double('medicine_qty')->nullable();
            $table->string('quantity_type')->nullable();
            $table->date('mfg_date')->nullable();
            $table->date('expire_date')->nullable();
            $table->string('supplier')->nullable();
            $table->string('invoice_no')->nullable();
            $table->double('unit_price')->nullable(); 
            $table->double('buying_price')->nullable(); 
            $table->date('purchase_date');
            $table->string('purchase_month')->nullable();
            $table->string('purchase_year')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicines_stocks');
    }
};
