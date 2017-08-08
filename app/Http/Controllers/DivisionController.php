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

        $subjectList = [];

        foreach ($division->subject as $currentSubject) {
            if ($subjects->contains('id', $currentSubject->id)) {
                $subjectList[] = $currentSubject->id;
            }
        }

        return view('division.edit', [
          'division' => $division,
          'subjects' => $subjects,
          'subjectList' => $subjectList
      ]);
    }

    public function update($id)
    {
        $division = Division::find(['id' => $id])->first();
        $division->subject()->sync(request('subjectsId'));
        $division->saveOrFail();

        session()->flash('message', $division->name);

        return redirect()->route('division.edit', $id);
    }

    public function delete($id)
    {
        Division::find($id)->delete();
    }
}
