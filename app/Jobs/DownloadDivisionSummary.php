<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Carbon\Carbon;

class DownloadDivisionSummary implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $subject;
    private $division;
    private $filePath;

    public function __construct($division, $subject, $filePath)
    {
        $this->division = $division;
        $this->subject = $subject;
        $this->filePath = $filePath;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $file = fopen($this->filePath, 'w');
        foreach ($this->division->students as $student) {
            $studentRow = $student->name . ',' . $student->surname;
            $grades = $this->subject->grades->where('student_id', $student->id)->pluck('value')->implode(', ');
            //$grades = implode(', ', $this->subject->grades->where('student_id', $student->id)->pluck('value')->toArray());
            $row = [$studentRow, $grades];
            fputcsv($file, $row);
        }
        fclose($file);
    }
}
