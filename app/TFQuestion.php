<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TFQuestion extends Model
{
    protected $primaryKey = 'id_t_f_questions';
    public function questions(){
        return $this->morphMany('App\Questtion','questiontable');
    }
}
