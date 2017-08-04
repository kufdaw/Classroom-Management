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
        return $this->belongsToMany('App\Subject');
    }

    public function tutor()
    {
        return $this->hasOne('App\User', 'id', 'tutor_id');
    }
}
