<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Role;
use App\User;
use App\Mail\Welcome;
use Yajra\Datatables\Datatables;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['confirm', 'setPassword']);
        // $this->middleware('guest')->except(['index', 'create', 'store', 'send', 'update']);
    }

    public function index()
    {
        return view('profile.edit');
    }

    public function create()
    {
        return view('profile.create', [
            'roles' => Role::all()
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|alpha|min:2',
            'surname' => 'required|alpha|min:2',
            'email' => 'required',
            'date' => 'required|date_format:Y/m/d',
            'role' => 'required'
        ]);

        $token = str_random(64);

        $user = User::create([
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'email' => $request->input('email'),
            'birth_date' => $request->input('date'),
            'role_id' => $request->input('role'),
            'registration_token' => $token,
            'password' => bcrypt(str_random(20))
        ]);

        \Mail::to($user)->send(new Welcome($user));

        session()->flash('message', $user);

        return redirect()->route('profile.create');
    }

    public function setPassword($token)
    {
        if ($user = User::where('registration_token', $token)->first()) {
            return view('profile/confirm', [
                'user' => $user
            ]);
        }
        session()->flash('message', 'Your token expired or you have been already signed in.');

        return redirect()->route('home');
    }

    public function confirm(Request $request, $token)
    {
        $this->validate($request, [
            'password' => 'required|confirmed'
        ]);

        $user = User::where('registration_token', $token)->first();
        $user->update([
            'password' => bcrypt($request->input('password')),
            'registration_token' => null
        ]);

        session()->flash('message', 'Your password has been successfully changed!');
        auth()->login($user);

        return redirect()->route('home');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'password_current' => 'required|matching_password',
            'password' => 'required|confirmed'
        ]);

        Auth::user()->update([
            'password' => bcrypt($request->input('password'))
        ]);

        session()->flash('message', 'Your password has been successfully changed!');

        return redirect()->create('profile');
    }

    public function data(Datatables $datatables)
    {
        $user = User::with('role')->select('users.*');

        return $datatables->eloquent($user)
                            ->addColumn('action', function ($user) {
                                return '<a class="btn btn-info btn-sm" href="'. route('profile.edit', $user->id) .'">Edit</a> <a class="btn btn-danger btn-sm" href="'. route('profile.delete', $user->id) .'">Delete</a>';
                            })
                            ->make(true);
    }

    public function viewAll()
    {
        return view('profile.all');
    }

    public function delete($id)
    {
        $subject = Subject::find($id);
        $subject->delete();
    }
}
