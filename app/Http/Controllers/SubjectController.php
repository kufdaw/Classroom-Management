<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;

class SubjectController extends Controller
{
    public function create()
    {
        $subjects = Subject::get();
        return view('subject.create', [
            'subjects' => $subjects
        ]);
    }

    public function store()
    {
        $this->validate(request(), [
            'subject' => 'required|min:2'
        ]);

        $subject = Subject::create([
            'name' => request('subject')
        ]);


        session()->flash('message', $subject->name);

        return redirect()->route('subject.create');
    }

    public function delete($id)
    {
        $subject = Subject::find($id);
        $subject->delete();
    }
}
