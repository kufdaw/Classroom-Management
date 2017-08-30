<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Grade;
use App\GradesHistory;

class GradesHistoryController extends Controller
{
    public function index()
    {
        return view('history.index', [
            'gradesHistory' => GradesHistory::where('teacher_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate()
        ]);
    }
}
