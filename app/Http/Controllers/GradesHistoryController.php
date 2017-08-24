<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Grade;
use App\GradesHistory;

class GradesHistoryController extends Controller
{
    public function index()
    {
        return view('history.index', [
            'gradesHistory' => GradesHistory::where('teacher_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate()
        ]);
    }

    public static function logCreate(Grade $grade, $teacherId)
    {
        $gradeHistory = GradesHistory::create([
            'subject_id' => $grade->subject_id,
            'student_id' => $grade->student_id,
            'value' => $grade->value,
            'teacher_id' => $teacherId,
            'operation' => 'create'
        ]);
    }

    public static function logUpdate(Grade $grade, $teacherId)
    {
        $gradeHistory = GradesHistory::create([
            'subject_id' => $grade->subject_id,
            'student_id' => $grade->student_id,
            'value' => $grade->value,
            'teacher_id' => $teacherId,
            'operation' => 'update'
        ]);
    }

    public static function logDelete(Grade $grade, $teacherId)
    {
        $gradeHistory = GradesHistory::create([
            'subject_id' => $grade->subject_id,
            'student_id' => $grade->student_id,
            'value' => $grade->value,
            'teacher_id' => $teacherId,
            'operation' => 'delete'
        ]);
    }
}
