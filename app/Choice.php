<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    protected $primaryKey = 'id_choice';

    public $table = "choices";
    public $fillable = ['choice'];
    public function mcquestion()
    {
        return $this->belongsTo('App\MCQuestion');
    }
}
