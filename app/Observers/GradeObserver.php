<?php

namespace App\Observers;

use App\Grade;
use App\User;
use App\Http\Controllers\GradesHistoryController;
use Illuminate\Support\Facades\Auth;

class GradeObserver
{
    public function created(Grade $grade)
    {
        GradesHistoryController::logCreate($grade, Auth::user()->id);
    }

    public function deleted(Grade $grade)
    {
        GradesHistoryController::logDelete($grade, Auth::user()->id);
    }

    public function updated(Grade $grade)
    {
        GradesHistoryController::logUpdate($grade, Auth::user()->id);
    }
}
