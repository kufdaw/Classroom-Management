<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use App\Grade;
use App\Subject;

class GradeNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $student;
    public $grade;
    public $gradeSubject;

    public $subject = "You have got a new grade!";

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $student, Grade $grade, Subject $subject)
    {
        $this->student = $student;
        $this->grade = $grade;
        $this->gradeSubject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.grade');
    }
}
