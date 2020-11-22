<?php

namespace App\Http\Requests;

class PracticeAddRequest extends AdminFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name"              => "required|max:50",
            "number"            => "required|max:45",
            "physicians.*.name" => "required|max:100"
        ];
    }
}
