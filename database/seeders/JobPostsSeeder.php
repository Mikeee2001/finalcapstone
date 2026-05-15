<?php

namespace Database\Seeders;

use App\Models\CompanyDetails;
use App\Models\JobPosts;
use App\Models\Skills;
use Illuminate\Database\Seeder;

class JobPostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
    {
        // Create a skill
        $skill = Skills::firstOrCreate(['skill_name' => 'Painter']);

        // Create a company
        $company = CompanyDetails::firstOrCreate([
            'company_name' => 'My Company',
            'company_address' => 'Cauyonan',
            'company_description' => 'A sample company for testing',
            'employer_id' => 1, // adjust to a valid employer_id in your DB
        ]);

        // Create a job post
        JobPosts::create([
            'title' => 'Painter',
            'description' => 'We need a painter for construction projects.',
            'location' => 'Igpit',
            'salary_min' => 20000,
            'salary_max' => 30000,
            'job_type' => 'full-time',
            'company_id' => $company->id,
            'status' => 'active',
            'skill_id' => $skill->id,
        ]);
    }
}
