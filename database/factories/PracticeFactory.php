<?php

use Faker\Generator as Faker;
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

$factory->define(Practice::class, function (Faker $faker) {
    return [
		'name'      => $faker->company,
		'number'    => 'P' . (string) random_int(100000000, 999999999),
		'is_active' => true,
    ];
});
