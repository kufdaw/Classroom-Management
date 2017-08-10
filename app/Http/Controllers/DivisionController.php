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

    public function store()
    {
        $this->validate(request(), [
            'division' => 'required|alpha_num|min:2|unique:divisions,name',
            'tutor' => 'required'
        ]);

        $division = Division::create([
            'name' => request('division'),
            'tutor_id' => request('tutor')
        ]);


        session()->flash('message', $division->name);

        return redirect()->route('division.create');
    }

    public function edit($id)
    {
        $division = Division::where('id', $id)->first();
        $subjects = Subject::get();
        $teachers = User::where('role_id', '2')->get();


        return view('division.subject.edit', [
          'division' => $division,
          'subjects' => $subjects,
          'teachers' => $teachers
      ]);
    }

    public function update(Request $request, Division $division)
    {
        /*
        $this->validate(request(), [
            'subject_id' => 'required',
            'teacher_id' => 'required'
        ]);
        */

        $params = $request->all();
        $relations = array_filter($params['subjects'], function($value){
            return $value;
        });
        $relations = array_map(function($value){
            return ['user_id' => $value];
        }, $relations);

        $division->subjects()->sync($relations);

        session()->flash('message', $division->name);

        return redirect()->route('division.subject.edit', $division->id);
    }

    public function delete($id)
    {
        Division::find($id)->delete();
    }
}
