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
        Schema::create('job_matched', function (Blueprint $table) {
            $table->id();
            $table->boolean('location_match');
            $table->boolean('salary_match');
            $table->boolean('type_match');
            $table->integer('skill_match_percent');
            $table->integer('total_match_percent');
            $table->timestamps();

            $table->foreignId('jobpost_id')->constrained('job_posts')->onDelete('cascade');
            $table->foreignId('jobseeker_id')->constrained('jobseeker')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_matched');
    }
};
