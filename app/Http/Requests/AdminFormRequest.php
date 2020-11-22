<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

abstract class AdminFormRequest extends FormRequest
{
    /**
     * Only administrators can send this type of request
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user() && Auth::user()->is_admin;
    }
}
