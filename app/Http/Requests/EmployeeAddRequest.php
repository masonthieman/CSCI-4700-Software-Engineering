<?php

namespace App\Http\Requests;

class EmployeeAddRequest extends AdminFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "fname"      => "required|max:35",
            "mname"      => "nullable|max:35",
            "lname"      => "required|max:35",
            "title"      => "required|max:45",
            "renova_id"  => "required|max:10|unique:employees",
            "email"      => "required|email|unique:employee_auths",
            "password"   => "required|" . config("form")["password_requirements"],
            "repassword" => "required|same:password",
            "is_manager" => "boolean",
            "is_admin"   => "boolean",
            "manager"    => "required_without_all:is_manager,is_admin|nullable|exists:employees,id"
        ];
    }
}
