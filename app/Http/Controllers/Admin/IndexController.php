<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyDetails;
use App\Models\Events;
use App\Models\JobPosts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class IndexController extends Controller
{
    public function index()
    {
        $totalUsers = User::where('status', 'active')->count();
        $totalJobs = JobPosts::count();
        $totalEvents = Events::count();
        $totalCompany = CompanyDetails::count();

        return view('admin.dashboard', compact('totalUsers', 'totalJobs', 'totalEvents', 'totalCompany'));
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

    public function addUser(Request $request)
    {
        $validate = Validator::make(request()->all(), [
            'full_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role_as' => 'required|in:admin,jobseeker,employer',
        ]);

        // RETURN VALIDATION ERRORS
        if ($validate->fails()) {
            return response()->json([
                'errors' => $validate->errors()
            ], 422);
        }

        $user = User::create([
            'full_name' => $request->input('full_name'),
            'email' => $request->input('email'),
            'role_as' => $request->input('role_as'),
            'password' => bcrypt($request->input('password')),
            'status' => 'active',
        ]);

        if ($user) {
            return response()->json(['success' => true], 200);
        } else {
            return response()->json(['success' => false], 500);
        }
    }


    public function userList()
    {
        $users = User::latest()->get();
        return view('admin.user-list', compact('users'));
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()
            ->route('admin.user-list')
            ->with('success', 'User deleted successfully!');
    }

    public function adminSettings()
    {
        return view('admin.layouts.settings');
    }
    public function adminChangePassword(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'current_password' => 'required',
            'new_password' => [
                'required',
                'regex:/^(?=.*[a-zA-Z])(?=.*\d).{6,}$/',
            ],
            'confirm_password' => 'required|same:new_password',
        ]);

        $user = auth()->user();

        // Check if the current password is correct
        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json([
                'errors' => ['current_password' => ['Incorrect current password']]
            ], 422);
        }

        // Update the user's password
        $user->update(['password' => Hash::make($request->new_password)]);

        // Return a success response
        return response()->json(['message' => 'Password changed successfully!']);
    }

    public function editAdminProfile(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
        ]);

        $user = Auth::user();

        $user->update([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'address' => $request->address,
        ]);

        return redirect()->back()->with('success', 'Successfully Updated');
    }
}

