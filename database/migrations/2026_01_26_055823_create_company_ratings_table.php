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
        Schema::create('company_ratings', function (Blueprint $table) {
            $table->id();
            $table->integer('rating');
            $table->text('review');
            $table->timestamps();

            $table->foreignId('company_id')->constrained('company_details')->onDelete('cascade');
            $table->foreignId('jobseeker_id')->constrained('jobseeker')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_ratings');
    }
};
