<?php

namespace App\Http\Controllers\Jobseeker;

use App\Http\Controllers\Controller;
use App\Models\JobMatched;
use App\Models\Jobseeker;

class ApplicationController extends Controller
{
    public function matchedJobs()
    {
        $jobseeker = Jobseeker::where('user_id', auth()->id())->firstOrFail();

        $matchedJobs = JobMatched::where('jobseeker_id', $jobseeker->id)
            ->with(['jobPost.companyDetails', 'jobPost.skill'])
            ->paginate(6);

        return view('jobseeker.show', compact('matchedJobs'));
    }

}
