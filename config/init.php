<?php

return [

	// The administrator account to initialize with
	"default_admin" => [
		"first_name"  => "John",
		"middle_name" => "Default",
		"last_name"   => "Smith",
		"email"       => "admin@renova.com",
		"password"    => "secret",
		"title"       => "Administrator",
	],

	// Employee titles to initialize with
	"employee_titles" => [
		"Account Manager",
		"Administrator",
		"Care Manager",
		"Director",
		"Enroller",
		"Manager",
		"Scheduler",
		"Specialist",
		"Team Leader"
	],

	"care_plans" => [
		config("care_plans.anemia"),
		config("care_plans.arthritis"),
		config("care_plans.asthma"),
		config("care_plans.atrial_fibrillation"),
		config("care_plans.chronic_back_pain"),
		config("care_plans.chronic_kidney_disease"),
		config("care_plans.chronic_migraines"),
		config("care_plans.congestive_heart_failure"),
		config("care_plans.copd"),
		config("care_plans.coronary_artery_disease"),
		config("care_plans.crohns"),
		config("care_plans.diabetes"),
		config("care_plans.diverticulosis"),
		config("care_plans.fibromyalgia"),
		config("care_plans.gerd"),
		config("care_plans.glaucoma"),
		config("care_plans.gout"),
		config("care_plans.hyperlipidemia"),
		config("care_plans.hypertension"),
		config("care_plans.hypothyroidism"),
		config("care_plans.lyme_disease"),
		config("care_plans.lymphadema"),
		config("care_plans.obesity"),
		config("care_plans.osteoarthritis"),
		config("care_plans.parkinson's"),
		config("care_plans.peripheral_vascular_disease"),
		config("care_plans.prostate_cancer"),
		config("care_plans.pulmonary_embolism"),
		config("care_plans.pulmonary_fibrosis"),
		config("care_plans.restless_legs_syndrome"),
		config("care_plans.rheumatoid_arthritis"),
		config("care_plans.sleep_apnea"),
		config("care_plans.vitamin_d_deficiency")
	]
];
