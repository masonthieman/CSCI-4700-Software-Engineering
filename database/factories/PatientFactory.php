<?php

use Faker\Generator as Faker;
use App\Models\Patient;
use App\Models\PatientContactTime;
use App\Models\Practice;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Patient::class, function (Faker $faker) {
    $practice      = Practice::find(random_int(1, 10));
    $physicians    = $practice->physicians;
    $education     = config('form')["education"];
    $ethnicities   = config('form')["ethnicities"];
    $maritalStatus = array_keys(config('form')["marital_status"]);
    $ethnicity1    = random_int(1, count($ethnicities)) - 1;
    $ethnicity2    = Null;
    do {
        $ethnicity2 = random_int(1, count($ethnicities)) - 1;
    } while ($ethnicity2 == $ethnicity1);

    $hasSecondaryInsurance = random_int(0, 10) > 5;
    $working               = random_int(0, 10) > 5;
    return [
        'practice_id'               => $practice->id,
        'employee_id'               => 1,
        'practice_physician_id'     => $physicians[random_int(1, count($physicians)) - 1],
        'date'                      => Carbon::now(),
        'emr'                       => (string) random_int(1000000000, 9999999999),
        'fname'                     => $faker->firstName,
        'mname'                     => $faker->firstName,
        'lname'                     => $faker->lastName,
        'gender'                    => random_int(0, 1),
        'dob'                       => $faker->dateTimeBetween('-100 years', '-30 years'),
        'addr1'                     => $faker->streetAddress,
        'city'                      => $faker->city,
        'state'                     => $faker->stateAbbr,
        'zip'                       => sprintf('%05d', random_int(1,99999)),
        'ethnicity1'                => $ethnicities[$ethnicity1],
        'ethnicity2'                => (random_int(0, 10) >= 8) ? $ethnicities[$ethnicity2] : Null,
        'phone_primary'             => sprintf('(%03d) %03d-%04d', random_int(1, 999), random_int(1, 999), random_int(1, 9999)),
        'phone_secondary'           => random_int(0, 10) > 5 ? sprintf('(%03d) %03d-%04d', random_int(1, 999), random_int(1, 999), random_int(1, 9999)) : Null,
        'email'                     => $faker->freeEmail,
        'preferred_contact'         => random_int(0,2),
        'insurance_primary'         => $faker->name,
        'insurance_primary_idnum'   => (string) random_int(1000000000, 9999999999),
        'insurance_secondary'       => $hasSecondaryInsurance ? $faker->name : Null,
        'insurance_secondary_idnum' => $hasSecondaryInsurance ? (string) random_int(1000000000, 9999999999) : Null,
        'marital_status'            => $maritalStatus[random_int(1, count($maritalStatus)) - 1],
        'education'                 => $education[random_int(1, count($education)) - 1],
        'occupation_status'         => $working,
        'occupation_description'    => $working ? $faker->sentence() : Null
    ];
});

$factory->define(PatientContactTime::class, function (Faker $faker) {
    $fields = [];
    foreach (PatientContactTime::columnNames() as $col) {
        $fields[$col] = random_int(0, 1);
    }
    return $fields;
});
