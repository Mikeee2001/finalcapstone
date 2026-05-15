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
        Schema::create('job_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('location', ['Awang', 'Bagocboc', 'Barra', 'Bonbon', 'Cauyonan', 'Igpit', 'Luyongbonbon', 'Malanang', 'Nangcaon', 'Patag', 'Poblacion', 'Tingalan']);
            $table->integer('salary');
            $table->enum('job_type', ['full-time', 'part-time']);
            $table->timestamps();
            $table->enum('status', ['active', 'inactive'])->default('inactive');

            $table->foreignId('company_id')->constrained('company_details')->onDelete('cascade');
            $table->foreignId('skill_id')->constrained('skills')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_post');
    }
};
