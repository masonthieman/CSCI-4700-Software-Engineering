<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeSetAuthorityRequest extends AdminFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "employee_id" => "required|int",
            "is_admin"    => "boolean",
            "is_manager"  => "boolean"
        ];
    }
}
