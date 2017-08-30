<?php

namespace App\Observers;

use App\Grade;
use App\User;
use App\GradesHistory;
use App\Http\Controllers\GradesHistoryController;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Contracts\GradeContract;

class GradeObserver
{
    public function created(Grade $grade)
    {
        GradesHistory::create([
            'subject_id' => $grade->subject_id,
            'student_id' => $grade->student_id,
            'value' => $grade->value,
            'teacher_id' => Auth::user()->id,
            'operation' => 'create'
        ]);
    }

    public function deleted(Grade $grade)
    {
        GradesHistory::create([
            'subject_id' => $grade->subject_id,
            'student_id' => $grade->student_id,
            'value' => $grade->value,
            'teacher_id' =>  Auth::user()->id,
            'operation' => 'update'
        ]);
    }

    public function updated(Grade $grade)
    {
        GradesHistory::create([
            'subject_id' => $grade->subject_id,
            'student_id' => $grade->student_id,
            'value' => $grade->value,
            'teacher_id' => Auth::user()->id,
            'operation' => 'delete'
        ]);
    }
}
