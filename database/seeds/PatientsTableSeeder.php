<?php

use Illuminate\Database\Seeder;
use App\Models\Patient;
use App\Models\PatientContactTime;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Patient::class, 50)->create()->each(function ($patient) {
            factory(PatientContactTime::class)->create([
                "patient_id" => $patient->id
            ]);
        });
    }
}
