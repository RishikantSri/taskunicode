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
        Schema::create('employee_salaries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employee_masters')->onDelete('cascade');
            $table->integer('salary_month');
            $table->decimal('basic_pay', 10, 2);
            $table->decimal('grade_pay', 10, 2);
            $table->decimal('hra', 10, 2);
            $table->decimal('ta', 10, 2);
            $table->decimal('da', 10, 2);
            $table->date('disbursed_on');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_salaries');
    }
};
