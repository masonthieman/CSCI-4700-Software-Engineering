<?php

use App\Models\CarePlanTemplate;
use Illuminate\Database\Seeder;

class CarePlanTemplatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        foreach (config("init")["care_plans"] as $carePlan) {
            CarePlanTemplate::create($carePlan);
        }
    }
}
