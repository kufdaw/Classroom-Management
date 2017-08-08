<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
            'name'
        ];

    public function division()
    {
        return $this->belongsToMany('App\Division', 'division_subject')->withPivot('teacher_id');
    }

    public function teacher()
    {
        return $this->belongsToMany('App\User', 'division_subject', 'id', 'teacher_id')->withPivot('subject_id');
    }
}
