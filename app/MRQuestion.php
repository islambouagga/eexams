<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MRQuestion extends Model
{
    protected $primaryKey = 'id_m_r_questions';
    public function questions(){
        return $this->morphMany('App\Questtion','questiontable');
    }
    public function choices()
    {
        return $this->hasMany('App\MRChoice','id_m_r_questions');
    }
}
