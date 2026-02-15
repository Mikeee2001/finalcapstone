<?php

use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Employer\IndexController as EmployerIndexController;
use App\Http\Controllers\Jobseeker\IndexController as JobseekerIndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Models\User;
// use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [Controller::class, 'index'])->name('welcome');

// Login and Signup Routes
Route::get('/signup', [SignupController::class, 'index'])->name('signup');
Route::post('/signup', [SignupController::class, 'signup'])->name('signup-form');
Route::get('/signin', [LoginController::class, 'signin'])->name('signin');
Route::post('/signin', [LoginController::class, 'loginForm'])->name('login-form');

// Email sending validator
Route::get('/email/verify/{id}/{hash}', function ($id, $hash) {

    $user = User::findOrFail($id);

    // Verify email
    if (!$user->hasVerifiedEmail()) {
        $user->markEmailAsVerified();
    }

    // Activate account
    $user->status = 'active';
    $user->save();

    // Login user
    Auth::login($user);

    // Redirect by role
    switch ($user->role_as) {
        case 'admin':
            return redirect()->route('admin.dashboard');

        case 'employer':
            return redirect()->route('employer.dashboard');

        case 'jobseeker':
            return redirect()->route('jobseeker.dashboard');

        default:
            return redirect()->route('signin');
    }

})->middleware(['signed'])->name('verification.verify');


/**Admin Route */
Route::prefix('admin')->middleware(['auth', 'verified', 'checkRole:admin'])->group(function () {
    Route::get('/dashboard', [AdminIndexController::class, 'index'])->name('admin.dashboard');
    Route::get('/user-list', [AdminIndexController::class, 'userList'])->name('admin.user-list');
    Route::post('/add-user', [AdminIndexController::class, 'addUser'])->name('add-user');
    Route::delete('/delete-user/{id}', [AdminIndexController::class, 'deleteUser'])->name('admin.delete-user');

    // Event Routes
    Route::get('/events', [EventController::class, 'index'])->name('admin.events');
    Route::post('/events/create', [EventController::class, 'createEvents'])->name('admin.events.create');
    Route::get('/events/calendar', [EventController::class, 'showCalendar'])->name('admin.events-calendar');
    Route::delete('/events/delete/{id}', [EventController::class, 'deleteEvents'])->name('admin.delete-event');
    Route::get('/get-events', [EventController::class, 'getEventsData'])->name('admin.get-events');
    Route::get('/events/edit/{id}', [EventController::class, 'editEvents'])->name('admin.events.edit');
});


// Jobseeker Routes
Route::get('/jobseeker/dashboard', [JobseekerIndexController::class, 'index'])->middleware(['auth', 'verified'])->name('jobseeker.dashboard');

// Employer Routes
Route::get('/employer/dashboard', [EmployerIndexController::class, 'index'])->middleware(['auth', 'verified'])->name('employer.dashboard');

// Logout Routes
Route::get('/logout/jobseeker', [Controller::class, 'logout'])->name('jobseeker.logout');
Route::get('/logout/employer', [Controller::class, 'logout'])->name('employer.logout');
Route::get('/logout/admin', [Controller::class, 'logout'])->name('admin.logout');

