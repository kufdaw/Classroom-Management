<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'birth_date', 'registration_token', 'surname'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function hasRole($role)
    {
        if (Auth::user()->role->name === $role) {
            return true;
        } else {
            return false;
        }
    }

    public function subjects()
    {
        return $this->belongsToMany('App\Subject', 'division_subject')->withPivot('division_id');
    }

    public function divisions()
    {
        return $this->belongsToMany('App\Division', 'division_subject')->withPivot('subject_id');
    }
}
