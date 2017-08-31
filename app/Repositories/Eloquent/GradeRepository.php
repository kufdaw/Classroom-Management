<?php

namespace App\Repositories\Eloquent;

use App\Grade;
use App\Repositories\Contracts\GradeContract;
use App\Division;
use Illuminate\Support\Collection;

class GradeRepository implements GradeContract
{
    public function add(string $value, int $subjectId, int $studentId):Grade
    {
        $grade = Grade::create([
            'value' => $value,
            'subject_id' => $subjectId,
            'student_id' => $studentId
        ]);

        return $grade;
    }

    public function update(Grade $grade, string $value):Grade
    {
        $grade->update(['value' => $value]);
        return $grade;
    }

    public function delete(Grade $grade)
    {
        $grade->delete();
    }

    /**
     * @param Division $Division
     * @return Collection|Subject[]
     */
    public function getSubjects(Division $division):Collection
    {
        return $division->subjects;
    }

    /**
     * @param Division $Division
     * @return Collection|Subject[]
     */
    public function getGrades(Division $division):Collection
    {
        return $division->subjects;
    }
}
