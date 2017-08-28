<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GradeController extends Controller
{
    public function index()
    {
        return view('grades.index', [
            'student' => Auth::user()
        ]);
    }

    public function toggleNotification($ifNotify)
    {
        $user = Auth::user();
        $user->update(['mail_notification' => $ifNotify]);
        return response()->json([
            'success' => true,
            'if-notify' => $user->mail_notification
        ]);
    }
}
