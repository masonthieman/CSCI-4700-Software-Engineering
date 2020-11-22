<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Practice extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ["name", "number", "is_active"];

    /**
     * Fetch all practices with the given filters
     */
    public static function filtered($filters)
    {
        $result    = [];
        $practices = Practice::all();
        foreach ($practices as $practice) {
            if (!($filters["active"] == "true" && $practice->is_active) &&
                !($filters["inactive"] == "true" && !$practice->is_active)) {
                    continue;
            }
            $result[] = $practice;
        }
        return $result;
    }

    /**
     * Fetch all active practices
     */
    public static function activePractices()
    {
        return Practice::all()->where("is_active", 1);
    }

    /**
     * Get the employees that are assigned to this practice
     *
     * @return array
     */
    public function employees()
    {
        return $this->belongsToMany("App\Models\Employee");
    }

    /**
     * Get the physicians that are assigned to this practice
     *
     * @return array
     */
    public function physicians()
    {
        return $this->hasMany("App\Models\PracticePhysician");
    }

    /**
     * Get the data values in a JSON Object
     *
     * @return array
     */
    public function json()
    {
        return [
            "id"         => $this->id,
            "name"       => $this->name,
            "number"     => $this->number,
            "is_active"  => $this->is_active,
            "physicians" => $this->physicians
        ];
    }
}
