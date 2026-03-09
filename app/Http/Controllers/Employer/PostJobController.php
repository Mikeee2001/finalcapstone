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
            'skills' => 'required|array',
            'skills.*' => 'exists:skills,id',
        ]);

        $employer = auth()->user()->employer;
        $company = $employer->company;

        try {
            $jobPost = JobPosts::create([
                'title' => $validatedData['title'],
                'description' => $validatedData['description'],
                'location' => $validatedData['location'],
                'salary_min' => $validatedData['salary_min'] ?? null,
                'salary_max' => $validatedData['salary_max'] ?? null,
                'job_type' => $validatedData['job_type'],
                'company_id' => $company->id,
                'status' => 'active',
            ]);

            $jobPost->skills()->sync($validatedData['skills']);

            return response()->json([
                'success' => true,
                'message' => 'Job post created successfully!',
                'job' => $jobPost->load('skills')
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create job post',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
