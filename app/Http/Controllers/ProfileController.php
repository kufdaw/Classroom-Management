<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view()
    {
        return view('profile.edit');
    }

    public function changePassword()
    {
        $this->validate(request(), [
            'password_current' => 'required|matching_password',
            'password' => 'required|confirmed'
        ]);

        Auth::user()->update([
            'password' => bcrypt(request('password'))
        ]);

        Flash::message('Your account has been updated!');
    }
}
