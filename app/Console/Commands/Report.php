<?php

namespace App\Console\Commands;

use App\Exports\ReportExport;
use App\Jobs\GenerateReport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class Report extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'report {startdate} {enddate}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate report of all users created between two dates';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $startdate = $this->argument('startdate');
        $enddate = $this->argument('enddate');
        dispatch(new GenerateReport($startdate, $enddate));
        return Command::SUCCESS;
    }
}
