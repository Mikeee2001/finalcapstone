<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('address');
            $table->string('password');
            $table->enum('role_as', ['admin', 'jobseeker', 'employer'])->default('jobseeker');
            $table->enum('status', ['active', 'inactive'])->default('inactive');
            $table->timestamp('email_verified_at')->useCurrent();
            $table->timestamps();
        });

        // Insert default data after the table has been created
        DB::table('users')->insert([
            [
                'full_name' => 'admin',
                'email' => 'admin@gmail.com',
                'role_as' => 'admin',
                'address' => 'Admin Address',
                'password' => '$2y$12$8qGbpTMe/NFXUMNZbMB5Gu0SFlp/hOcbGb6yyhSdn6MxedBmK7Eta', // hashed password
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'full_name' => 'Juan Dela Cruz',
                'email' => 'patient@gmail.com',
                'role_as' => 'jobseeker',
                'address' => 'Patient Address',
                'password' => '$2y$12$8qGbpTMe/NFXUMNZbMB5Gu0SFlp/hOcbGb6yyhSdn6MxedBmK7Eta', // hashed password
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'full_name' => 'Willie Ong',
                'email' => 'dentist@gmail.com',
                'role_as' => 'employer',
                'address' => 'Employer Address',
                'password' => '$2y$12$8qGbpTMe/NFXUMNZbMB5Gu0SFlp/hOcbGb6yyhSdn6MxedBmK7Eta', // hashed password
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'full_name' => 'Jose Rizal',
                'email' => 'patient2@gmail.com',
                'role_as' => 'jobseeker',
                'address' => 'Patient2 Address',
                'password' => '$2y$12$8qGbpTMe/NFXUMNZbMB5Gu0SFlp/hOcbGb6yyhSdn6MxedBmK7Eta', // hashed password
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
