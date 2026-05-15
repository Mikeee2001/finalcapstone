<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Employers;
use App\Models\CompanyDetails;
use App\Models\Jobseeker;
use App\Models\Skills;
use App\Models\JobPosts;

class DemoSeeder extends Seeder
{
    public function run()
    {
        // Create employer user
        $employerUser = User::create([
            'full_name' => 'Employer User',
            'email' => 'employer1@gmail.com',
            'role_as' => 'employer',
            'status' => 'active',
            'password' => bcrypt('password'),
        ]);


        $employer = Employers::create(['user_id' => $employerUser->id]);

        $company = CompanyDetails::create([
            'company_name' => 'Demo Company',
            'company_address' => 'Igpit', // ✅ must be valid enum value
            'company_description' => 'Testing company',
            'employer_id' => $employer->id,
        ]);

        // Create jobseeker user
        // Jobseeker
        $jobseeker = Jobseeker::create([
            'location' => 'Igpit',
            'expected_salary' => 20000,
            'job_type' => 'full-time',
            'application_letter' => 'I am interested in this job.',
            'resume' => 'path/to/resume.pdf',
            'user_id' => 1, // replace with a valid user_id
        ]);

        // Attach skill
        $php = Skills::create(['skill_name' => 'PHP']);
        $jobseeker->skills()->attach($php->id);

        // Job Post
        JobPosts::create([
            'title' => 'Junior PHP Developer',
            'description' => 'Entry-level PHP role',
            'location' => 'Igpit',
            'salary' => 22000, // ✅ single salary
            'job_type' => 'full-time',
            'company_id' => 1, // replace with a valid company_id
            'status' => 'active',
            'skill_id' => $php->id,
        ]);

    }
}

