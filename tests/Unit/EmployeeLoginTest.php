<?php

namespace Tests\Unit;

use App\Models\Employee;
use App\Models\EmployeeAuth;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmployeeLoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test authentication of active an active employee
     *
     * @return void
     */
    public function testActiveEmployee()
    {
        // Create an active employee and add him to the database.
        $employee = factory(EmployeeAuth::class)->create();

        // Test possible combinations of authentication
        $this->assertInvalidCredentials(credentials("wrong_username", "wrong_password"));
        $this->assertInvalidCredentials(credentials($employee->username, "wrong_password"));
        $this->assertInvalidCredentials(credentials("wrong_username", "secret"));
        $this->assertCredentials(credentials($employee->username, "secret"));
    }

    /**
     * Test authentication of an inactive employee
     *
     * @return void
     */
    public function testInactiveEmployee()
    {
        // Create an inactive employee and add him to the database.
        $employee = factory(EmployeeAuth::class)->states("inactive")->create();

        // Make sure the employee can't login
        $this->assertInvalidCredentials(credentials($employee->username, "secret"));
    }
}
