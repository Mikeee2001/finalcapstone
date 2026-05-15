<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\JobPosts;
use App\Models\Skills;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{

    public function getJobPostForm()
    {
        return view('employer.job-list');
    }


    public function getJobList(Request $request)
    {
        $employer = auth()->user()->employer;
        if (!$employer) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $company = $employer->companyDetails;
        if (!$company) {
            return response()->json(['error' => 'No company profile found'], 403);
        }

        // Only jobs tied to this company
        $jobs = JobPosts::with('skill')
            ->where('company_id', $company->id)
            ->orderByDesc('created_at')
            ->get();

        if ($request->ajax()) {
            $data = $jobs->map(function ($job, $index) {
                return [
                    'no' => $index + 1,
                    'title' => $job->title,
                    'description' => $job->description,
                    'location' => $job->location,
                    'salary' => '₱' . number_format($job->salary),
                    'job_type' => ucfirst($job->job_type),
                    'skill' => $job->skill ? $job->skill->skill_name : 'N/A',
                    'created_at' => $job->created_at->format('Y-m-d'),
                    'status' => '<span class="badge ' . ($job->status === 'active' ? 'bg-success' : 'bg-danger') . '">' .
                        ucfirst($job->status) . '</span>
                              <button class="btn btn-sm ' .
                        ($job->status === 'active' ? 'btn-outline-danger' : 'btn-outline-success') .
                        ' status-btn ms-2" data-url="' . route('employer.toggle-job-status', $job->id) . '">' .
                        ($job->status === 'active' ? 'Deactivate' : 'Activate') . '</button>'
                ];
            });

            return response()->json(['data' => $data]);
        }

        $skills = Skills::all();
        return view('employer.job-list', compact('jobs', 'skills'));
    }

    public function toggleStatus(Request $request, $id)
    {
        $employer = auth()->user()->employer;
        $company = $employer->companyDetails;

        $job = JobPosts::where('id', $id)
            ->where('company_id', $company->id)
            ->firstOrFail();

        $job->status = $job->status === 'active' ? 'inactive' : 'active';
        $job->save();

        return response()->json(['status' => $job->status]);
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
                'location' => 'required|in:Awang,Bagocboc,Barra,Bonbon,Cauyonan,Igpit,Luyongbonbon,Malanang,Nangcaon,Patag,Poblacion,Tingalan',
                'salary' => 'required|integer',
                'job_type' => 'required|in:full-time,part-time',
                'skill_id' => 'required'
            ]);

            // ✅ Ensure user is logged in
            if (!Auth::check()) {
                return response()->json(['success' => false, 'error' => 'User not logged in'], 401);
            }

            // ✅ Get employer from logged-in user
            $employer = Auth::user()->employer;
            if (!$employer) {
                return response()->json(['success' => false, 'error' => 'Employer not found'], 404);
            }

            // ✅ Get employer’s company
            $company = $employer->companyDetails;
            if (!$company) {
                return response()->json(['success' => false, 'error' => 'Company not found'], 404);
            }

            // ✅ Normalize skill input (ID or name)
            $skillInput = $validated['skill_id'];
            if (is_numeric($skillInput)) {
                $skillId = (int) $skillInput;
            } else {
                $skill = Skills::firstOrCreate(['skill_name' => $skillInput]);
                $skillId = $skill->id;
            }

            // ✅ Create job tied to the employer’s company
            $job = JobPosts::create([
                'title' => $validated['title'],
                'description' => $validated['description'],
                'location' => $validated['location'],
                'salary' => $validated['salary'],
                'job_type' => $validated['job_type'],
                'company_id' => $company->id,   // 🔑 always use employer’s company
                'status' => 'active',
                'skill_id' => $skillId,
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



    // public function toggleStatus(Request $request, $id)
    // {
    //     $job = JobPosts::findOrFail($id); // use route param, fail if not found

    //     // Flip status based on current value in DB
    //     $job->status = $job->status === 'active' ? 'inactive' : 'active';
    //     $job->save();

    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Job status updated successfully!',
    //         'status' => $job->status
    //     ]);
    // }



}
