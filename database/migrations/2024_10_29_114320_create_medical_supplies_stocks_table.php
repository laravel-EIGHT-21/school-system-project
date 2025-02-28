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
        Schema::create('medical_supplies_stocks', function (Blueprint $table) {
            $table->id();
            $table->integer('equipment_id');
            $table->double('equipment_qty');
            $table->string('equipment_qty_type');
            $table->integer('supplier_id');
            $table->double('unit_price')->nullable(); 
            $table->date('purchase_date');
            $table->string('purchase_month')->nullable(); 
            $table->string('purchase_year')->nullable(); 
            $table->string('invoice_no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_supplies_stocks');
    }
};
