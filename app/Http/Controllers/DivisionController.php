<?php

namespace App\Http\Controllers;

use App\Role;
use App\Division;
use App\User;
use App\Subject;
use App\Grade;
use App\Mail\GradeNotification;
use App\Http\Controllers\GradesHistoryController;
use App\Jobs\DownloadDivisionSummary;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class DivisionController extends Controller
{
    public function index()
    {
        return view('division.index.view', [
            'divisions' => Division::get(),
            'tutors' => User::whereNotIn('id', Division::select('tutor_id')->get())
                ->where('role_id', Role::ROLE_TEACHER)->get()
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|alpha_num|min:2|unique:divisions,name',
            'tutor_id' => 'required'
        ]);

        $division = Division::create($request->all());

        return redirect()->route('division.index')->withMessage($division->name);
    }

    // public function supervision()
    // {
    //     $students = User::where('role_id', Role::ROLE_ADMIN)->get();
    //     return view('division.edit.teacher.supervision', [
    //         'students' => User::where('division_id')
    //     ]);
    // }

    public function subjectsEdit($id)
    {
        return view('division.edit.admin.subjects', [
          'division' => Division::find($id),
          'subjects' => Subject::get(),
          'teachers' => User::where('role_id', Role::ROLE_TEACHER)->get()
      ]);
    }

    public function subjectsUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'subject_id' => 'required',
            'teacher_id' => 'required'
        ]);

        $subjectTeacher = [];

        for ($i = 0; $i < count($request->input('subject_id')); $i++) {
            if ($request->input('teacher_id')[$i] != 0) {
                $subjectTeacher[$request->input('subject_id')[$i]] = [
                    'user_id' => $request->input('teacher_id')[$i]
                ];
            }
        }

        $division = Division::find($id);
        $division->subjects()->sync($subjectTeacher);
        session()->flash('message', $division->name);

        return redirect()->route('division.subjects.edit', $id);
    }

    public function studentsEdit($id)
    {
        return view('division.edit.admin.students', [
          'division' => Division::find($id),
          'students' => User::where('role_id', Role::ROLE_STUDENT)->get()
      ]);
    }

    public function studentsUpdate(Request $request, $id)
    {
        User::where('division_id', $id)->update([
            'division_id' => null
        ]);

        if ($request->input('user_id')) {
            foreach ($request->input('user_id') as $userId) {
                User::where('id', $userId)->update([
                    'division_id' => $id
                ]);
            }
        }

        $division = Division::find($id);

        return redirect()->route('division.students.edit', $id)->withMessage($division->name);
    }

    public function gradesEdit(Division $division, Subject $subject)
    {
        return view('division.edit.teacher.grades-edit', [
            'division' => $division,
            'subject' => $subject
        ]);
    }

    public function gradeAdd(Request $request, $subjectId, $studentId)
    {
        $this->validate($request, [
            'value' => 'required|matching_grade'
        ]);

        $grade = Grade::create([
            'value' => $request->input('value'),
            'subject_id' => $subjectId,
            'student_id' => $studentId
        ]);

        $student = User::find($studentId);
        $subject = Subject::find($subjectId);
        if ($student->mail_notification == 1) {
            \Mail::to($student)->queue(new GradeNotification($student, $grade, $subject));
        }

        GradesHistoryController::logCreate($grade, Auth::user()->id);

        return response()->json([
            'success' => true,
            'urlDelete' =>  route('division.subject.grade-delete', $grade->id),
            'urlUpdate' => route('division.subject.grade-update', $grade->id)
        ]);
    }

    public function gradeUpdate(Request $request, Grade $grade)
    {
        $this->validate($request, [
            'value' => 'required|matching_grade'
        ]);

        if ($grade->value != $request->input('value')) {
            $grade->update(['value' => $request->input('value')]);
        }

        GradesHistoryController::logUpdate($grade, Auth::user()->id);
    }

    public function gradeDelete(Grade $grade)
    {
        GradesHistoryController::logDelete($grade, Auth::user()->id);
        $grade->delete();
    }

    public function generateCSV(Request $request, Division $division, Subject $subject)
    {
        dispatch(new DownloadDivisionSummary($division, $subject, $request->get('filePath')));
    }

    public function delete($id)
    {
        Division::find($id)->delete();
    }
}
