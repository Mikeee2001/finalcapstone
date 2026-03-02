<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\Employers;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index()
    {
        return view('employer.dashboard');
    }

    public function getEmployerPage()
    {
        return view('employer.employer-page');
    }

     public function employerLandingPage()
    {
        return view('employer.employer-page');
    }

    public function getJobList()
    {
        return view('employer.job-list');
    }

    public function getEmployerSignupForm()
    {
        return view('employer.employerSignUpForm');
    }
    public function employerSignup(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'address' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'company_address' => 'required|string|max:255',
            'company_description' => 'required|string|max:255',
        ]);

        try {
            // Create the user record
            $user = User::create([
                'full_name' => $validatedData['full_name'],
                'email' => $validatedData['email'],
                'address' => $validatedData['address'],
                'password' => Hash::make($validatedData['password']),
                'role_as' => 'employer', // make sure this matches your DB column
            ]);

            // Create employer record linked to user
            $employer = Employers::create([
                'user_id' => $user->id,
            ]);

            // Create company details linked to employer
            $employer->companyDetails()->create([
                'company_name' => $validatedData['company_name'],
                'company_address' => $validatedData['company_address'],
                'company_description' => $validatedData['company_description'],
            ]);

            \DB::enableQueryLog();

            // Fire Laravel's Registered event (triggers email verification)
            event(new Registered($user));

            // Auto-login after signup
            Auth::login($user);

            return redirect()->route('signin')
                ->with('success', 'You are registered! Please verify your email.');
        } catch (\Exception $e) {
            return redirect()->route('employerSignup')
                ->with('error', 'Failed to create user. ' . $e->getMessage());
        }
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
