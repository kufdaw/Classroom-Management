<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $fillable = [
            'name', 'tutor_id'
        ];

    public function subject()
    {
        return $this->belongsToMany('App\Subject', 'division_subject')->withPivot('teacher_id');
    }

    public function teacher()
    {
        return $this->belongsToMany('App\User', 'division_subject', 'id', 'teacher_id')->withPivot('subject_id');
    }

    public function tutor()
    {
        return $this->hasOne('App\User', 'id', 'tutor_id');
    }
}
