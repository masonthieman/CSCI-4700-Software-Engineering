<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    public const HASH_LENGTH = 64;

    protected $fillable = [
        "employee_id",
        "token"
    ];

    public static function createRequest(Employee $employee)
    {
        return self::updateOrCreate(
            ["employee_id" => $employee->id],
            ["token"       => createHash(self::HASH_LENGTH)]
        );
    }

    public static function fetch(string $token)
    {
        return self::where("token", $token)
                   ->whereDate("updated_at", ">=", Carbon::now()->subHours(24))
                   ->first();
    }

    public function employee()
    {
        return $this->belongsTo("App\Models\Employee");
    }
}
