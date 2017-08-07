<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Division;
use App\User;

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
            'division' => 'required|alpha_num|min:2',
            'tutor' => 'required'
        ]);

        $division = Division::create([
            'name' => request('division'),
            'tutor_id' => request('tutor')
        ]);


        session()->flash('message', $division->name);

        return redirect()->route('division.create');
    }

    public function delete($id)
    {
        Division::find($id)->delete();
    }
}
