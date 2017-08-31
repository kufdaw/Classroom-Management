<?php

namespace App\Repositories\Contracts;

use App\Grade;
use App\Division;
use Illuminate\Support\Collection;

interface GradeContract
{
    public function add(string $value, int  $subjectId, int $studentId):Grade;
    public function update(Grade $grade, string $value):Grade;
    public function delete(Grade $grade);
    public function getSubjects(Division $division):Collection;
    //public function getGrades():Collection;
}
