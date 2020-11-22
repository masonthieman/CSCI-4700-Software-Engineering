<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            EmployeeTitlesTableSeeder::class,
            EmployeesTableSeeder::class,
            PracticesTableSeeder::class,
            PatientsTableSeeder::class,
            QuestionnairesTableSeeder::class,
            CarePlanTemplatesTableSeeder::class,
        ]);
    }
}
