<?php

/**
 * Form Service Provider
 * Created by David Ludwig
 *
 * Extends the Blade templating engine to include some useful form generation directives.
 * See documentation for more details.
 */

namespace App\Providers;

use App\Models\Practice;
use App\Models\Patient;
use App\Support\Form;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use DB;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend("gender", "App\Rules\Gender");
        Validator::extend("phone", "App\Rules\PhoneNumber");
        Validator::extend("within_year", "App\Rules\WithinYear");
        // Validator::extend("check_date_format", "App\Rules\ValidateDate");
        // Validator::extend("privilege", "App\Rules\Privilege");
        // Validator::extend("check_id",    "App\Rules\CheckId");
		 Validator::extend('unique_custom', function ($attribute, $value, $parameters, $validator) 
			{
				//print_r($parameters);		
				$validator_ar = $validator->getData();		
				list($table, $field, $field2) = $parameters;
				
				$checkid =  $validator_ar['insurance_primary_idnum_check'];
				
				// Get the parameters passed to the rule				
			
				//echo $field2;
				// Check the table and return true only if there are no entries matching
				// both the first field name and the user input value as well as
				// the second field name and the second field value
				if($checkid == '0'){
					return DB::table('patients')->where($field, $value)->count() == 0;
				}else{
					return true;
				}
			});
		
		Validator::extend('unique_secondary_custom', function ($attribute, $value, $parameters, $validator) 
			{
				//print_r($parameters);		
				$validator_ar = $validator->getData();		
				list($table, $field, $field2) = $parameters;
				
				$checkid =  $validator_ar['insurance_secondary_idnum_check'];
				
				// Get the parameters passed to the rule				
			
				//echo $field2;
				// Check the table and return true only if there are no entries matching
				// both the first field name and the user input value as well as
				// the second field name and the second field value
				if($checkid == '0'){
					return DB::table('patients')->where($field, $value)->count() == 0;
				}else{
					return true;
				}
			});
		
		
        $this->bootBladeFormDirectives();
    } 

    /**
     * Boot Blade form directives to use within views
     *
     * @return void
     */
    protected function bootBladeFormDirectives()
    {
        $this->bootInputFields();
        $this->bootSelectFields();
        $this->bootPrintingFields();

        Blade::directive("dynamicarea", function ($expression) {
            $params = parseParameters($expression);
            return "<div data-dynamic-template='$params[1]' data-dynamic-area='$params[0]'></div>"
                 . "<div class='row'><div class='col-md-12 form-group'>"
                 . "<button class='btn btn-outline-primary' data-dynamic-action='add' type='button' data-dynamic-group='$params[0]'>Add $params[2]</button>"
                 . "</div></div>";
        });
    }

    /**
     * Create the Blade directives for fillable input fields, like text boxes, password boxes, etc.
     *
     * @return void
     */
    protected function bootInputFields()
    {
        Blade::directive("input", function ($expression) {
            return "<?php echo \App\Support\Form::input($expression); ?>";
});

Blade::directive("hidden", function ($expression) {
return "<?php echo \App\Support\Form::input('hidden', $expression); ?>";
});

Blade::directive("date", function ($expression) {
return "<?php echo \App\Support\Form::input('date', $expression); ?>";
});

Blade::directive("month", function ($expression) {
return "<?php echo \App\Support\Form::input('month', $expression); ?>";
});

Blade::directive("time", function ($expression) {
return "<?php echo \App\Support\Form::input('time', $expression); ?>";
});

Blade::directive("email", function ($expression) {
return "<?php echo \App\Support\Form::input('email', $expression); ?>";
});


Blade::directive("number", function ($expression) {
return "<?php echo \App\Support\Form::input('number', $expression); ?>";
});

Blade::directive("password", function ($expression) {
return "<?php echo \App\Support\Form::input('password', $expression); ?>";
});

Blade::directive("phone", function ($expression) {
$params = parseParameters($expression);
$name = $params[0];
$attributes = defaultParameter($params, 1, []);
$attributes["data-inputmask"] = "'mask': '(999) 999-9999'";
$value = defaultParameter($params, 2, "");
return Form::input("text", $name, $attributes, $value);
});

Blade::directive("text", function ($expression) {
return "<?php echo \App\Support\Form::input('text', $expression); ?>";
});

Blade::directive("checkbox", function($expression) {
return '<?php
                $params     = [' . $expression . '];
                $label      = $params[0];
                $name       = $params[1];
                $id         = $params[2];
                $value      = defaultParameter($params, 3, 1);
                $attributes = defaultParameter($params, 4, []);
                $checked    = defaultParameter($params, 5, False);
                echo \App\Support\Form::checkBox($name, $id, $label, $value, $attributes, $checked);
            ?>';
});

Blade::directive("sectioncheckbox", function ($expression) {
$params = parseParameters($expression);
$label = $params[0];
$name = $params[1];
$id = $params[2];
$value = defaultParameter($params, 3, 1);
$attributes = defaultParameter($params, 4, []);
$checked = defaultParameter($params, 5, false);
return Form::sectionCheckBox($name, $id, $label, $value, $attributes, $checked);
});
}

