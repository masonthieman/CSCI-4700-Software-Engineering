<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Navigation Bar Link Configuration
    |--------------------------------------------------------------------------
    |
    | This configuration file controls all of the links that are display on
    | the navigation bar. Use the unlocalized name as the key that points
    | to an array which contains the options for the given link. Easy!
    |
    | Note: The actual labels that are displayed on the navbar come from the
    |       navbar locale file located at /resources/lang/en/navbar.php
    |
    */

    "registration" => [
        "route"     => "registration",
    ],
    /* Adds audit item to main site navigation bar */
    "audit" => [
        "is_admin" => true,
        "route"     => "audit",
    ],
/*
    "care_plan" => [
        "dropdown"  => [
            "library" => [
                "route" => "care_plan.library"
            ],
            "summary" => [
                "route" => "care_plan.summary"
            ]
        ]
    ],

    "questionnaire" => [
        "dropdown"  => [
            "awv" => [
                "route" => "questionnaire.awv"
            ],
            "iccm" => [
                "route" => "questionnaire.iccm"
            ],
            "tcm" => [
                "route" => "questionnaire.tcm"
            ]            
        ]
    ],

    "reports" => [        
        // "route"     => "reports"
        "dropdown"  => [
            "awv" => [
                "route" => "reports"
            ],
            "tcm" => [
                "route" => "reports.tcm"
            ]
        ]
    ],
	*/
    "administration" => [
        "is_manager" => true, // Only managers and administrators can see the admin page
        "is_admin"   => true,
        "route"      => "administration"
    ],
/*
    "dashboard" => [
        "dropdown"  => [
            "my_patients" => [
                "route" => "dashboard.my_patients"
            ],
            "growth_charts" => [
                "route" => "dashboard.growth_charts"
            ]
        ]
    ],
*/
];
