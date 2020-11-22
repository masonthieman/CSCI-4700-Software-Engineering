<?php

namespace App\Models;

use App\Support\ModelMapper;
use Illuminate\Database\Eloquent\Model;

class PatientContactTime extends Model
{
    use ModelMapper;

    /**
     * The days of the week
     */
    public static $days = [
        "mon", "tue", "wed", "thu", "fri"
    ];

    /**
     * The times to choose from
     */
    public static $times = [
        "8-10", "10-12", "12-2", "2-5"
    ];

    /**
     * The values to allow to be fillable
     */
    protected $fillable = [
        "patient_id"
    ];

    /**
     * Prefix all input field names
     */
    public $prefix = "contact_time";

    /**
     * Don't use timestamps
     */
    public $timestamps = False;

    /**
     * Generate the list of column names
     */
    public static function columnNames()
    {
        $cols = [];
        foreach (self::$days as $day) {
            for ($i = 0; $i < count(self::$times); $i++) {
                $cols[] = "{$day}_{$i}";
            }
            $cols[] = "{$day}_any";
        }
        return $cols;
    }

    /**
     * A bit unorthodox, but this generates the fillables automatically
     */
    public function __construct(...$params)
    {
        foreach (self::columnNames() as $col) {
            $this->fillable[] = $col;
        }
        parent::__construct(...$params);
    }

    /**
     * Get the patient these contact times belong to
     */
    public function patient()
    {
        return $this->belongsTo("App\Models\Patient");
    }

    /**
     * Set the contact times
     */
    public function setContactTimesFromRequest($request)
    {
        foreach (self::columnNames() as $col) {
            $this[$col] = boolval(intval($request->input("contact_time_" . $col)));
        }
        return $this;
    }

    /**
     * Get the JSON representation
     */
    public function json()
    {
        $values = [];
        foreach (self::columnNames() as $name) {
            $values["contact_time_$name"] = $this[$name];
        }
        return $values;
    }
}
