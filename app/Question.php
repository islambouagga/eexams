<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

Relation::morphMap([
    'TFQuestion'=>'App\TFQuestion'
]);

class Question extends Model
{
    protected $primaryKey = 'id_Question';
    public function exams(){
        return $this->belongsToMany('App\Exam')

            ;
    }


    public function  questiontable(){

        return $this->morphTo();
    }
}
