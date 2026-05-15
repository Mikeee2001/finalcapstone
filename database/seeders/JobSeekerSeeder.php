<?php

namespace Database\Seeders;

use App\Models\Jobseeker;
use App\Models\Skills;
use App\Models\User;
use Illuminate\Database\Seeder;

class JobSeekerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
    {
        // Create a user for the jobseeker
        $user = User::firstOrCreate([
            'email' => 'jobseeker@gmail.com',
        ], [
            'full_name' => 'Test Seeker',
            'password' => bcrypt('password'),
        ]);

        // Create the jobseeker
        $jobseeker = Jobseeker::create([
            'expected_salary' => 15000,
            'job_type' => 'full-time',
            'location' => 'Barra',
            'user_id' => $user->id,
            'application_letter' => 'I am interested in this job.',
            'resume' => 'path/to/resume.pdf',
        ]);

        // Attach skill
        $skill = Skills::firstOrCreate(['skill_name' => 'Painter']);
        $jobseeker->skills()->attach($skill->id);
    }
}
