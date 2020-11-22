<?php

return [

    /*
       |--------------------------------------------------------------------------
       | Validation Language Lines
       |--------------------------------------------------------------------------
       |
       | The following language lines contain the default error messages used by
       | the validator class. Some of these rules have multiple versions such
       | as the size rules. Feel free to tweak each of these messages here.
       |
     */

    'accepted'        => 'The :attribute must be accepted.',
    'active_url'      => 'The :attribute is not a valid URL.',
    'after'           => 'The :attribute must be a date after :date.',
    'after_or_equal'  => 'The :attribute must be a date after or equal to :date.',
    'alpha'           => 'The :attribute may only contain letters.',
    'alpha_dash'      => 'The :attribute may only contain letters, numbers, and dashes.',
    'alpha_num'       => 'The :attribute may only contain letters and numbers.',
    'array'           => 'The :attribute must be an array.',
    'before'          => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between'         => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file'    => 'The :attribute must be between :min and :max kilobytes.',
        'string'  => 'The :attribute must be between :min and :max characters.',
        'array'   => 'The :attribute must have between :min and :max items.',
    ],
    'boolean'        => 'The :attribute field must be true or false.',
    'confirmed'      => 'The :attribute confirmation does not match.',
    'date'           => 'The :attribute is not a valid date.',
    'date_format'    => 'The :attribute does not match the format :format.',
    'different'      => 'The :attribute and :other must be different.',
    'digits'         => 'The :attribute must be :digits digits.',
    'digits_between' => 'The :attribute must be between :min and :max digits.',
    'dimensions'     => 'The :attribute has invalid image dimensions.',
    'distinct'       => 'The :attribute field has a duplicate value.',
    'email'          => 'The :attribute must be a valid email address.',
    'exists'         => 'The selected :attribute is invalid.',
    'file'           => 'The :attribute must be a file.',
    'filled'         => 'The :attribute field must have a value.',
    'gender'         => 'A gender must be selected',
    'image'          => 'The :attribute must be an image.',
    'in'             => 'The selected :attribute is invalid.',
    'in_array'       => 'The :attribute field does not exist in :other.',
    'integer'        => 'The :attribute must be an integer.',
    'ip'             => 'The :attribute must be a valid IP address.',
    'ipv4'           => 'The :attribute must be a valid IPv4 address.',
    'ipv6'           => 'The :attribute must be a valid IPv6 address.',
    'json'           => 'The :attribute must be a valid JSON string.',
    'max'            => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file'    => 'The :attribute may not be greater than :max kilobytes.',
        'string'  => 'The :attribute may not be greater than :max characters.',
        'array'   => 'The :attribute may not have more than :max items.',
    ],
    'mimes'     => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min'       => [
        'numeric' => 'The :attribute must be at least :min.',
        'file'    => 'The :attribute must be at least :min kilobytes.',
        'string'  => 'The :attribute must be at least :min characters.',
        'array'   => 'The :attribute must have at least :min items.',
    ],
    'not_in'               => 'The selected :attribute is invalid.',
    'numeric'              => 'The :attribute must be a number.',
    'phone'                => 'The :attribute must be a valid U.S. phone number.',
    'present'              => 'The :attribute field must be present.',
    'privilege'            => 'The :attribute must be a valid employee privilege level',
    'regex'                => 'The :attribute format is invalid.',
    'require_privilege'    => 'You do not have the required permission level to perform this action',
    'required'             => 'The :attribute field is required.',
    'required_if'          => 'The :attribute field is required when :other is :value.',
    'required_unless'      => 'The :attribute field is required unless :other is in :values.',
    'required_with'        => 'The :attribute field is required when :values is present.',
    'required_with_all'    => 'The :attribute field is required when :values is present.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => 'The :attribute and :other must match.',
    'size'                 => [
        'numeric' => 'The :attribute must be :size.',
        'file'    => 'The :attribute must be :size kilobytes.',
        'string'  => 'The :attribute must be :size characters.',
        'array'   => 'The :attribute must contain :size items.',
    ],
    'string'      => 'The :attribute must be a string.',
    'timezone'    => 'The :attribute must be a valid zone.',
    'unique'      => 'The :attribute has already been taken.',
    'uploaded'    => 'The :attribute failed to upload.',
    'url'         => 'The :attribute format is invalid.',
    // 'within_year' => 'The :attribute must be less than a year ago.',
	'within_year' => 'The :attribute must be less than 18 months ago.',
    'unique_custom'    => 'This :attribute is taken.',

    /*
       |--------------------------------------------------------------------------
       | Custom Validation Language Lines
       |--------------------------------------------------------------------------
       |
       | Here you may specify custom validation messages for attributes using the
       | convention "attribute.rule" to name the lines. This makes it quick to
       | specify a specific custom language line for a given attribute rule.
       |
     */

    'custom' => [
        'gender' => [
            'required' => 'A gender selection is required'
        ],
        'manager' => [
            'required_without_all' => 'A general employee must be assigned to a manager'
        ],
        'poa_name' => [
            'required_if' => 'Required when :other is checked'
        ],
        'poa_relationship' => [
            'required_if' => 'Required when :other is checked'
        ],
        'poa_phone' => [
            'required_if' => 'Required when :other is checked'
        ],
        'poa_email' => [
            'required_if' => 'Required when :other is checked'
        ],
		'tobacco_year_quit' => [
            'date_format' => 'Only year is required. '
        ],
		// 'alcohol_amount_week' => [
  //           'required_if' => 'Required when answer to the question "Do you drink alcohol" is yes'
  //       ],
        'allergies_nkda' => [
            'required_without' => 'This must be checked when no allergies are listed'
        ],
		'hearing_aid' => [
		    'required_if' => 'Required when answer to the question "Do you have difficulty hearing?" is yes'
        ],
        'face_to_face_notCompleted_reason' => [
            'required_if' => 'Required when :other is checked'
        ],
       // 'billing-ending' => [
       //     'required' => 'An ending option is required'
        //]
    ],

    /*
       |--------------------------------------------------------------------------
       | Custom Validation Attributes
       |--------------------------------------------------------------------------
       |
       | The following language lines are used to swap attribute place-holders
       | with something more reader friendly such as E-Mail Address instead
       | of "email". This simply helps us make messages a little cleaner.
       |
     */

    'attributes' => [
        'addr1'                     => 'address line 1',
        'addr2'                     => 'address line 2',
        'bday'                      => 'birth date',
        'fname'                     => 'first name',
        'lname'                     => 'last name',
        'mname'                     => 'middle name',
        'occupation_desc'           => 'occupation description',
        'practice_id'               => 'practice',
        'repassword'                => 'repeated password',
        'renova_id'                 => 'Renova ID',
        'pd_last_seen'              => "date last seen",
        'insurance_primary_idnum'   => "primary insurance number",
        'insurance_secondary_idnum' => "secondary insurance number",
        "poa"                       => "power of attorney",

        // Care Plan Templates
        'symptoms.*.description'  => "option description",
        'goals.*.description'     => "option description",
        'tasks.*.description'     => "option description",
        'resources.*.description' => "option description",
        'tracking.*.description'  => "option description",

        // Administration
        'physicians.*.name'      => "physician name",
        'edit_physicians.*.name' => "physician name",

        // QUESTIONNAIRE
        // Patient Information
        'occupants.*.name' => "occupant",

            // Personal Health History
        "history_high_blood_pressure_yn"             => "high blood pressure history",
        "history_stroke_yn"                          => "high blood pressure history",
        "history_heart_disease_yn"                   => "high blood pressure history",
        "history_high_cholesterol_yn"                => "high cholesterol",
        "history_diabetes_yn"                        => "diabetes",
        "history_glaucoma_yn"                        => "glaucoma",
        "history_cancer_yn"                          => "cancer",
        "history_alcoholism_yn"                      => "alcoholism",
        "history_asthma_copd_yn"                     => "asthma/copd",
        "history_depression_suicide_yn"              => "depression suicide",
        "history_abdominal_aortic_aneurysm_yn"       => "abdominal aortic aneurysm",
        "stairs_house"                        => "stairs in house",
        "stairs_house_n"                      => "number of stairs",
        "stairs_in_out"                       => "stairs outside house",
        "stairs_in_out_n"                     => "number of stairs",
        'surgeries.*.date'                    => "date",
        'surgeries.*.reason'                  => "reason",
        'surgeries.*.hospital'                => "hospital",
        'upcoming_surgeries.*.type'           => "surgery type",
        'upcoming_surgeries.*.surgeon'        => "surgeon",
        'upcoming_surgeries.*.location'       => "location",
        'upcoming_surgeries.*.date'           => "date",
        'hospitalizations.*.date'             => "date",
        'hospitalizations.*.reason'           => "reason",
        'hospitalizations.*.hospital'         => "hospital",
        "providers.*.name"                    => "name",
        "providers.*.specialty"               => "specialty",
        "providers.*.number"                  => "number",                        // phone number
        "providers.*.office_visit"            => "office visit",
        "suppliers.*.name"                    => "name",
        "suppliers.*.device"                  => "device",
        "suppliers.*.phone"                   => "phone number",                  //phone number
        "medications.*.name"                  => "name",
        "medications.*.strength"              => "strength",
        "medications.*.frequency"             => "frequency",
        "allergies.*.drug_name"               => "name",
        "allergies.*.drug_reaction"           => "reaction",
        "caregivers.*.name"                   => "name",
        "caregivers.*.relationship"           => "relationship",
        "caregivers.*.phone"                  => "phone",
        "referrals.*.referral"                => "referral",
        "risk_factors.*.risk_factor"          => "risk factor",
        "chronic_conditions.*.icd10"          => "ICD-10",
        "chronic_conditions.*.description"    => "condition description",
        "depression_medications.*.medication" => "depression medication"
    ]
];
