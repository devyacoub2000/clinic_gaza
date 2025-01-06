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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            
             $table->string('patient_name');

            $table->string('phone', 20);

            $table->foreignId('doctor_id')->nullable()->constrained('doctors')
            ->nullOnDelete();

            $table->foreignId('department_id')->nullable()->constrained('departments')
            ->nullOnDelete();

            $table->date('date');

            $table->string('status')->default('pendding');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
