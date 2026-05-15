<?php

namespace App\Jobs;

use App\Models\Jobseeker;
use App\Services\MatchService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class RecalculateMatches implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $jobseekerId;

    public function __construct(int $jobseekerId)
    {
        $this->jobseekerId = $jobseekerId;
    }

    public function handle(MatchService $matchService)
    {
        $jobseeker = Jobseeker::with('skills')->find($this->jobseekerId);

        if ($jobseeker) {
            $matchService->calculateMatches($jobseeker);
        }
    }
}