/**
* Create the Blade directives for various select fields
*
* @return void
*/
protected function bootSelectFields()
{
Blade::directive("select", function ($expression) {
return "<?php echo App\Support\Form::select($expression); ?>";
});

Blade::directive("selectsearch", function ($expression) {
return "<?php echo App\Support\Form::selectSearchable($expression); ?>";
});

Blade::directive("selecteducation", function ($expression) {
// Use this style to force caching
$params = parseParameters($expression);
$name = $params[0];
$attributes = defaultParameter($params, 1, []);
$selected = defaultParameter($params, 2, "");
return Form::selectOrOther("Education", $name, config("form")["education"], $attributes, $selected);
});

Blade::directive("selectmaritalstatus", function ($expression) {
// Use this style to force caching
$params = parseParameters($expression);
$name = $params[0];
$attributes = defaultParameter($params, 1, []);
$selected = defaultParameter($params, 2, "");
return Form::select("Marital Status", $name, config("form")["marital_status"], $attributes, $selected);
});

Blade::directive("selectethnicity", function ($expression) {
// Use this style to force caching
$params = parseParameters($expression);
$name = $params[0];
$attributes = defaultParameter($params, 1, []);
$selected = defaultParameter($params, 2, "");
return Form::selectOrOther("Ethnicity", $name, config("form")["ethnicities"], $attributes, $selected);
});

Blade::directive("selectmedabbrev", function ($expression) {
// Use this style to force caching
$params = parseParameters($expression);
$name = $params[0];
$attributes = defaultParameter($params, 1, []);
$selected = defaultParameter($params, 2, "");
return Form::select("Medical Abbreviations", $name, config("form")["medical_abbreviations"], $attributes, $selected);
});

Blade::directive("selectstate", function ($expression) {
// Use this style to force caching
$params = parseParameters($expression);
$name = $params[0];
$attributes = defaultParameter($params, 1, []);
$selected = defaultParameter($params, 2, "");
return Form::select("State", $name, config("form")["states"], $attributes, $selected);
});

Blade::directive("selecttitle", function ($expression) {
return '<?php
                $params     = [' . $expression . '];
                $name       = $params[0];
                $attributes = defaultParameter($params, 1, []);
                $selected   = defaultParameter($params, 2, "");
                $options    = [];
                foreach (App\Models\EmployeeTitle::orderBy("title")->get() as $title) {
                    $options[$title->id] = $title;
                }
                echo App\Support\Form::selectOrOther("Title", $name, $options, $attributes, $selected);
            ?>';
});

Blade::directive("selectmanager", function ($expression) {
return '<?php
                $params     = [' . $expression . '];
                $name       = $params[0];
                $attributes = defaultParameter($params, 1, []);
                $selected   = defaultParameter($params, 2, "");
                $options    = [];
                $auths      = App\Models\EmployeeAuth::managers()->get();
                foreach ($auths as $auth) {
                    $employee = $auth->employee;
                    $options[$employee->id] = $employee->esig();
                }
                echo App\Support\Form::selectSearchable("None", $name, $options, $attributes, $selected);
            ?>';
});

Blade::directive("selectother", function ($expression) {
return "<?php echo App\Support\Form::selectOrOther($expression); ?>";
});

//All Practice Select
Blade::directive("selectpractice", function ($expression) {
return '<?php
                $params     = [' . $expression . '];
                $name       = $params[0];
                $attributes = defaultParameter($params, 1, []);
                $selected   = defaultParameter($params, 2, "");
                $options    = ["" => "None"];
                $practices  = Auth::user()->is_admin ? App\Models\Practice::all() : Auth::user()->employee->practices;
                foreach ($practices as $practice) {
                    $options[$practice->id] = $practice->name;
                }
                echo App\Support\Form::selectSearchable("Practice", $name, $options, $attributes, $selected);
            ?>';
});

//Active Practice Select
Blade::directive("selectactivepractice", function ($expression) {
return '<?php
                $params     = [' . $expression . '];
                $name       = $params[0];
                $attributes = defaultParameter($params, 1, []);
                $selected   = defaultParameter($params, 2, "");
                $options    = ["" => "None"];
                $practices  = Auth::user()->is_admin ? App\Models\Practice::activePractices() : Auth::user()->employee->practices;
                foreach ($practices as $practice) {
                    $options[$practice->id] = $practice->name;
                }
                echo App\Support\Form::selectSearchable("Practice", $name, $options, $attributes, $selected);
            ?>';
});


//Active Practice Select
Blade::directive("selecttable", function ($expression) {
return '<?php
                $params     = [' . $expression . '];
                $name       = $params[0];
                $attributes = defaultParameter($params, 1, []);
                $selected   = defaultParameter($params, 2, "");
                $options    = ["" => "None"];
                $tables = array_map("reset", \DB::select("SHOW TABLES"));
                foreach ($tables as $key => $value) {
                    $options[$value] = $value;
                }
                echo App\Support\Form::selectSearchable("Table", $name, $options, $attributes, $selected);
            ?>';
});

Blade::directive("selectpatient", function ($expression) {
return '<?php
                $params      = [' . $expression . '];
                $name        = $params[0];
                $attributes  = defaultParameter($params, 1, []);
                $selected    = defaultParameter($params, 2, "");
                $options     = [];
                $practiceIds = [];
                $practices   = Auth::user()->is_admin ? App\Models\Practice::all() : Auth::user()->employee->practices;
                foreach ($practices as $practice) {
                    $practiceIds[] = $practice->id;
                }
                foreach (App\Models\Patient::whereIn("practice_id", $practiceIds)->get() as $patient) {
                    $patientString = $patient->fname . " " . $patient->mname . " " . $patient->lname . ", DOB: " . dateValue($patient->dob);
                    $options[$patient->id] = $patientString;
                }
                echo App\Support\Form::selectSearchable("Patient", $name, $options, $attributes, $selected);
            ?>';
});

Blade::directive("selectemployee", function ($expression) {
return '<?php
                $params     = [' . $expression . '];
                $name       = $params[0];
                $attributes = defaultParameter($params, 1, []);
                $selected   = defaultParameter($params, 2, "");
                $options    = ["" => "None"];
                foreach (App\Models\Employee::all() as $employee) {
                    $options[$employee->id] = $employee->esig();
                }
                echo App\Support\Form::selectSearchable("Employee", $name, $options, $attributes, $selected);
            ?>';
});

Blade::directive("selectassigntcm", function ($expression) {
return '<?php
                $params     = [' . $expression . '];
                $name       = $params[0];
                $attributes = defaultParameter($params, 1, []);
                $selected   = defaultParameter($params, 2, "");
                $options    = ["" => "None"];
                foreach (App\Models\Employee::where("title_id","3")->get() as $assigned_to) {
                    $options[$assigned_to->id] = $assigned_to;
                }
                echo App\Support\Form::selectSearchable("Assign CareManager", $name, $options, $attributes, $selected);
            ?>';
});

Blade::directive("selectreassigntcm", function ($expression) {
return '<?php
                $params     = [' . $expression . '];
                $name       = $params[0];
                $attributes = defaultParameter($params, 1, []);
                $selected   = defaultParameter($params, 2, "");
                $options    = ["" => "None"];
                foreach (App\Models\Employee::where("title_id","3")->get() as $reassigned_to) {
                    $options[$reassigned_to->id] = $reassigned_to;
                }
                echo App\Support\Form::selectSearchable("Reassign CareManager", $name, $options, $attributes, $selected);
            ?>';
});

Blade::directive("selectadmissionfacilitytype", function ($expression) {
// Use this style to force caching
$params = parseParameters($expression);
$name = $params[0];
$attributes = defaultParameter($params, 1, []);
$selected = defaultParameter($params, 2, "");
return Form::select("Admission Facility Type", $name, config("form")["admission_facility_type"], $attributes,
$selected);
});

Blade::directive("selectadmittedform", function ($expression) {
// Use this style to force caching
$params = parseParameters($expression);
$name = $params[0];
$attributes = defaultParameter($params, 1, []);
$selected = defaultParameter($params, 2, "");
return Form::select("Admitted Form", $name, config("form")["admitted_form"], $attributes, $selected);
});

Blade::directive("selectdischargedto", function ($expression) {
// Use this style to force caching
$params = parseParameters($expression);
$name = $params[0];
$attributes = defaultParameter($params, 1, []);
$selected = defaultParameter($params, 2, "");
return Form::select("Discharged To", $name, config("form")["discharged_to"], $attributes, $selected);
});

Blade::directive("selectaddltimelyinitialcontactoutcome", function ($expression) {
// Use this style to force caching
$params = parseParameters($expression);
$name = $params[0];
$attributes = defaultParameter($params, 1, []);
$selected = defaultParameter($params, 2, "");
return Form::select("Timely Initial Contact Outcome", $name, config("form")["addl_timely_initial_contact_outcome"],
$attributes, $selected);
});
}

/**
* Boot up the fields for printing
*/
protected function bootPrintingFields()
{
Blade::directive("printradio", function ($expression) {
return '
<?php $params = [' . $expression . '] ?>
<label>
    <input type="radio" <?php echo ($params[0] === False || $params[0] === 0) ? "checked" : ""; ?>>
    No
</label>
<label>
    <input type="radio" <?php echo $params[0] ? "checked" : ""; ?>>
    Yes
</label>
<span class="printing-span"><?php echo $params[1]; ?></span>';
});

Blade::directive("printcheckbox", function ($expression) {
return '
<?php $params = [' . $expression . '] ?>
<label>
    <input type="checkbox" <?php echo $params[0] ? "checked" : ""; ?>>
    <?php echo $params[1]; ?>
</label>';
});
}

/**
* Register any application services.
*
* @return void
*/
public function register()
{
//
}
}