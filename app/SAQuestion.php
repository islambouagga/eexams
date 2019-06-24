<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SAQuestion extends Model
{
    protected $primaryKey = 'id_s_a_questions';
    public function questions(){
        return $this->morphMany('App\Questtion','questiontable');
    }
    public function choices()
    {
        return $this->hasMany('App\SAChoice','id_s_a_questions');
    }
}
