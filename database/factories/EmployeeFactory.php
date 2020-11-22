<?php

use Faker\Generator as Faker;
use App\Models\Employee;
use App\Models\EmployeeAuth;
use App\Models\EmployeeTitle;

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

function randomTitle()
{
    $titles = EmployeeTitle::all();
    return $titles[random_int(0, count($titles) - 1)];
}

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'fname'     => $faker->firstName,
        'mname'     => Null,
        'lname'     => $faker->lastName,
        'renova_id' => "R" . (string) random_int(100000000, 999999999),
        'title_id'  => randomTitle()
    ];
});

$factory->define(EmployeeAuth::class, function(Faker $faker) {
    return [
        'is_active'   => True,
        'is_admin'    => False,
        'is_manager'  => False,
        'email'       => $faker->email,
        'password'    => 'secret',
        'employee_id' => function () {
            return factory(Employee::class)->create()->id;
        }
    ];
});

$factory->state(EmployeeAuth::class, 'inactive', [
    'is_active' => False
]);

$factory->state(EmployeeAuth::class, 'manager', [
    'is_manager' => True
]);

$factory->state(EmployeeAuth::class, 'admin', [
    'is_admin' => True
]);
