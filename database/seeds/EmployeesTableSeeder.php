<?php

use Illuminate\Database\Seeder;
use App\Models\EmployeeAuth;
use App\Models\EmployeeTitle;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $account = config("init")["default_admin"];
        $auth = factory(EmployeeAuth::class)->states("admin", "manager")->create([
            "email"    => $account["email"],
            "password" => $account["password"]
        ]);

        $auth->employee->fill([
            "fname"    => $account["first_name"],
            "mname"    => $account["middle_name"],
            "lname"    => $account["last_name"],
            "title_id" => EmployeeTitle::identify($account["title"])
        ])->save();
    }
}
