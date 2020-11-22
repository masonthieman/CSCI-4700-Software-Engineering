<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PracticePhysician extends Model
{
    /**
     * Don't use timestamps
     *
     * @var bool
     */
    public $timestamps = False;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ["practice_id", "name"];

    /**
     * The practice this employee belongs to
     *
     * @return App\Models\Practice
     */
    public function practice()
    {
        return $this->belongsTo("App\Models\Practice");
    }

    /**
     * Render the JSON form of the physician
     *
     * @return array
     */
    public function json()
    {
        return [
            "id"   => $this->id,
            "name" => $this->name
        ];
    }
}
