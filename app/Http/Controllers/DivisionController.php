<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Division;
use App\User;
use App\Subject;

class DivisionController extends Controller
{
    public function create()
    {
        $divisions = Division::get();
        $tutors = User::whereNotIn('id', Division::select('tutor_id')->get())->where('role_id', 2)->get();

        return view('division.create', [
            'divisions' => $divisions,
            'tutors' => $tutors
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'division' => 'required|alpha_num|min:2|unique:divisions,name',
            'tutor' => 'required'
        ]);

        $division = Division::create([
            'name' => $request->input('division'),
            'tutor_id' => $request->input('tutor')
        ]);


        session()->flash('message', $division->name);

        return redirect()->route('division.create');
    }

    public function subjectsEdit(Request $request, $id)
    {
        $division = Division::where('id', $id)->first();
        $subjects = Subject::get();
        $teachers = User::where('role_id', '2')->get();


        return view('division.subjects.edit', [
          'division' => $division,
          'subjects' => $subjects,
          'teachers' => $teachers
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
        $division = Division::where('id', $id)->first();
        $students = User::where('role_id', '3')->get();


        return view('division.students.edit', [
          'division' => $division,
          'students' => $students
      ]);
    }

    public function studentsUpdate(Request $request, $id)
    {
        User::where('division_id', $id)->update(['division_id' => null]);


        if ($request->input('user_id')) {
            foreach ($request->input('user_id') as $userId) {
                User::where('id', $userId)->update(['division_id' => $id]);
            }
        }

        $division = Division::find($id);

        session()->flash('message', $division->name);

        return redirect()->route('division.students.edit', $id);
    }

    public function delete($id)
    {
        Division::find($id)->delete();
    }
}
