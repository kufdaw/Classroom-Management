<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GradesHistory extends Model
{
    protected $fillable = [
        'subject_id', 'student_id', 'value', 'operation', 'teacher_id'
    ];

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'student_id');
    }
}
