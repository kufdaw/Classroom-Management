<?php

namespace App\Repositories\Contracts;

use App\Grade;
use App\Division;
use App\Subject;
use Illuminate\Support\Collection;

interface GradeContract
{
    public function add(string $value, int  $subjectId, int $studentId):Grade;
    public function update(Grade $grade, string $value):Grade;
    public function delete(Grade $grade);
    public function getSubjects(Division $division):Collection;
    public function getSubjectGrades(Division $division, Subject $subject):array;
    public function getDivisionGrades(Division $division):array;
}
