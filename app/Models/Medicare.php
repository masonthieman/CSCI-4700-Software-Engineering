<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicare extends Model
{
    //
    public $timestamps = False;

    protected $fillable = array(
        'id',
        'questionnaire_form_id',
        'preventive_services'
    );

    public function questionnaireForm()
    {
        return $this->belongsTo('App\Models\QuestionnaireForm');
    }

}
