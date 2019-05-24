<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MCChoice extends Model
{
    protected $primaryKey = 'id_m_c_choices';

    public $table = "m_c_choices";
    public $fillable = ['choice'];
    public function mcquestion()
    {
        return $this->belongsTo('App\MCQuestion');
    }
}
