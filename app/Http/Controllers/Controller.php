<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\JobPosts;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index(Request $request)
    {
        $jobs = JobPosts::with(['skill', 'companyDetails'])
            ->where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        if ($request->ajax()) {
            return view('partials.jobs', compact('jobs'))->render();
        }

        $events = Events::where('end_time', '>=', now())
            ->orderBy('start_time', 'asc')
            ->get();

        return view('welcome', compact('jobs','events'));
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
