<?php

namespace App\Http\Controllers\Jobseeker;

use App\Http\Controllers\Controller;
use App\Models\JobMatched;
use App\Models\Jobseeker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function showJobsPage()
    {
        $jobseeker = Jobseeker::where('user_id', auth()->id())
            ->with('skills')
            ->firstOrFail();

        $matchedJobs = JobMatched::with(['jobPost.companyDetails', 'jobPost.skill'])
            ->where('jobseeker_id', $jobseeker->id)
            ->where('total_match_percent', '>=', 25)
            ->orderByDesc('total_match_percent')
            ->paginate(10);

        return view('jobseeker.show', compact('matchedJobs'));
    }

    public function dashboard()
    {
        return view('jobseeker.dashboard');
    }
    public function logout(Request $request)
    {
        // Get the current user
        $user = Auth::user();

        // Check if user is authenticated
        if ($user) {
            // ✅ Removed audit log update

            // Logout the user
            Auth::logout();

            // Redirect to the desired route after logout
            return redirect()->route('signin')->with('success', 'Successfully logged out.');
        }

        // If no user is authenticated, just redirect
        return redirect()->route('signin')->with('error', 'No active session found.');
    }

}
