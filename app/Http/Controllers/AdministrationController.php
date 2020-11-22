<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Employee;
use App\Models\EmployeeAuth;
use App\Models\EmployeeTitle;
use App\Models\Practice;
use App\Models\PracticePhysician;
use App\Http\Requests\EmployeeAddRequest;
use App\Http\Requests\EmployeePracticeLinkRequest;
use App\Http\Requests\EmployeePracticeUnlinkRequest;
use App\Http\Requests\EmployeeSetPasswordRequest;
use App\Http\Requests\EmployeeSetStatusRequest;
use App\Http\Requests\EmployeeSetTitleRequest;
use App\Http\Requests\EmployeeSetNameRequest;
use App\Http\Requests\EmployeeSetAuthorityRequest;
use App\Http\Requests\EmployeeManagerAssignRequest;
use App\Http\Requests\FetchEmployeesAndPracticesRequest;
use App\Http\Requests\PracticeAddRequest;
use App\Http\Requests\PracticeSetStatusRequest;
use App\Http\Requests\PracticeSetPhysiciansRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdministrationController extends Controller
{
    /**
     * Load the page administration page
     *
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return view("administration");
    }

    /**
     * View the print page for the specified employee
     *
     * @return Illuminate\Http\Response
     */
    public function printEmployee(Employee $employee)
    {
        return view("printing.administration-employee", compact("employee"));
    }

    /**
     * View the print page for the specified practice
     *
     * @return Illuminate\Http\Response
     */
    public function printPractice(Practice $practice)
    {
        return view("printing.administration-practice", compact("practice"));
    }

    // Ajax GET Request Methods ------------------------------------------------

    /**
     * Fetch all employees and practices
     *
     * @param  Illuminate\Http\Request  $request
     * @return Illuminate\Http\Response
     */
    public function employeesAndPractices(FetchEmployeesAndPracticesRequest $request)
    {
        // return response($request->all(), 422);
        $employeeFilters = $request->employees;
        $practiceFilters = $request->practices;
        $employees = [];
        $practices = [];
        $titles    = [];
        foreach (Employee::filtered($employeeFilters, Auth::user()->employee) as $employee)
            $employees[$employee->id] = $employee->json();
        foreach (Practice::filtered($practiceFilters) as $practice)
            $practices[$practice->id] = $practice->json();
        foreach (EmployeeTitle::orderBy("title")->get() as $title)
            array_unshift($titles, $title->title);
        return response()->json([
            "employees" => $employees,
            "practices" => $practices,
            "titles"    => $titles
        ]);
    }

    // Ajax POST Request Methods -----------------------------------------------

    /**
     * Add an employee to the Renova database
     *
     * @param  App\Http\Requests\EmployeeAddRequest $request
     * @return Illuminate\Http\Response
     */
    public function employeeAdd(EmployeeAddRequest $request)
    {
        $employee = Employee::create([
            "created_by" => Auth::user()->employee->id,
            "title_id"   => EmployeeTitle::identify($request->input("title")),
            "fname"      => $request->input("fname"),
            "mname"      => $request->input("mname"),
            "lname"      => $request->input("lname"),
            "renova_id"  => $request->input("renova_id"),
        ]);
        $auth = EmployeeAuth::create([
            "employee_id" => $employee->id,
            "manager_id"  => $request->input("manager"),
            "email"       => $request->input("email"),
            "password"    => $request->input("password"),
            "is_manager"  => $request->input("is_manager") || False,
            "is_admin"    => $request->input("is_admin") || False,
            "is_active"   => True
        ]);
        $auth->employee()->associate($employee);
        Log::channel("activity")->info("EMPLOYEE ADD: '{$employee->esig()}' by '" . Auth::user()->employee->esig() . "'");
        return response()->json($employee->json());
    }

    /**
     * Set an employee's name
     *
     * @param App\Http\Requests\EmployeeSetNameRequest
     * @return Illuminate\Http\Response
     */
    public function employeeSetName(EmployeeSetNameRequest $request)
    {
        $employee        = Employee::find($request->input("employee_id"));
        $employee->fname = $request->input("fname");
        $employee->mname = $request->input("mname");
        $employee->lname = $request->input("lname");
        $employee->save();
        Log::channel("activity")->info("EMPLOYEE NAME CHANGE: '{$employee->renova_id}' changed by '" . Auth::user()->employee->esig() . "'");
        return response()->json($employee->json());
    }

    /**
     * Set an employee's name
     *
     * @param App\Http\Requests\EmployeeSetNameRequest
     * @return Illuminate\Http\Response
     */
    public function employeeSetAuthority(EmployeeSetAuthorityRequest $request)
    {
        $employee         = Employee::find($request->input("employee_id"));
        if ($employee->id == Auth::user()->employee->id)
            abort(401);
        $auth             = $employee->auth;
        $auth->is_admin   = (bool) $request->input("is_admin");
        $auth->is_manager = (bool) $request->input("is_manager");
        $auth->save();
        Log::channel("activity")->info("EMPLOYEE AUTH CHANGED: '{$employee->esig()}' by '" . Auth::user()->employee->esig() . "'");
        return response()->json($employee->json());
    }

    /**
     * Set an employee's status
     *
     * @param App\Http\Requests\EmployeeSetStatusRequest $request
     * @return Illuminate\Http\Response
     */
    public function employeeSetStatus(EmployeeSetStatusRequest $request)
    {
        $auth = EmployeeAuth::fromEmployeeId($request->input("employee_id"));
        if ($auth->id == Auth::user()->id)
            abort(401);
        $auth->is_active = (int) $request->input("status");
        $auth->save();
        Log::channel("activity")->info(sprintf(
            "EMPLOYEE STATUS CHANGE: '%s' set to '%s' by '%s'",
            $auth->employee->esig(),
            activeInactive($auth->is_active),
            Auth::user()->employee->esig()
        ));
        return response()->json($auth->employee->json());
    }

    /**
     * Set an employee's password
     *
     * @param App\Http\Requests\EmployeeSetPasswordRequest $request
     * @return Illuminate\Http\Response
     */
    public function employeeSetPassword(EmployeeSetPasswordRequest $request)
    {
        $auth = EmployeeAuth::fromEmployeeId($request->input("employee_id"));
        $auth->password = $request->input("password");
        $auth->save();
        Log::channel("activity")->info(sprintf(
            "EMPLOYEE PASSWORD CHANGE: '%s' password changed by '%s'",
            $auth->employee->esig(),
            Auth::user()->employee->esig()
        ));
    }

    /**
     * Set an employee's title
     *
     * @param App\Http\Requests\EmployeeSetPasswordRequest $request
     * @return Illuminate\Http\Response
     */
    public function employeeSetTitle(EmployeeSetTitleRequest $request)
    {
        $employee = Employee::find($request->input("employee_id"));
        $employee->title_id = EmployeeTitle::identify($request->input("title"));
        $employee->save();
        Log::channel("activity")->info(sprintf(
            "EMPLOYEE TITLE CHANGE: '%s' title changed to '%s' by '%s'",
            $employee->esig(),
            $employee->title->title,
            Auth::user()->employee->esig()
        ));
        return response()->json($employee->json());
    }

    /**
     * Link the given practice to the employee
     *
     * @param App\Http\Requests\EmployeePracticeLinkRequest $request
     * @return Illuminate\Http\Response
     */
    public function employeePracticeLink(EmployeePracticeLinkRequest $request)
    {
        $employee = Employee::find($request->input("employee_id"));
        $employee->practices()->detach($request->input("practice_id")); // Prevent duplicates
        $employee->practices()->attach($request->input("practice_id"));
        $practice = Practice::find($request->input("practice_id"));
        Log::channel("activity")->info(sprintf(
            "PRACTICE LINKED TO EMPLOYEE: Practice '%s' was linked to '%s' by '%s'",
            "{$practice->number}: {$practice->name}",
            $employee->esig(),
            Auth::user()->employee->esig()
        ));
        return response()->json($employee->json());
    }

    /**
     * Unlink the given practices from the employee
     *
     * @param App\Http\Requests\EmployeePracticeUnlinkRequest $request
     * @return Illuminate\Http\Response
     */
    public function employeePracticeUnlink(EmployeePracticeUnlinkRequest $request)
    {
        $employee = Employee::find($request->input("employee_id"));
        $employee->practices()->detach($request->input("unlink"));
        $practice = Practice::find($request->input("unlink"));
        Log::channel("activity")->info(sprintf(
            "PRACTICE UNLINKED TO EMPLOYEE: Practices have been unlinked from '%s' by '%s'",
            $employee->esig(),
            Auth::user()->employee->esig()
        ));
        return response()->json($employee->json());
    }

    /**
     * Assign a manager to an employee
     *
     * @param App\Http\Requests\EmployeeManagerAssignRequest $request
     * @return Illuminate\Http\Response
     */
    public function employeeManagerAssign(EmployeeManagerAssignRequest $request)
    {
        $auth = Employee::find($request->input("employee_id"))->auth;
        $auth->manager_id = $request->input("manager");
        $auth->save();
        Log::channel("activity")->info(sprintf(
            "EMPLOYEE MANAGER ASSIGNED: '%s' was assigned manager '%s' by '%s'",
            $auth->employee->esig(),
            $auth->manager ? $auth->manager->employee->esig() : "None",
            Auth::user()->employee->esig()
        ));
        return response()->json($auth->employee->json());
    }

    /**
     * Add a practice to the database
     *
     * @param App\Http\Requests\PracticeAddRequest $request
     * @return Illuminate\Http\Response
     */
    public function practiceAdd(PracticeAddRequest $request)
    {
        $practice = Practice::create([
            "name"      => $request->input("name"),
            "number"    => $request->input("number"),
            "is_active" => True
        ]);
        foreach ($request->input("physicians") ?? [] as $physician) {
            PracticePhysician::create([
                "practice_id" => $practice->id,
                "name"        => $physician["name"]
            ]);
        }
        Log::channel("activity")->info(sprintf(
            "PRACTICE ADD: Practice '%s' was added by '%s'",
            "{$practice->number}: {$practice->name}",
            Auth::user()->employee->esig()
        ));
        return response()->json($practice->json());
    }

    /**
     * Set a practice's status
     *
     * @param App\Http\Requests\PracticeSetStatusRequest $request
     * @return Illuminate\Http\Response
     */
    public function practiceSetStatus(PracticeSetStatusRequest $request)
    {
        $practice = Practice::find($request->input("id"));
        $practice->is_active = (int) $request->input("status");
        $practice->save();
        Log::channel("activity")->info(sprintf(
            "PRACTICE STATUS CHANGE: '%s' status changed to '%s' by '%s'",
            "{$practice->number}: {$practice->name}",
            activeInactive($practice->is_active),
            Auth::user()->employee->esig()
        ));
        return response()->json($practice->json());
    }

    /**
     * Set a practice's status
     *
     * @param App\Http\Requests\PracticeSetStatusRequest $request
     * @return Illuminate\Http\Response
     */
    public function practiceSetPhysicians(PracticeSetPhysiciansRequest $request)
    {
        $practice = Practice::find($request->input("id"));
        PracticePhysician::where("practice_id", $practice->id)->delete();
        foreach ($request->input("edit_physicians") ?? [] as $physician) {
            PracticePhysician::create([
                "practice_id" => $practice->id,
                "name"        => $physician["name"]
            ]);
        }
        Log::channel("activity")->info(sprintf(
            "PRACTICE PHYSICIANS CHANGED: Physicians in practice '%s' have been modified by '%s'",
            "{$practice->number}: {$practice->name}",
            Auth::user()->employee->esig()
        ));
        return response()->json($practice->json());
    }
}
