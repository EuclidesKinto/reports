<?php

namespace App\Jobs;

use App\Exports\ReportExport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;

class GenerateReport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public string $startdate,
        public string $enddate
    ){}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $filename = 'report_users-' . now()->timestamp . '.xlsx';
        Excel::store(new ReportExport($this->startdate, $this->enddate), $filename);

    }
}
