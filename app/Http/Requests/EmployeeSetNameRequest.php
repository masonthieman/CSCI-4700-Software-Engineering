<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class EmployeeSetNameRequest extends FormRequest
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
            "fname"      => "required|max:35",
            "mname"      => "nullable|max:35",
            "lname"      => "required|max:35",
        ];
    }
}
