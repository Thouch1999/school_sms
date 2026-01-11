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
        Schema::create('students', function (Blueprint $table) {
            $table->id('student_id');
            $table->string('student_code', 20)->unique();
            $table->string('full_name', 100);
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->date('date_of_birth')->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('email', 100)->nullable()->unique();
            $table->text('address')->nullable();
            $table->string('nationality', 50)->nullable();
            $table->string('photo', 255)->nullable();
            $table->enum('status', ['Active', 'Inactive', 'Graduated', 'Suspended'])->default('Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
