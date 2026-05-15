<?php

namespace App\Services;

use App\Models\JobMatched;
use App\Models\JobPosts;

class MatchService
{
    public function calculateMatches($jobseeker)
    {
        $jobPosts = JobPosts::with(['companyDetails', 'skill'])->get();

        foreach ($jobPosts as $jobPost) {
            $totalMatch = 0;

            $locationMatch = !empty($jobPost->location) && !empty($jobseeker->location)
                && strcasecmp($jobPost->location, $jobseeker->location) === 0;

            $salaryMatch = $jobseeker->expected_salary !== null
                && $jobPost->salary !== null
                && $jobPost->salary >= $jobseeker->expected_salary;


            $typeMatch = !empty($jobPost->job_type) && !empty($jobseeker->job_type)
                && strcasecmp($jobseeker->job_type, $jobPost->job_type) === 0;

            $skillMatch = $jobseeker->skills && $jobseeker->skills->contains('id', $jobPost->skill_id);

            if ($locationMatch)
                $totalMatch += 25;
            if ($salaryMatch)
                $totalMatch += 25;
            if ($typeMatch)
                $totalMatch += 25;
            if ($skillMatch)
                $totalMatch += 25;

            if ($totalMatch > 0) {
                JobMatched::updateOrCreate(
                    [
                        'jobpost_id' => $jobPost->id,
                        'jobseeker_id' => $jobseeker->id,
                    ],
                    [
                        'location_match' => $locationMatch ? 1 : 0,
                        'salary_match' => $salaryMatch ? 1 : 0,   // ✅ now stored
                        'type_match' => $typeMatch ? 1 : 0,
                        'skill_match_percent' => $skillMatch ? 25 : 0,
                        'total_match_percent' => $totalMatch,
                    ]
                );

            }
        }
    }

}

