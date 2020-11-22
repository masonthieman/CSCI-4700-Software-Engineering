<?php
/*
   |--------------------------------------------------------------------------
   | Web Routes
   |--------------------------------------------------------------------------
   |
   | Here is where you can register web routes for your application. These
   | routes are loaded by the RouteServiceProvider within a group which
   | contains the "web" middleware group. Now create something great!
   |
 */

// Test Routes *(Remove for production)*
Route::get("/table-test", "Test\TableTestController@index");
Route::get("/form-test", "Test\FormTestController@index");
Route::post("/form-test/submit", "Test\FormTestController@submit")->name("form_test.submit");
Route::post("/form-test/save", "Test\FormTestController@save")->name("form_test.save");



// Public routes
Route::get("/", function () {
    return view("home");
})->name("home");
Route::get("/logout", "Auth\LoginController@logout")->name("logout");

// Guest only routes
Route::middleware(["guest"])->group(function () {
    Route::get("/login", "Auth\LoginController@index")->name("login");
    Route::get("/forgot-password", "Auth\LoginController@forgotPassword")->name("login.forgot_password");
    Route::get("/reset-password/{token}", "Auth\LoginController@resetPassword")->name("login.reset_password");
    Route::post("/login", "Auth\LoginController@authenticate");
    Route::post("/forgot-password", "Auth\LoginController@requestPasswordReset");
    Route::post("/reset-password/{token}", "Auth\LoginController@setPassword");
});

// Authenticated user only routes
Route::middleware(["auth"])->group(function () {
    // Webpage routes
    Route::get("/registration", "RegistrationController@index")->name("registration");
    Route::post("/registration", "RegistrationController@addPatient");
    Route::get("/care-plan/summary", "CarePlanSummaryController@index")->name("care_plan.summary");
    Route::get("/care-plan/library", function () {
        return view("care-plan-library");
    })->name("care_plan.library");

    
    // Audit trail routes
    Route::get("/audit", "AuditController@index")->name("audit");
    Route::post("/audit", "AuditController@searchAudit")->name("audit-search");
    Route::get("/audit/results", "AuditController@searchAudit")->name("page-search-results");
    Route::get("/audit/create", "AuditController@createAudit")->name("create-audit");
    Route::post("/audit/get-fields", "AuditController@getFields")->name("get-fields");
    Route::post("/audit/create", "AuditController@saveAudit")->name("save-audit");

    
    
    
    
   
    //printing
	Route::get("/registration/printing/{patient}", "RegistrationController@printing")->name("registration.printing");
	Route::post("/print-table", "TablePrintingController@index")->name("print-table");
	
	
    

    // Ajax Routes
    Route::get("/ajax/care_plan/library/template_fetch", "CarePlanTemplatesController@fetch")->name("ajax.care_plan.templates.fetch");
    Route::get("/ajax/questionnaire_populate", "QuestionnaireController@populate")->name("ajax.questionnaire.populate");
    Route::get("/ajax/tcm_populate", "TcmController@populate")->name("ajax.tcm.populate");
    Route::get("/ajax/reports/fetch", "ReportsController@fetch")->name("ajax.reports.fetch");
    Route::get("/ajax/summary_populate", "CarePlanSummaryController@populate")->name("ajax.summary.populate");
    Route::get("/ajax/practice/{practice}/physicians", "CommonController@physicians")->name("ajax.practice.physicians");
    Route::post("/ajax/questionnaire_save", "QuestionnaireController@save")->name("ajax.questionnaire.save");
    Route::post("/ajax/questionnaire_submit", "QuestionnaireController@submit")->name("ajax.questionnaire.submit");
    Route::post("/ajax/tcm_save", "TcmController@save")->name("ajax.tcm.save");
    Route::post("/ajax/tcm_submit", "TcmController@submit")->name("ajax.tcm.submit");
    Route::post("/ajax/summary_save", "CarePlanSummaryController@save")->name("ajax.summary.save");
    Route::post("/ajax/summary_submit", "CarePlanSummaryController@submit")->name("ajax.summary.submit");

    Route::post("/ajax/questionnaire_byPassValidationSave", "QuestionnaireController@byPassValidationSave");

});

Route::middleware(["auth", "auth.manager"])->group(function () {
    Route::get("/administration", "AdministrationController@index")->name("administration");
    Route::get("/administration/printing/employee/{employee}", "AdministrationController@printEmployee")->name("administration.print.employee");
    Route::get("/administration/printing/practice/{practice}", "AdministrationController@printPractice")->name("administration.print.practice");
    Route::get("/care-plan/library/templates", "CarePlanTemplatesController@index")->name("care_plan.templates");
    Route::get("/care-plan/library/templates/create", "CarePlanTemplatesController@create")->name("care_plan.templates.create");
    Route::get("/care-plan/library/templates/edit/{template}", "CarePlanTemplatesController@edit")->name("care_plan.templates.edit");
// Ajax Routes

    Route::get("/ajax/data_care_plan_fetch", "CarePlanTemplatesController@carePlans");
    Route::post("/ajax/care_plan/library/template_create", "CarePlanTemplatesController@post")->name("ajax.care_plan.templates.create");
    Route::put("/ajax/care_plan/library/template_edit/{template}", "CarePlanTemplatesController@put")->name("ajax.care_plan.templates.edit");
    Route::delete("/ajax/care_plan/library/template_delete/{template}", "CarePlanTemplatesController@delete")->name("ajax.care_plan.templates.delete");
    Route::get("/care_plan/library/templates/printing/{template}", "CarePlanTemplatesController@printCarePlan")->name("ajax.care_plan.templates.print");


    Route::get("/ajax/data_admin_fetch", "AdministrationController@employeesAndPractices");
    Route::post("/ajax/employee/set_name", "AdministrationController@employeeSetName")->name("ajax.employee.name.set");
    Route::post("/ajax/employee/set_status", "AdministrationController@employeeSetStatus")->name("ajax.employee.status.set");
    Route::post("/ajax/employee/set_password", "AdministrationController@employeeSetPassword")->name("ajax.employee.password.set");
    Route::post("/ajax/employee/set_title", "AdministrationController@employeeSetTitle")->name("ajax.employee.title.set");
    Route::post("/ajax/employee/practice_link", "AdministrationController@employeePracticeLink")->name("ajax.employee.practice.link");
    Route::post("/ajax/employee/practice_unlink", "AdministrationController@employeePracticeUnlink")->name("ajax.employee.practice.unlink");

    

});

// Authenticated administrator only routes
Route::middleware(["auth", "auth.admin"])->group(function () {
    // Ajax routes
    Route::post("/ajax/employee/add", "AdministrationController@employeeAdd")->name("employee_add");
    Route::post("/ajax/employee/assign_manager", "AdministrationController@employeeManagerAssign")->name("ajax.employee.manager.assign");
    Route::post("/ajax/employee/set_auth", "AdministrationController@employeeSetAuthority")->name("ajax.employee.auth.set");

    Route::post("/ajax/practice/add", "AdministrationController@practiceAdd")->name("ajax.practice.add");
    Route::post("/ajax/practice/set_status", "AdministrationController@practiceSetStatus")->name("ajax.practice.status.set");
    Route::post("/ajax/practice/set_physicians", "AdministrationController@practiceSetPhysicians")->name("ajax.practice.physicians.set");
});