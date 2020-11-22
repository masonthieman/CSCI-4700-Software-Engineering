<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormTestRequest;
use Illuminate\Http\Request;

class FormTestController extends Controller
{
    public function index()
    {
        return view("test.form");
    }

    public function submit(FormTestRequest $request)
    {
        return "Submitted";
    }

    public function save()
    {
        return "Saved";
    }
}
