<?php

namespace App\Models;

use App\Support\DashboardFetchable;
use App\Support\ModelMapper;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use DashboardFetchable, ModelMapper;

    protected $dates = ['dob', 'date'];

    protected $fillable = [
        'employee_id',
        'practice_id',
        'practice_physician_id',
        'fname',
        'mname',
        'lname',
        'gender',
        'dob',
        'addr1',
        'addr2',
        'city',
        'state',
        'zip',
        'ethnicity1',
        'ethnicity2',
        'phone_primary',
        'phone_secondary',
        'email',
        'no_email',
        'other_contact_name',
        'other_contact_relationship',
        'other_contact_phone',
        'other_contact_email',
        'preferred_contact',
        'emr',
        'date',
        "insurance_primary",
        "insurance_primary_idnum",
        "insurance_secondary",
        "insurance_secondary_idnum",
        "marital_status",
        "education",
        "occupation_status",
        "occupation_description",
        "military",
        'poa',
        'poa_name',
        'poa_relationship',
        'poa_phone',
        'poa_email',
        'enroll_awv',
        'enroll_iccm',
        'enroll_tcm',
        'enroll_other'
    ];

    /**
     * Update the patient's information from a giver form
     *
     * @param Summary|QuestionnaireForm $form
     */
    public function updateInfo($form)
    {
        $this->practice_id            = $form->practice_id;
        $this->practice_physician_id  = $form->practice_physician_id;
        $this->fname                  = $form->fname;
        $this->mname                  = $form->mname;
        $this->lname                  = $form->lname;
        $this->gender                 = $form->gender;
        $this->dob                    = $form->dob;
        $this->email                  = $form->email;
        $this->ethnicity1             = $form->ethnicity1;
        $this->ethnicity2             = $form->ethnicity2;
        $this->education              = $form->education;
        $this->marital_status         = $form->marital_status;
        $this->occupation_status      = $form->occupation_status;
        $this->occupation_description = $form->occupation_description;

        if ($form instanceof Summary) {
            $this->addr1                      = $form->addr1;
            $this->addr2                      = $form->addr2;
            $this->city                       = $form->city;
            $this->state                      = $form->state;
            $this->zip                        = $form->zip;
            $this->phone_primary              = $form->phone_primary;
            $this->phone_secondary            = $form->phone_secondary;
            $this->other_contact_name         = $form->other_contact_name;
            $this->other_contact_relationship = $form->other_contact_relationship;
            $this->other_contact_phone        = $form->other_contact_phone;
            $this->other_contact_email        = $form->other_contact_email;
            $this->preferred_contact          = $form->preferred_contact;
            $this->emr                        = $form->emr;
            $this->insurance_primary          = $form->insurance_primary;
            $this->insurance_primary_idnum    = $form->insurance_primary_idnum;
            $this->insurance_secondary        = $form->insurance_secondary;
            $this->insurance_secondary_idnum  = $form->insurance_secondary_idnum;
        }
        $this->save();
    }

    public function populationRelations()
    {
        return [
            "contactTime"
        ];
    }

    public function contactTime()
    {
        return $this->hasOne("App\Models\PatientContactTime");
    }

    public function employee()
    {
        return $this->belongsTo("App\Models\Employee");
    }

    public function practice()
    {
        return $this->belongsTo("App\Models\Practice");
    }

    public function physician()
    {
        return $this->belongsTo("App\Models\PracticePhysician", "practice_physician_id");
    }

    public function questionnaires()
    {
        return $this->hasMany("App\Models\QuestionnaireForm");
    }

    public function summaries()
    {
        return $this->hasMany("App\Models\Summary");
    }

    public function initialSummary()
    {
        return Summary::where("patient_id", $this->id)->first();
    }

    public function latestSummary()
    {
        return Summary::where("patient_id", $this->id)->orderBy("id", "desc")->first();
    }

    public static function filtered($filters)
    {
        $result = [];
        foreach (self::orderBy("id", "desc")->get() as $patient) {
            if ($filters["employee"] && $filters["employee"] != $patient->employee_id) {
                continue;
            }
            if ($filters["practice"] && $patient->practice_id != (intval($filters["practice"]))) {
                continue;
            }
            $result[] = $patient;
        }
        return $result;
    }
}
