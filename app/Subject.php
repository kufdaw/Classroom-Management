<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
            'name'
        ];

    public function divisions()
    {
        return $this->belongsToMany('App\Division', 'division_subject')->withPivot('user_id');
    }

    public function teachers()
    {
        return $this->belongsToMany('App\User', 'division_subject')->withPivot('division_id');
    }

    public function getTeacherByDivisionId($id)
    {
        return $this->teachers()->where('division_subject.division_id', $id);
    }

    public function grades()
    {
        return $this->hasMany('App\Grade');
    }

    public function getGradesByStudentId($id)
    {
        return $this->grades()->where('student_id', $id);
    }
}
