<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MCQuestion extends Model
{
    protected $primaryKey = 'id_m_c_questions';
    public function questions(){
        return $this->morphMany('App\Questtion','questiontable');
    }
    public function choices()
    {
        return $this->hasMany('App\MCChoice','id_m_c_questions');
    }
}
