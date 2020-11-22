<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarePlanTemplate extends Model
{
    /**
     * Don't use timestamps for this
     *
     * @var boolean
     */
    public $timestamps = True;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'icd10', 'template'
    ];

    /**
     * Convert the template to JSON
     *
     * @param [type] $value
     * @return void
     */
    public function getTemplateAttribute($value)
    {
        return json_decode($value, True);
    }

    /**
     * Convert the given value into a string
     *
     * @param [type] $value
     * @return void
     */
    public function setTemplateAttribute($value)
    {
        $this->attributes["template"] = json_encode($value);
    }

    public function summaryCarePlans()
    {
        return $this->hasMany("App\Models\SummaryCarePlan");
    }
}
