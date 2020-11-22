<?php

use Illuminate\Database\Seeder;
use App\Models\EmployeeTitle;

class EmployeeTitlesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		foreach (config("init")["employee_titles"] as $title) {
			EmployeeTitle::create([
				"title" => $title
			]);
		}
	}
}
