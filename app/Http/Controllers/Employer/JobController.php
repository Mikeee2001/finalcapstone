<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\JobPosts;
use App\Models\Skills;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function toggleButton(Request $request)
    {

    }

    public function getJobPostForm()
    {
        return view('employer.job-list');
    }

    public function getJob()
    {
        $jobs = JobPosts::with('skill')->get();
        return response()->json($jobs);
    }

    public function getJobList()
    {
        $jobs = JobPosts::with('skill')->get();
        $skills = Skills::all();

        return view('employer.job-list', compact('jobs', 'skills'));
    }

    public function search(Request $request)
    {
        $query = $request->get('q');

        // Fetch matching skills
        $skills = Skills::where('skill_name', 'like', "%{$query}%")->get();

        // Format results for Select2
        $data = $skills->map(function ($skill) {
            return [
                'id' => $skill->id,
                'text' => $skill->skill_name,
            ];
        });

        return response()->json([
            'results' => $data
        ]);
    }

    public function addJob(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'location' => 'required|string|max:255',
                'salary_min' => 'required|integer',
                'salary_max' => 'required|integer',
                'job_type' => 'required|in:full-time,part-time',
                'skill_id' => 'required|exists:skills,id'
            ]);

            if (!Auth::check()) {
                return response()->json(['success' => false, 'error' => 'User not logged in'], 401);
            }

            $employer = Auth::user()->employer;
            if (!$employer) {
                return response()->json(['success' => false, 'error' => 'Employer not found'], 404);
            }

            $company = $employer->companyDetails;
            if (!$company) {
                return response()->json(['success' => false, 'error' => 'Company not found'], 404);
            }

            $job = JobPosts::create([
                'title' => $validated['title'],
                'description' => $validated['description'],
                'location' => $validated['location'],
                'salary_min' => $validated['salary_min'],
                'salary_max' => $validated['salary_max'],
                'job_type' => $validated['job_type'],
                'company_id' => $company->id,
                'status' => 'active',
                'skill_id' => $validated['skill_id'], // ✅ direct link
            ]);

            $jobWithRelations = JobPosts::with(['companyDetails', 'skill'])->find($job->id);

            return response()->json([
                'success' => true,
                'message' => 'Job posted successfully!',
                'job' => $jobWithRelations
            ]);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    public function toggleStatus(Request $request, $id)
    {
        $job = JobPosts::findOrFail($id); // use route param, fail if not found

        // Flip status based on current value in DB
        $job->status = $job->status === 'active' ? 'inactive' : 'active';
        $job->save();

        return response()->json([
            'success' => true,
            'message' => 'Job status updated successfully!',
            'status' => $job->status
        ]);
    }



}
