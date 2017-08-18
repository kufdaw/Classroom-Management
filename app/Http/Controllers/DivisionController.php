<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use App\Division;
use App\User;
use App\Subject;
use Illuminate\Support\Facades\Auth;
use App\Grade;

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

    public function gradesEdit($divisionId, $subjectId)
    {
        return view('division.edit.teacher.grades-edit', [
            'division' => Division::find($divisionId),
            'subjectId' => $subjectId
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

        return response()->json([
            'success' => true,
            'gradeId' =>  $grade->id
        ]);
    }

    public function gradeUpdate(Request $request, Grade $grade)
    {
        $this->validate($request, [
            'value' => 'required|matching_grade'
        ]);

        $grade->update(['value' => $request->input('value')]);
    }

    public function gradeDelete(Grade $grade)
    {
        $grade->delete();
    }

    public function delete($id)
    {
        Division::find($id)->delete();
    }
}
