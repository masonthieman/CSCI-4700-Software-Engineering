<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'created_by', 'title_id', 'fname', 'mname', 'lname', 'renova_id'
    ];

    public static function allManageable(Employee $employee)
    {
        if ($employee->auth->is_admin)
            return Employee::all();
        $auths     = EmployeeAuth::where("manager_id", $employee->id)->get();
        $employees = [];
        foreach ($auths as $auth) {
            $employees[] = $auth->employee;
        }
        return $employees;
    }

    public static function filtered($filters, Employee $manager = Null)
    {
        $result    = [];
        $employees = $manager ? self::allManageable($manager) : Employee::all();
        foreach ($employees as $employee) {
            if (!($filters["active"] == "true" && $employee->auth->is_active) &&
                !($filters["inactive"] == "true" && !$employee->auth->is_active)) {
                    continue;
            }
            if ($filters["title"] && $filters["title"] != $employee->title)
                continue;
            if ($filters["practice"] && !$employee->hasPractice(intval($filters["practice"])))
                continue;
            $result[] = $employee;
        }
        return $result;
    }

    /**
     * Get the authentication credentials for the employee
     *
     * @return App\Models\EmployeeAuth
     */
    public function auth()
    {
        return $this->hasOne("App\Models\EmployeeAuth");
    }

    /**
     * Get the practices that are assigned for the employee
     *
     * @return array
     */
    public function practices()
    {
        return $this->belongsToMany("App\Models\Practice");
    }

    /**
     * Determine if this employee is associated with a practice
     *
     * @return bool
     */
    public function hasPractice($id)
    {
        foreach ($this->practices as $practice) {
            if ($practice->id == $id) {
                return True;
            }
        }
        return False;
    }

    /**
     * Get the employee that added this employee
     *
     * @return App\Models\Employee|null
     */
    public function addedBy()
    {
        return $this->belongsTo("App\Models\Employee", "created_by");
    }

    public function name()
    {
        return "{$this->fname} {$this->lname}";
    }

    public function title()
    {
        return $this->belongsTo("App\Models\EmployeeTitle");
    }

    public function esig()
    {
        return "{$this->lname}, {$this->fname}, {$this->title}";
    }

    /**
     * Get the data values in a JSON Object
     *
     * @return array
     */
    public function json()
    {
        $practices = [];
        foreach ($this->practices as $practice) {
            $practices[] = $practice->id;
        }
        return [
            "id"         => $this->id,
            "renova_id"  => $this->renova_id,
            "fname"      => $this->fname,
            "mname"      => $this->mname,
            "lname"      => $this->lname,
            "title"      => $this->title,
            "manager_id" => $this->auth->manager_id,
            "is_admin"   => $this->auth->is_admin,
            "is_manager" => $this->auth->is_manager,
            "is_active"  => $this->auth->is_active,
            "practices"  => $practices,
            "esig"       => $this->esig()
        ];
    }

    public function __toString()
    {
        return $this->esig();
    }
}
