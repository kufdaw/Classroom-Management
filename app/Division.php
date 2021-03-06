<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $fillable = [
        'name', 'tutor_id'
    ];

    public function subjects()
    {
        return $this->belongsToMany('App\Subject', 'division_subject')->withPivot('user_id');
    }

    public function teachers()
    {
        return $this->belongsToMany('App\User', 'division_subject')->withPivot('subject_id');
    }

    public function tutor()
    {
        return $this->hasOne('App\User', 'id', 'tutor_id');
    }

    public function students()
    {
        return $this->hasMany('App\User');
    }
}
