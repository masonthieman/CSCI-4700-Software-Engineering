<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\TcmForm;
use App\Models\Summary;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MyPatientsController extends Controller
{
    public function index()
    {
        return view("dashboard.my-patients", ["data" => $this->populateData()]);
    }

    protected function populateData()
    {
        //TODO
        // Needs to pull in data from multiple pages to display on dashboard
    }

    protected function initData($fieldKeys)
    {
        $date = Carbon::now()->hour(0)->minute(0)->second(0)->addDay();
    }
    //counts

     public function patients()
    {	
		/*
		$Data = json_decode(file_get_contents('php://input'), true);
        $teamLead = $Data['teamLead'];
        $careManager = $Data['careManager'];
        $practice = $Data['practice'];
        */
		$patients = [];        
        foreach (Patient::orderBy("id")->where('enroll_tcm',1)->get() as $patient)
         $patients[] = $patient;

         return response()->json([
            "patients" => $patients,
        ]);

    }
	
	


     

}