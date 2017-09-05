<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = [
        'value', 'subject_id', 'student_id', 'teacher_id'
    ];

    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function student()
    {
        return $this->user()->where('role_id', 3);
    }

    public function teacher()
    {
        return $this->user()->where('role_id', 2);
    }
}
