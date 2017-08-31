<?php
namespace App\Repositories\Eloquent;

use App\Grade;
use App\GradesHistory;
use App\Repositories\Contracts\GradesHistoryContract;
use Illuminate\Support\Facades\Auth;

class GradesHistoryRepository implements GradesHistoryContract
{
    public function add(Grade $grade)
    {
        GradesHistory::create([
            'subject_id' => $grade->subject_id,
            'student_id' => $grade->student_id,
            'value' => $grade->value,
            'teacher_id' => Auth::user()->id,
            'operation' => 'create'
        ]);
    }

    public function update(Grade $grade)
    {
        GradesHistory::create([
            'subject_id' => $grade->subject_id,
            'student_id' => $grade->student_id,
            'value' => $grade->value,
            'teacher_id' =>  Auth::user()->id,
            'operation' => 'update'
        ]);
    }

    public function delete(Grade $grade)
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
