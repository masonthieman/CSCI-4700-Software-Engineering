<?php

use Illuminate\Database\Seeder;
use App\Models\Patient;
use App\Models\QuestionnaireForm;
use App\Models\QuestionnaireCaffeine;

class QuestionnairesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Patient::all() as $patient) {
            $questionnaire = factory(QuestionnaireForm::class)->create([
                'patient_id'             => $patient->id,
                'practice_id'            => $patient->practice_id,
                'practice_physician_id'  => $patient->practice_physician_id,
                'employee_id'            => 1,
                'type'                   => random_int(0, 1),
                'fname'                  => $patient->fname,
                'mname'                  => $patient->mname,
                'lname'                  => $patient->lname,
                'gender'                 => $patient->gender,
                'ethnicity1'             => $patient->ethnicity1,
                'ethnicity2'             => $patient->ethnicity2,
                'dob'                    => $patient->dob,
                'email'                  => $patient->email,
                'marital_status'         => $patient->marital_status,
                'education'              => $patient->education,
                'occupation_description' => $patient->occupation_description,
                'occupation_status'      => $patient->occupation_status,
            ]);
            $caffeine = new QuestionnaireCaffeine([
                "none"                => (bool) random_int(0, 1),
                "drinks_coffee"       => (bool) random_int(0, 1),
                "drinks_tea"          => (bool) random_int(0, 1),
                "drinks_cola"         => (bool) random_int(0, 1),
                "coffee_cups_per_day" => random_int(0, 1),
                "tea_cups_per_day"    => random_int(0, 1),
                "cola_cups_per_day"   => random_int(0, 1)
            ]);
            $caffeine->questionnaire_form_id = $questionnaire->id;
            $caffeine->save();
        }
    }
}
