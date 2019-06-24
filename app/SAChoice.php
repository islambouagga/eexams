<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SAChoice extends Model
{
    protected $primaryKey = 'id_s_a_choices';

    public $table = "s_a_choices";
    public $fillable = ['choice'];
    public function mcquestion()
    {
        return $this->belongsTo('App\SAQuestion');
    }
}
