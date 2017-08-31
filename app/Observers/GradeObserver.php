<?php

namespace App\Observers;

use App\Grade;
use App\User;
use App\GradesHistory;
use App\Http\Controllers\GradesHistoryController;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Contracts\GradesHistoryContract;

class GradeObserver
{
    private $gradesHistoryRepository;

    public function __construct(GradesHistoryContract $gradesHistoryContract)
    {
        $this->gradesHistoryRepository = $gradesHistoryContract;
    }

    public function created(Grade $grade)
    {
        $this->gradesHistoryRepository->add($grade);
    }

    public function updated(Grade $grade)
    {
        $this->gradesHistoryRepository->update($grade);
    }

    public function deleted(Grade $grade)
    {
        $this->gradesHistoryRepository->delete($grade);
    }
}
