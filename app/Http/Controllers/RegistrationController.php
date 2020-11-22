<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\PatientAddRequest;
use App\Models\Patient;
use App\Models\PatientContactTime;

class RegistrationController extends Controller
{
    public function addPatient(PatientAddRequest $request)
    {
        $patient = Patient::createFromRequest($request, [
            "date"        => date("Y-m-d"),
            "employee_id" => Auth::user()->employee->id
        ]);
        PatientContactTime::createFromRequest($request, ["patient_id" => $patient->id]);
        return response()->json(["redirect" => route("registration.printing", $patient->id)]);
        //return  $patient->id;
    }
	

    public function index()
    {
        return view("registration");
    }

    public function printing(Patient $patient)
    {
        return view("printing.registration", ["form" => $patient, "printing" => true]);
    }
}