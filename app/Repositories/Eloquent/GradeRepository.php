<?php

namespace App\Repositories\Eloquent;

use App\Grade;
use App\Division;
use App\Subject;
use App\Repositories\Contracts\GradeContract;
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
     * @param Division $Division, Subject $Subject
     * @return string[]
     */
    public function getGrades(Division $division, Subject $subject):array
    {
        $grades = [];
        foreach ($division->students as $key => $student) {
            $grades[$key] = ['name' => $student->name, 'grades' => ''];
            foreach ($subject->grades->where('student_id', $student->id) as $grade) {
                $grades[$key]['grades'][] = $grade->value;
            }
        }
        return $grades;
    }
}
