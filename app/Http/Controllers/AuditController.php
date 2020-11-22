<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use App\Models\TbAuditField;
use App\Models\VwAuditRecord;

class AuditController extends Controller
{
    public function __construct(TbAuditField $audit_field, VwAuditRecord $audit_record)
    {
        $this->audit_field = $audit_field;
        $this->audit_record = $audit_record;
    }

    public function index() {
        
        return view('audit');
    }

    public function searchAudit(Request $request) {
        // Validate the data
        $this->validate(
            $request,
            [
                'table' => 'required',
                'operation' => 'required',
                'start_date' => 'required',
                'end_date' => 'required'
            ]
        );

        define("DATA", $request->all());

        // If no validations errors try querying the DB
        $audits = $this->audit_record->where("recorded", ">=", DATA['start_date'])
                                      ->where("recorded", "<=", DATA['end_date'])
                                      ->where("op", "=", DATA['operation'])
                                     ->where("table_name", "=", DATA['table'])
                                      ->get();

        if(!$audits->isEmpty()){
            return view("audit-results")->with("audits", $audits);
        }
        else {
            return redirect("/audit")->with("audit_not_found", "No audits match your search criteria.");
        }



    }

    public function createAudit(){
       return view("create-audit");
    }

    public function getFields(Request $request){
        // Get table name form AJAX POST  request
        $table_name = $request->input('tableName');
        // Query database for this table's fields
        $fields = array_map("reset", \DB::select("SELECT column_name FROM information_schema.columns WHERE table_name = '{$table_name}'"));
        // Send response back to caller
        return response()->json(['data'=> $fields]);
    }

    public function saveAudit(Request $request){
        $validator = Validator::make($request->all(), 
            [
                "table" => "required",
                'check-fields' => 'required',
            ],
            [
                
                "table.required" => "A valid table name is required.",
                "check-fields.required" => "At least one table field name is required."

            ]
        );

        if ($validator->fails()) {
            return redirect("/audit/create")
                        ->withErrors($validator)
                        ->withInput();
        }

        $form_data = $request->all(); // Get all form data

        define("TBNAME", $form_data["table"]); // Set table name
        define("SCHEMANAME", \DB::connection()->getDatabaseName()); // Get schema name

        // Filter out unwanted fields
        unset($form_data["_token"]); 
        unset($form_data["check-all"]);
        unset($form_data["table"]);
        unset($form_data["check-fields"]);

        define("DATA", $form_data); // Work with only desired data

        // Parse the data stage 1:
        $fields = [];
        $current_key = "";
        foreach (DATA as $key => $value){
            if($value == "on"){
                $current_key = $key;
                $fields[$current_key] = [];
            } else {
                array_push($fields[$current_key], $value);
            }
        }

        // Parse the data into the desired record format stage 2:
       $records = [];
       foreach ($fields as $key => $value){
           $record = [
               "table_schema" => SCHEMANAME,
               "table_name" => TBNAME,
               "column_name" => $key,
               "enabled"    => intval($value[1]) ,
               "loggable"   => intval($value[0])
           ];
           // Validate the field before inserting into DB
           $validator = Validator::make($record,
               [
                   "column_name" => "unique_with:tb_audit_fields, table_schema, table_name",
               ],
               [

                    "column_name.unique_with" => "Audit record already exists: "
                        . $record['table_schema']. " ". $record['table_name'].
                        " ". $record['column_name'],
               ]
           );

           if ($validator->fails()) {
               return redirect("/audit/create")
                   ->withErrors($validator)
                   ->withInput();
           }

           $records[] = $record;
       }

       // Save records to DB
       $this->audit_field->insert($records);
       return redirect("/audit")
           ->with("audit_create", "Successfully created ". sizeof($records) ." audit record(s)");




        // Create associative array of the sent data

        // Save the data in the DB i.e TbAuditField Model use Eloquent
        
    }
}