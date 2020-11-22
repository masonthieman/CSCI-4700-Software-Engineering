<?php

use Illuminate\Database\Seeder;
use App\Models\Practice;
use App\Models\PracticePhysician;

class PracticesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Practice::class, 10)->create()->each(function($practice) {
            for ($i = 0; $i < random_int(1, 5); $i++)
                factory(PracticePhysician::class)->create([
                    "practice_id" => $practice
                ]);
        });
    }
}
