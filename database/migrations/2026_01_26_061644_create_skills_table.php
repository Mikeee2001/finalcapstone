<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('skill_name');
            $table->timestamps();
        });

        DB::table('skills')->insert([
            ['skill_name' => 'Electrician'],
            ['skill_name' => 'Plumber'],
            ['skill_name' => 'Carpenter'],
            ['skill_name' => 'Painter'],
            ['skill_name' => 'Mason'],
            ['skill_name' => 'Full Stack Developer'],
            ['skill_name' => 'Graphic Designer'],
            ['skill_name' => 'Content Writer'],
            ['skill_name' => 'Digital Marketer'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};
