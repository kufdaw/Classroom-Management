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
        return $this->belongsToMany('App\Division', 'division_subject')->withPivot('teacher_id');
    }

    public function teachers()
    {
        return $this->belongsToMany('App\User', 'division_subject', 'id', 'teacher_id')->withPivot('division_id');
    }

    public function getTeacherByDivisionId($id)
    {
        return $this->teachers()->where('division_subject.division_id', $id)->get();
    }
}
