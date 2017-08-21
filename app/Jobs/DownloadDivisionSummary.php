<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Division;
use App\Subject;

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
    public function handle()
    {
        $file = "nazwapliku";
        foreach ($this->division->students as $student) {
            $studentRow = $student->name . ',' . $student->surname;
            $grades = '"';
            foreach ($this->subject->grades->where('student_id', $student->id) as $grade) {
                $grades .= $grade->value . ', ';
            }
            $grades = rtrim($grades, ", ");
            $grades .= '"';
            $row = $studentRow . ',' . $grades;
            echo $row . '<br>';
            //fputcsv($file, $student->name)
        }
    }
}
