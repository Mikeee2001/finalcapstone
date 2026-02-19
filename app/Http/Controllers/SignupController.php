<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Jobseeker;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
    public function index()
    {
        return view('signup');
    }

    public function signup(Request $request)
    {
        // Validate the request data
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'address' => 'required|string|max:255',
            'expected_salary' => 'required|numeric',
            'application_letter' => 'required|file|mimes:pdf,doc,docx,txt|max:2048',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'job_type' => 'required|in:full-time,part-time',
        ]);

        // Create the user with status as 'inactive'
        $user = User::create([
            'full_name' => $request->input('full_name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'role_as' => 'jobseeker',
            'password' => Hash::make($request->input('password')),
            'status' => 'inactive',
        ]);

        if ($user) {
            // Store the application letter and resume files
            $applicationLetterPath = $request->file('application_letter')->move(public_path('application_letters'), time() . '_' . $request->file('application_letter')->getClientOriginalName());
            $resumePath = $request->file('resume')->move(public_path('resumes'), time() . '_' . $request->file('resume')->getClientOriginalName());

            Jobseeker::create([
                'user_id' => $user->id,
                'address' => $request->input('address'),
                'expected_salary' => $request->input('expected_salary'),
                'application_letter' => $applicationLetterPath,
                'resume' => $resumePath,
                'job_type' => $request->input('job_type'),
            ]);
        }

        // If the user was created, send the verification email
        if ($user) {
            // Dispatch the email verification event to trigger the email
            event(new Registered($user));

            return redirect()->route('signin')->with('success', 'You are registered! Please verify your email.');
        }

        // If user creation failed
        return redirect()->route('signup')->with('error', 'Failed to create user.');
    }

}
