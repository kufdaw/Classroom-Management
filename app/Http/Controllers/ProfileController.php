<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Role;
use App\User;
use App\Mail\Welcome;

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

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|alpha|min:2',
            'surname' => 'required|alpha|min:2',
            'email' => 'required',
            'date' => 'required|date_format:Y/m/d',
            'role' => 'required'
        ]);

        $token = str_random(64);

        $user = User::create([
            'name' => request('name'),
            'surname' => request('surname'),
            'email' => request('email'),
            'birth_date' => request('date'),
            'role_id' => request('role'),
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

    public function confirm($token)
    {
        $this->validate(request(), [
            'password' => 'required|confirmed'
        ]);

        $user = User::where('registration_token', $token)->first();
        $user->update([
            'password' => bcrypt(request('password')),
            'registration_token' => 'NULL'
        ]);

        session()->flash('message', 'Your password has been successfully changed!');
        auth()->login($user);

        return redirect()->route('home');
    }

    public function update()
    {
        $this->validate(request(), [
            'password_current' => 'required|matching_password',
            'password' => 'required|confirmed'
        ]);

        Auth::user()->update([
            'password' => bcrypt(request('password'))
        ]);

        session()->flash('message', 'Your password has been successfully changed!');

        return redirect()->create('profile');
    }
}
