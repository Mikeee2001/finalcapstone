<?php

namespace App\Providers;

use App\Models\Jobseeker;
use App\Observers\JobseekerObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Jobseeker::observe(JobseekerObserver::class);
    }
}
