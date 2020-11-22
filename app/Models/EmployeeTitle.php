<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeTitle extends Model
{
    public $timestamps = false;

    public $fillable = [
        "title"
    ];

    public static function identify($title)
    {
        $entry = self::firstOrCreate(["title" => $title]);
        return $entry->id;
    }

    public function employees()
    {
        return $this->hasMany("App\Models\Employee");
    }

    public function __toString()
    {
        return $this->title;
    }
}
