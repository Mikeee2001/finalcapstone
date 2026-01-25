<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function signin()
    {
        return view('signin');
    }
    public function loginForm(Request $request)
    {
        // Validate the input data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Attempt to log in the user
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed, now check the user's role
            $user = Auth::user(); // ✅ define $user

            // Role-based redirection
            switch ($user->role_as) {
                case 'admin':
                    return redirect()->route('admin.dashboard');

                case 'employer':
                    return redirect()->route('employer.dashboard');

                case 'jobseeker':
                    if ($user->status === 'active') {
                        return redirect()->route('jobseeker.dashboard');
                    } else {
                        return redirect()->route('signin')
                            ->with('error', 'Please wait for your account approval.');
                    }

                default:
                    return redirect()->route('signin')
                        ->with('error', 'Unauthorized access.');
            }
        } else {
            return redirect()->route('signin')
                ->with('error', 'Invalid email or password.');
        }
    }
}
