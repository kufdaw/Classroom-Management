<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use App\Division;
use App\Subject;
use App\Repositories\Contracts\GradeContract;

class GradeController extends Controller
{
    private $gradeRepository;

    public function __construct(GradeContract $gradeContract)
    {
        $this->gradeRepository = $gradeContract;
    }

    public function index()
    {
        return view('grades.student', [
            'student' => Auth::user()
        ]);
    }

    public function toggleNotification($ifNotify)
    {
        $user = Auth::user();
        $user->update(['mail_notification' => $ifNotify]);
        return response()->json([
            'success' => true,
            'if-notify' => $user->mail_notification
        ]);
    }

    public function getSubjects(Division $division):Collection
    {
        return $this->gradeRepository->getSubjects($division);
    }

    public function getGrades(Division $division, Subject $subject):array
    {
        return $this->gradeRepository->getGrades($division, $subject);
    }

    public function search()
    {
        return view('grades.admin', [
            'divisions' => Division::all()
        ]);
    }

    public function statsIndex()
    {
        return view('stats.index');
    }
}
