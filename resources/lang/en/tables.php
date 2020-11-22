<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Table Column Labels
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the labels that are display on a
    | given table's header. Add your table name here and then for each of
    | the ID's that you use, give them a nice pretty label to display.
    |
    */

    // Test Table
    "test_table" => [
        "id"    => "ID",
        "fname" => "First Name",
        "mname" => "Middle Name",
        "lname" => "Last Name"
    ],

    // Care Plan Templates
    "care_plan_templates" => [
        "name"  => "Condition Name",
        "icd10" => "ICD-10 Code",
        "options" => "Options"
    ],

    "care_plans" => [
        "name"  => "Condition Name",
        "icd10" => "ICD-10 Code",
        "date"  => "Date"
    ],

    "employees" => [
        "practice"   => "Practice",
        "renova_id"  => "ID",
        "esig"       => "eSignature",
        "is_manager" => "Manager",
        "is_admin"   => "Admin",
        "is_active"  => "Active"
    ],

    "practices" => [
        "name"      => "Name",
        "number"    => "Number",
        "is_active" => "Active"
    ],

    // TCM dashboard
    "patients" => [
        "lname"         => "Last Name",
        "fname"         => "First Name",
        "dob"           => "Date of Birth",
    ],

    // Reports Table
    "reports" => [
        "date_display"  => "Date",
        "practice_name" => "Practice",
        "lname"         => "Last Name",
        "fname"         => "First Name",
        "dob"           => "Date of Birth",
        "esignature"    => "eSignature"
    ],
    "reports_home" => [
        "hName" => "Hospital Name",
        "practice_name" => "Practice"
    ]
];
