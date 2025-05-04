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
        Schema::create('courses', function (Blueprint $table) {
            $table->id('courseID');
            $table->foreignId('department_id')->constrained('departments', 'departmentID')->cascadeOnDelete();
            $table->foreignId('instructor_id')->constrained('instructors', 'instructorID')->cascadeOnDelete();
            $table->string('title')->unique();
            $table->string('credit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
