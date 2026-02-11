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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('event_name');
            $table->string('location');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->enum('color', ['purple', 'red', 'green'])->default('purple');
            $table->enum('status', ['upcoming', 'ongoing', 'completed'])->default('upcoming');
            $table->text('description')->nullable();

            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->timestamps();

        });
        DB::table('events')->insert([
            [
                'event_name' => 'Team Meeting',
                'location' => 'Zoom',
                'start_time' => '2026-02-20 10:00:00',
                'end_time' => '2026-02-20 11:00:00',
                'status' => 'upcoming',
                'description' => 'Monthly team sync',
                'color' => 'purple',
                'user_id' => 1,
            ],
            [
                'event_name' => 'Project Deadline',
                'location' => 'Office',
                'start_time' => '2026-02-28 17:00:00',
                'end_time' => '2026-02-28 17:00:00',
                'status' => 'upcoming',
                'color' => 'red',
                'description' => 'Submit final project report',
                'user_id' => 1,
            ]
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
