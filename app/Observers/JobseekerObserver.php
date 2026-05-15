<?php

namespace App\Observers;

use App\Jobs\RecalculateMatches;
use App\Models\Jobseeker;

class JobseekerObserver
{
    /**
     * Handle the Jobseeker "created" event.
     */
    public function created(Jobseeker $jobseeker): void
    {
        // Optionally recalc matches when a new jobseeker is created
        RecalculateMatches::dispatch($jobseeker->id);
    }
    /**
     * Handle the Jobseeker "updated" event.
     */
    public function updated(Jobseeker $jobseeker): void
    {
        // Dispatch the job whenever a jobseeker updates their profile
        RecalculateMatches::dispatch($jobseeker->id);
    }

    /**
     * Handle the Jobseeker "deleted" event.
     */
    public function deleted(Jobseeker $jobseeker): void
    {
        //
    }

    /**
     * Handle the Jobseeker "restored" event.
     */
    public function restored(Jobseeker $jobseeker): void
    {
        //
    }

    /**
     * Handle the Jobseeker "force deleted" event.
     */
    public function forceDeleted(Jobseeker $jobseeker): void
    {
        //
    }
}
