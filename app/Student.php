<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;
class Student extends Authenticatable
{
    use Notifiable;
    protected $primaryKey = 'id_student';

    protected $guard = 'student';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function questions()
    {
        return $this->belongsToMany('App\Question',
            'student_questions', 'id_student', 'id_Question')
            ->withPivot(['answer']);
    }

    public function exams()
    {
        return $this->belongsToMany('App\Exam',
            'student_exams', 'id_student', 'id_Exam')
            ->withPivot(['date_passing','date_taking', 'mark']);

    }

    public function groups()
    {
        return $this->belongsToMany('App\Group',
            'student_groups', 'id_student', 'id_Group');

    }
}
