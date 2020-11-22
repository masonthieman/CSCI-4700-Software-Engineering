<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssignedTo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title_id', 'fname', 'mname', 'lname'
    ];

    /**
     * The practice this employee belongs to
     *
     * @return App\Models\AssignedTo
     */
    // public function assigned_to()
    // {
    //     return $this->belongsTo("App\Models\AssignedTo");
    // }
    public function emplassigned_tooyees()
    {
        return $this->belongsToMany("App\Models\Employee");
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
