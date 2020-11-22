<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class EmployeeAuth extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employee_id', 'manager_id', 'email', 'password', 'is_manager', 'as_admin', 'is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    /**
     * Get the employee that owns these auth credentials
     *
     * @return App\Models\Employee
     */
    public function employee()
    {
        return $this->belongsTo("App\Models\Employee");
    }

    /**
     * Get the assigned manager
     *
     * @return App\Models\Employee|null
     */
    public function manager()
    {
        return $this->belongsTo("App\Models\EmployeeAuth", "manager_id");
    }

    /**
     * Fetch all users that are managers
     *
     * @return QueryBuilder
     */
    public static function scopeManagers($query)
    {
        return $query->where("is_manager", True);
    }

    /**
     * Get the authentication that belongs to the given employee ID
     *
     * @return App\Models\EmployeeAuth
     */
    public function scopefromEmployeeId($query, $id)
    {
        return $query->where("employee_id", $id)->first();
    }

    /**
     * Hash the given password before saving it
     *
     * @return void
     */
    public function setPasswordAttribute(string $value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    // Disable the "remember me" token -----------------------------------------

    /**
     * Since there is no "remember token", return null
     *
     * @return string|null
     */
    public function getRememberToken()
    {
        return Null;
    }

    /**
     * Don't allow setting a "remember me" token
     *
     * @param  mixed  $value
     * @return void
     */
    public function setRememberToken($value)
    { }

    /**
     * since there is no column name for the "remember me" token, return null
     *
     * @return string|null
     */
    public function getRememberTokenName()
    {
        return Null;
    }
}
