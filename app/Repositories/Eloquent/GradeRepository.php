<?php

namespace App\Repositories\Eloquent;

use App\Grade;
use App\Division;
use App\Subject;
use App\User;
use App\Repositories\Contracts\GradeContract;
use Illuminate\Support\Collection;

class GradeRepository implements GradeContract
{
    public function add(string $value, int $subjectId, int $studentId, int $teacherId):Grade
    {
        $grade = Grade::create([
            'value' => $value,
            'subject_id' => $subjectId,
            'student_id' => $studentId,
            'teacher_id' => $teacherId
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
    public function getSubjectGrades(Division $division, Subject $subject):array
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

    /**
    * @param Division $Division
    * @return string[]
    */
    public function getDivisionGrades(Division $division):array
    {
        $gradesAmount = [];
        for ($i = 1; $i <= 6; $i += 0.5) {
            $temp = 0;
            foreach ($division->students as $student) {
                $temp += $student->grades->where('value', $i)->count();
            }
            if ($temp > 0) {
                $gradesAmount[(string)$i] = [(string)$i, $temp];
            }
        }
        return $gradesAmount;
    }

    /**
    * @param User $Teacher
    * @return string[]
    */
    public function getTeacherGrades(User $teacher):array
    {
        $gradesAmount = [];
        $grade = Grade::where('teacher_id', $teacher->id)->get();
        for ($i = 1; $i <= 6; $i += 0.5) {
            $temp = 0;
            $temp = $grade->where('value', $i)->count();
            if ($temp > 0) {
                $gradesAmount[(string)$i] = [(string)$i, $temp];
            }
        }
        return $gradesAmount;
    }
}
