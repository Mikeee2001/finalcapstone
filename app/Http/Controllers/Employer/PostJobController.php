<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\JobPosts;
use Illuminate\Http\Request;

class PostJobController extends Controller
{
    public function getJobPostForm()
    {
        return view('employer.post-job');
    }

    public function addJobPost(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'salary_min' => 'nullable|numeric',
            'salary_max' => 'nullable|numeric',
            'job_type' => 'required|string|max:50',
            'status' => 'required|in:active,inactive',
            'skills' => 'required|array',
            'skills.*' => 'exists:skills,id',
        ]);

        $employer = auth()->user()->employer;   // User → Employer
        $company = $employer->company;         // Employer → CompanyDetail

        try {
            $jobPost = JobPosts::create([
                'title' => $validatedData['title'],
                'description' => $validatedData['description'],
                'location' => $validatedData['location'],
                'salary_min' => $validatedData['salary_min'] ?? null,
                'salary_max' => $validatedData['salary_max'] ?? null,
                'job_type' => $validatedData['job_type'],
                'company_id' => $company->id,    // ✅ correct company link
            ]);

            // Attach skills to the job post
            $jobPost->skills()->sync($validatedData['skills']);

            return redirect()->route('employer.job-list')
                ->with('success', 'Job post created successfully!');
        } catch (\Exception $e) {
            return back()->withErrors([
                'error' => 'Failed to create job post: ' . $e->getMessage()
            ]);
        }
    }

}
