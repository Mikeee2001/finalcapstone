<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jobseeker', function (Blueprint $table) {
            $table->id();

            $table->string('address');
            $table->integer('expected_salary');
            $table->text('application_letter');
            $table->text('resume');
            $table->enum('job_type',['full-time','part-time']);
            $table->timestamps();

            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobseeker');
    }
};
