<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class FetchEmployeesAndPracticesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user() && (Auth::user()->is_admin || Auth::user()->is_manager);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "employees.active"   => "nullable",
            "employees.inactive" => "nullable",
            "practices.active"   => "nullable",
            "practices.inactive" => "nullable"
        ];
    }
}
