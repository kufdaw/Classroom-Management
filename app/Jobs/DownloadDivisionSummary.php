<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Division;
use App\Subject;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redis;

class DownloadDivisionSummary implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $division;
    protected $subject;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Division $division, Subject $subject)
    {
        $this->division = $division;
        $this->subject = $subject;
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function fire($job)
    {
        $fileName = storage_path(Carbon::now()->timestamp . ".csv");
        $file = fopen($fileName, 'w');
        foreach ($this->division->students as $student) {
            $studentRow = $student->name . ',' . $student->surname;
            $grades = implode(', ', $this->subject->grades->where('student_id', $student->id)->pluck('value')->toArray());
            $row = [$studentRow, $grades];
            fputcsv($file, $row);
        }
        fclose($file);
        $job->delete();
    }
}
