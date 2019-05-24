<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MRChoice extends Model
{
    protected $primaryKey = 'id_m_r_choices';

    public $table = "m_r_choises";
    public $fillable = ['choice','is_correct'];
    public function mcquestion()
    {
        return $this->belongsTo('App\MRQuestion');
    }
}
