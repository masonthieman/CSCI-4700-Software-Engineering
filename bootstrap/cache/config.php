<?php return array (
  'app' => 
  array (
    'name' => 'Renova',
    'env' => 'local',
    'debug' => true,
    'url' => 'http://michaelk.d-insights.global',
    'timezone' => 'UTC',
    'locale' => 'en',
    'fallback_locale' => 'en',
    'key' => 'base64:/l2oMB+4A3qNN9PDSYSWUkxKgNvcUTPaPbG8eBpMEJo=',
    'cipher' => 'AES-256-CBC',
    'providers' => 
    array (
      0 => 'Illuminate\\Auth\\AuthServiceProvider',
      1 => 'Illuminate\\Broadcasting\\BroadcastServiceProvider',
      2 => 'Illuminate\\Bus\\BusServiceProvider',
      3 => 'Illuminate\\Cache\\CacheServiceProvider',
      4 => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
      5 => 'Illuminate\\Cookie\\CookieServiceProvider',
      6 => 'Illuminate\\Database\\DatabaseServiceProvider',
      7 => 'Illuminate\\Encryption\\EncryptionServiceProvider',
      8 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
      9 => 'Illuminate\\Foundation\\Providers\\FoundationServiceProvider',
      10 => 'Illuminate\\Hashing\\HashServiceProvider',
      11 => 'Illuminate\\Mail\\MailServiceProvider',
      12 => 'Illuminate\\Notifications\\NotificationServiceProvider',
      13 => 'Illuminate\\Pagination\\PaginationServiceProvider',
      14 => 'Illuminate\\Pipeline\\PipelineServiceProvider',
      15 => 'Illuminate\\Queue\\QueueServiceProvider',
      16 => 'Illuminate\\Redis\\RedisServiceProvider',
      17 => 'Illuminate\\Auth\\Passwords\\PasswordResetServiceProvider',
      18 => 'Illuminate\\Session\\SessionServiceProvider',
      19 => 'Illuminate\\Translation\\TranslationServiceProvider',
      20 => 'Illuminate\\Validation\\ValidationServiceProvider',
      21 => 'Illuminate\\View\\ViewServiceProvider',
      22 => 'App\\Providers\\AppServiceProvider',
      23 => 'App\\Providers\\AuthServiceProvider',
      24 => 'App\\Providers\\EventServiceProvider',
      25 => 'App\\Providers\\FormServiceProvider',
      26 => 'App\\Providers\\RouteServiceProvider',
    ),
    'aliases' => 
    array (
      'App' => 'Illuminate\\Support\\Facades\\App',
      'Artisan' => 'Illuminate\\Support\\Facades\\Artisan',
      'Auth' => 'Illuminate\\Support\\Facades\\Auth',
      'Blade' => 'Illuminate\\Support\\Facades\\Blade',
      'Broadcast' => 'Illuminate\\Support\\Facades\\Broadcast',
      'Bus' => 'Illuminate\\Support\\Facades\\Bus',
      'Cache' => 'Illuminate\\Support\\Facades\\Cache',
      'Config' => 'Illuminate\\Support\\Facades\\Config',
      'Cookie' => 'Illuminate\\Support\\Facades\\Cookie',
      'Crypt' => 'Illuminate\\Support\\Facades\\Crypt',
      'DB' => 'Illuminate\\Support\\Facades\\DB',
      'Eloquent' => 'Illuminate\\Database\\Eloquent\\Model',
      'Event' => 'Illuminate\\Support\\Facades\\Event',
      'File' => 'Illuminate\\Support\\Facades\\File',
      'Gate' => 'Illuminate\\Support\\Facades\\Gate',
      'Hash' => 'Illuminate\\Support\\Facades\\Hash',
      'Lang' => 'Illuminate\\Support\\Facades\\Lang',
      'Log' => 'Illuminate\\Support\\Facades\\Log',
      'Mail' => 'Illuminate\\Support\\Facades\\Mail',
      'Notification' => 'Illuminate\\Support\\Facades\\Notification',
      'Password' => 'Illuminate\\Support\\Facades\\Password',
      'Queue' => 'Illuminate\\Support\\Facades\\Queue',
      'Redirect' => 'Illuminate\\Support\\Facades\\Redirect',
      'Redis' => 'Illuminate\\Support\\Facades\\Redis',
      'Request' => 'Illuminate\\Support\\Facades\\Request',
      'Response' => 'Illuminate\\Support\\Facades\\Response',
      'Route' => 'Illuminate\\Support\\Facades\\Route',
      'Schema' => 'Illuminate\\Support\\Facades\\Schema',
      'Session' => 'Illuminate\\Support\\Facades\\Session',
      'Storage' => 'Illuminate\\Support\\Facades\\Storage',
      'URL' => 'Illuminate\\Support\\Facades\\URL',
      'Validator' => 'Illuminate\\Support\\Facades\\Validator',
      'View' => 'Illuminate\\Support\\Facades\\View',
    ),
  ),
  'auth' => 
  array (
    'defaults' => 
    array (
      'guard' => 'web',
      'passwords' => 'employee_auth',
    ),
    'guards' => 
    array (
      'web' => 
      array (
        'driver' => 'session',
        'provider' => 'employee_auth',
      ),
      'api' => 
      array (
        'driver' => 'token',
        'provider' => 'employee_auth',
      ),
    ),
    'providers' => 
    array (
      'employee_auth' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\Models\\EmployeeAuth',
      ),
    ),
    'passwords' => 
    array (
      'employee_auth' => 
      array (
        'provider' => 'employee_auth',
        'table' => 'password_resets',
        'expire' => 60,
      ),
    ),
  ),
  'broadcasting' => 
  array (
    'default' => 'log',
    'connections' => 
    array (
      'pusher' => 
      array (
        'driver' => 'pusher',
        'key' => '',
        'secret' => '',
        'app_id' => '',
        'options' => 
        array (
          'cluster' => 'mt1',
          'encrypted' => true,
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
      ),
      'log' => 
      array (
        'driver' => 'log',
      ),
      'null' => 
      array (
        'driver' => 'null',
      ),
    ),
  ),
  'cache' => 
  array (
    'default' => 'file',
    'stores' => 
    array (
      'apc' => 
      array (
        'driver' => 'apc',
      ),
      'array' => 
      array (
        'driver' => 'array',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'cache',
        'connection' => NULL,
      ),
      'file' => 
      array (
        'driver' => 'file',
        'path' => '/home/michaelk/public_html/storage/framework/cache/data',
      ),
      'memcached' => 
      array (
        'driver' => 'memcached',
        'persistent_id' => NULL,
        'sasl' => 
        array (
          0 => NULL,
          1 => NULL,
        ),
        'options' => 
        array (
        ),
        'servers' => 
        array (
          0 => 
          array (
            'host' => '127.0.0.1',
            'port' => 11211,
            'weight' => 100,
          ),
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
      ),
    ),
    'prefix' => 'renova_cache',
  ),
  'database' => 
  array (
    'default' => 'mysql',
    'connections' => 
    array (
      'sqlite' => 
      array (
        'driver' => 'sqlite',
        'database' => 'renova_mtsu_feb20201',
        'prefix' => '',
      ),
      'mysql' => 
      array (
        'driver' => 'mysql',
        'host' => 'localhost',
        'port' => '3306',
        'database' => 'renova_mtsu_feb20201',
        'username' => 'mtsrendb201',
        'password' => 'MtRE#20202',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'strict' => false,
        'engine' => NULL,
        'options' => 
        array (
        ),
      ),
      'pgsql' => 
      array (
        'driver' => 'pgsql',
        'host' => 'localhost',
        'port' => '3306',
        'database' => 'renova_mtsu_feb20201',
        'username' => 'mtsrendb201',
        'password' => 'MtRE#20202',
        'charset' => 'utf8',
        'prefix' => '',
        'schema' => 'public',
        'sslmode' => 'prefer',
      ),
      'sqlsrv' => 
      array (
        'driver' => 'sqlsrv',
        'host' => 'localhost',
        'port' => '3306',
        'database' => 'renova_mtsu_feb20201',
        'username' => 'mtsrendb201',
        'password' => 'MtRE#20202',
        'charset' => 'utf8',
        'prefix' => '',
      ),
    ),
    'migrations' => 'migrations',
    'redis' => 
    array (
      'client' => 'predis',
      'default' => 
      array (
        'host' => '127.0.0.1',
        'password' => NULL,
        'port' => '6379',
        'database' => 0,
      ),
    ),
  ),
  'filesystems' => 
  array (
    'default' => 'local',
    'cloud' => 's3',
    'disks' => 
    array (
      'local' => 
      array (
        'driver' => 'local',
        'root' => '/home/michaelk/public_html/storage/app',
      ),
      'public' => 
      array (
        'driver' => 'local',
        'root' => '/home/michaelk/public_html/storage/app/public',
        'url' => 'http://michaelk.d-insights.global/storage',
        'visibility' => 'public',
      ),
      's3' => 
      array (
        'driver' => 's3',
        'key' => NULL,
        'secret' => NULL,
        'region' => NULL,
        'bucket' => NULL,
        'url' => NULL,
      ),
    ),
  ),
  'form' => 
  array (
    'billing_codes' => 
    array (
      'billing_initial_awv' => 'Initial AWV (G0438)',
      'billing_subsequent_awv' => 'Subsequent AWV (G0439)',
      'billing_advanced_care_plan' => 'Advanced Care Plan (99497)',
      'billing_care_plan_development' => 'Care Plan Development (G0506)',
    ),
    'education' => 
    array (
      0 => 'High School',
      1 => 'Trade School',
      2 => 'Some College',
      3 => 'College',
      4 => 'Unknown',
    ),
    'ethnicities' => 
    array (
      0 => 'Caucasian',
      1 => 'African-American',
      2 => 'Asian',
      3 => 'Hispanic/Latino',
      4 => 'Unknown',
    ),
    'marital_status' => 
    array (
      'single' => 'Single',
      'partnered' => 'Partnered',
      'married' => 'Married',
      'separated' => 'Separated',
      'divorced' => 'Divorced',
      'widowed' => 'Widowed',
    ),
    'medical_abbreviations' => 
    array (
      0 => 'QD',
      1 => 'BID',
      2 => 'TID',
      3 => 'QID',
      4 => 'As Directed',
      5 => 'ac',
      6 => 'pc',
      7 => 'HS',
      8 => 'PRN',
      9 => 'Monthly',
      10 => 'Weekly',
    ),
    'occupation_status' => 
    array (
      0 => 'Working',
      1 => 'Retired',
      2 => 'Disabled',
    ),
    'military' => 
    array (
      0 => 'Yes',
      1 => 'No',
      2 => 'Unknown',
    ),
    'select_yes_no_option' => 
    array (
      0 => 'No',
      1 => 'Yes',
    ),
    'preferred_contact' => 
    array (
      0 => 'Primary phone number',
      1 => 'Secondary phone number',
      2 => 'Email',
      3 => 'Other contact',
    ),
    'states' => 
    array (
      'AK' => 'Alaska',
      'AL' => 'Alabama',
      'AR' => 'Arkansas',
      'AZ' => 'Arizona',
      'CA' => 'California',
      'CO' => 'Colorado',
      'CT' => 'Connecticut',
      'DC' => 'District of Columbia',
      'DE' => 'Delaware',
      'FL' => 'Florida',
      'GA' => 'Georgia',
      'HI' => 'Hawaii',
      'IA' => 'Iowa',
      'ID' => 'Idaho',
      'IL' => 'Illinois',
      'IN' => 'Indiana',
      'KS' => 'Kansas',
      'KY' => 'Kentucky',
      'LA' => 'Louisiana',
      'MA' => 'Massachusetts',
      'MD' => 'Maryland',
      'ME' => 'Maine',
      'MI' => 'Michigan',
      'MN' => 'Minnesota',
      'MO' => 'Missouri',
      'MS' => 'Mississippi',
      'MT' => 'Montana',
      'NC' => 'North Carolina',
      'ND' => 'North Dakota',
      'NE' => 'Nebraska',
      'NH' => 'New Hampshire',
      'NJ' => 'New Jersey',
      'NM' => 'New Mexico',
      'NV' => 'Nevada',
      'NY' => 'New York',
      'OH' => 'Ohio',
      'OK' => 'Oklahoma',
      'OR' => 'Oregon',
      'PA' => 'Pennsylvania',
      'PR' => 'Puerto Rico',
      'RI' => 'Rhode Island',
      'SC' => 'South Carolina',
      'SD' => 'South Dakota',
      'TN' => 'Tennessee',
      'TX' => 'Texas',
      'UT' => 'Utah',
      'VA' => 'Virginia',
      'VT' => 'Vermont',
      'WA' => 'Washington',
      'WI' => 'Wisconsin',
      'WV' => 'West Virginia',
      'WY' => 'Wyoming',
    ),
    'titles' => 
    array (
      0 => 'A.U.',
      1 => 'AE-C',
      2 => 'ANP',
      3 => 'ATC',
      4 => 'Au.D.',
      5 => 'B.C.-ADM',
      6 => 'B.S.',
      7 => 'BSN',
      8 => 'CCC-A',
      9 => 'CCC-SLP',
      10 => 'CCRN',
      11 => 'CDE',
      12 => 'CDTC',
      13 => 'CFNP',
      14 => 'CGC',
      15 => 'CHT',
      16 => 'CLE',
      17 => 'CMA',
      18 => 'CNM',
      19 => 'CNS',
      20 => 'CNSC',
      21 => 'CNSD',
      22 => 'COMT',
      23 => 'CPM',
      24 => 'CSCS',
      25 => 'CSO',
      26 => 'CSSD',
      27 => 'D.O.',
      28 => 'DPM',
      29 => 'DPT',
      30 => 'Ed.D.',
      31 => 'Ed.S.',
      32 => 'FAAP',
      33 => 'FACC',
      34 => 'FCCP',
      35 => 'FACOG',
      36 => 'FNP',
      37 => 'FNP-C',
      38 => 'IBCLC',
      39 => 'L.E.',
      40 => 'LCSW',
      41 => 'M.A.',
      42 => 'M.D.',
      43 => 'M.S.',
      44 => 'MFT',
      45 => 'MHS',
      46 => 'MMS',
      47 => 'MPA',
      48 => 'MPH',
      49 => 'MPT',
      50 => 'MSPAS',
      51 => 'MSPT',
      52 => 'MSW',
      53 => 'N.P.',
      54 => 'NP-C',
      55 => 'O.D.',
      56 => 'OCN',
      57 => 'OCS',
      58 => 'OTR',
      59 => 'P.A.',
      60 => 'PA-C',
      61 => 'P.T.',
      62 => 'Ph.D.',
      63 => 'PHN',
      64 => 'Psy D',
      65 => 'R.D.',
      66 => 'R.N.',
      67 => 'RCP',
      68 => 'RNC',
      69 => 'RNFA',
      70 => 'SCS',
      71 => 'WHNP',
    ),
    'usage' => 
    array (
      0 => 'N/A',
      1 => 'No',
      2 => 'Sometimes',
      3 => 'Always',
    ),
    'password_requirements' => 'min:6',
    'admission_facility_type' => 
    array (
      'ac_inpatient' => 'AC Inpatient',
      'ac_observation' => 'AC Observation',
      'ac_op_partial_hosp' => 'AC OP Partial Hosp',
      'rehab_hospital' => 'Rehab Hospital',
      'ltac_snf' => 'LTAC- SNF',
      'mental_health_partial_hosp' => 'Mental Health Partial Hosp',
      'other' => 'Other',
    ),
    'admitted_form' => 
    array (
      'direct_admission' => 'Direct Admission',
      'through_ed' => 'Through ED',
      'readmit_thirty' => 'Re-admission w/in 30 days',
      'snf' => 'SNF',
      'mental_health_facility' => 'Mental Health Facility',
      'other' => 'Other-Not Qualified',
      'unknown' => 'Unknown',
    ),
    'discharged_to' => 
    array (
      'home' => 'Home',
      'family_member_home' => 'Family Member Home',
      'non_family_member_home' => 'Non-family member home',
      'assisted_living' => 'Assisted Living',
      'rest_foster_home' => 'Rest/Foster Home',
      'hospice' => 'Hospice- TCM is N/A',
      'snf' => 'SNF- TCM is N/A',
      'rehab' => 'Rehab- TCM N/A',
      'other' => 'Other-Not Qualified',
    ),
    'first_contact_attempt_method' => 
    array (
      0 => 'Telephone',
      1 => 'E-mail',
      2 => 'Face to Face',
    ),
    'second_contact_attempt_method' => 
    array (
      'telephone' => 'Telephone',
      'e_mail' => 'E-mail',
      'face_to_face' => 'Face to Face',
    ),
    'addl_contact_attempt_method' => 
    array (
      'telephone' => 'Telephone',
      'e_mail' => 'E-mail',
      'face_to_face' => 'Face to Face',
    ),
    'first_contact_attempt_successful' => 
    array (
      0 => 'Yes',
      1 => 'No',
    ),
    'second_contact_attempt_successful' => 
    array (
      0 => 'Yes',
      1 => 'No',
    ),
    'addl_contact_attempt_successful' => 
    array (
      0 => 'Yes',
      1 => 'No',
    ),
    'timely_initial_contact_outcome' => 
    array (
      0 => 'Completed',
      1 => 'Missed',
    ),
    'addl_timely_initial_contact_outcome' => 
    array (
      0 => 'Completed',
      1 => 'Missed',
    ),
    'med_recon_status' => 
    array (
      0 => 'In Progress',
      1 => 'Completed',
    ),
    'med_recon_discharge_medications_type' => 
    array (
      0 => 'New',
      1 => 'Existing',
    ),
    'med_recon_medication_changes_type' => 
    array (
      0 => 'Discontinued',
      1 => 'Discrepency',
    ),
    'billing_ending' => 
    array (
      0 => '99495 Moderate Complexity',
      1 => '99496 High Complexity',
      2 => '99495 Moderate Complexity (Telehealth)',
      3 => '99496 High Complexity (Telehealth)',
      4 => 'Unsuccessful TCM-Unable to Bill',
    ),
    'med_recon_compliance_issue_reason' => 
    array (
      0 => 'Ability to Obtain',
      1 => 'Cost',
      2 => 'Dose',
      3 => 'Inability to Consume',
      4 => 'Education/Understanding',
      5 => 'Ineffectiveness',
      6 => 'Intolerance',
      7 => 'Motivation',
      8 => 'Non-Compliance',
      9 => 'Side Effects',
      10 => 'Other',
    ),
    'section' => 
    array (
      'adl' => 
      array (
        0 => 'is_hearing_impaired',
        1 => 'can_see_clearly',
        2 => 'has_glasses_contacts',
        3 => 'is_living_alone',
        4 => 'has_caregiver',
        5 => 'cognitive_impairment',
        6 => 'handles_own_finances',
        7 => 'shops_independently',
      ),
      'caffeine' => 
      array (
        0 => 'caffeine_coffee',
        1 => 'caffeine_tea',
        2 => 'caffeine_cola',
      ),
      'childhood_illnesses' => 
      array (
        0 => 'measles',
        1 => 'mumps',
        2 => 'rubella',
        3 => 'chickenpox',
        4 => 'rheumatic_fever',
        5 => 'polio',
      ),
      'devices' => 
      array (
        0 => 'devices_pacemaker',
        1 => 'devices_defibrillator',
        2 => 'devices_port_a_cath',
        3 => 'devices_brain_stim',
        4 => 'devices_bladder_stim',
        5 => 'devices_other',
      ),
      'depression_medication' => 
      array (
        0 => 'depression_med_elavil',
        1 => 'depression_med_tofranil',
        2 => 'depression_med_cymbalta',
        3 => 'depression_med_anafranil',
        4 => 'depression_med_surmontil',
        5 => 'depression_med_zoloft',
        6 => 'depression_med_norpramin',
        7 => 'depression_med_celexa',
        8 => 'depression_med_paxil',
        9 => 'depression_med_sinequan',
        10 => 'depression_med_lexapro',
        11 => 'depression_med_effexor',
        12 => 'depression_med_prozac',
      ),
      'diagnosed_by_doctors' => 
      array (
        0 => 'diagnosed_arthritis',
        1 => 'diagnosed_asthma',
        2 => 'diagnosed_cancer_breast',
        3 => 'diagnosed_cancer_colon',
        4 => 'diagnosed_depression',
        5 => 'diagnosed_diabetes',
        6 => 'diagnosed_heart_attack',
        7 => 'diagnosed_high_cholesterol',
        8 => 'diagnosed_hypertension',
        9 => 'diagnosed_stroke',
        10 => 'diagnosed_congestive_heart_failure',
        11 => 'diagnosed_cancer_other',
      ),
      'family_history' => 
      array (
        0 => 'history_high_blood_pressure',
        1 => 'history_stroke',
        2 => 'history_heart_disease',
        3 => 'history_high_cholesterol',
        4 => 'history_diabetes',
        5 => 'history_glaucoma',
        6 => 'history_cancer',
        7 => 'history_alcoholism',
        8 => 'history_asthma_copd',
        9 => 'history_depression_suicide',
        10 => 'history_abdominal_aortic_aneurysm',
      ),
      'immunizations' => 
      array (
        0 => 'immunization_tetanus',
        1 => 'immunization_hepatitis',
        2 => 'immunization_influenza',
        3 => 'immunization_pneumonia',
        4 => 'immunization_varicella',
      ),
      'other_problems' => 
      array (
        0 => 'other_problems_skin',
        1 => 'other_problems_chest_heart',
        2 => 'other_problems_head_neck',
        3 => 'other_problems_back',
        4 => 'other_problems_ears',
        5 => 'other_problems_intestinal',
        6 => 'other_problems_nose',
        7 => 'other_problems_bladder',
        8 => 'other_problems_throat',
        9 => 'other_problems_bowel',
        10 => 'other_problems_lungs',
        11 => 'other_problems_circulation',
        12 => 'other_problems_recent_changes_weight',
        13 => 'other_problems_recent_changes_sleep',
        14 => 'other_problems_recent_changes_energy_level',
      ),
      'preventive_services' => 
      array (
        0 => 'recommend_abdom_aortic_screen',
        1 => 'recommend_alcohol_misuse_screen',
        2 => 'recommend_bone_mass_measurements',
        3 => 'recommend_cardio_disease_screen',
        4 => 'recommend_cardio_disease_bt',
        5 => 'recommend_cervical_cancer_screen',
        6 => 'recommend_colorectal_cancer_screen',
        7 => 'recommend_counsel_tobacco',
        8 => 'recommend_depression_screen',
        9 => 'recommend_diabetes_smt',
        10 => 'recommend_glaucoma_screen',
        11 => 'recommend_hep_c_screen',
        12 => 'recommend_hiv_screen',
        13 => 'recommend_lung_cancer_screen',
        14 => 'recommend_mammogram_screen',
        15 => 'recommend_nutrition_therapy',
        16 => 'recommend_obesity_screen',
        17 => 'recommend_medicare_visit',
        18 => 'recommend_prostate_cancer_screen',
        19 => 'recommend_std_screen',
        20 => 'recommend_flu_shots',
        21 => 'recommend_hep_b_shots',
        22 => 'recommend_pneumococcal_shots',
        23 => 'recommend_tobacco_screen',
        24 => 'recommend_yearly_wellness',
        25 => 'recommend_pelvic_exam',
      ),
      'routine_screenings' => 
      array (
        0 => 'routine_screening_mammography',
        1 => 'routine_screening_std',
        2 => 'routine_screening_prostate',
        3 => 'routine_screening_bone_density',
        4 => 'routine_screening_ultrasound',
        5 => 'routine_screening_cholesterol',
        6 => 'routine_screening_triglyceride',
        7 => 'routine_screening_hdl',
        8 => 'routine_screening_colonoscopy',
        9 => 'routine_screening_pap',
      ),
      'routine_screening_results' => 
      array (
        0 => 'routine_screening_triglyceride',
        1 => 'routine_screening_hdl',
        2 => 'routine_screening_cholesterol',
      ),
      'non_billable_outcomes' => 
      array (
        0 => 'outcome_greater_than_3_years_since_last_ov',
        1 => 'outcome_no_prior_office_visit',
        2 => 'outcome_initial_contact_not_timely',
        3 => 'outcome_medication_reconciliation_not_timely_or_completed',
        4 => 'outcome_face_to_face_not_completed',
        5 => 'outcome_face_to_face_not_completed_timely',
        6 => 'outcome_patient_expired_since_discharge',
        7 => 'outcome_admission_facility_type',
        8 => 'outcome_discharge_to_non_qualified_location',
        9 => 'outcome_no_discharge_instructions_available',
        10 => 'outcome_readmission_for_same_or_similar_condition_occurred',
      ),
      'face_to_face_status' => 
      array (
        0 => 'In Progress',
        1 => 'Completed',
      ),
      'face_to_face_notCompleted_reason' => 
      array (
        0 => 'Patient Refused',
        1 => 'Readmitted',
        2 => 'Missed Time Frame',
        3 => 'Deceased',
        4 => 'Transportation Issue',
        5 => 'Other',
      ),
      'home_health' => 
      array (
        'completed' => 'Completed',
        'in_progress' => 'In Progress',
      ),
    ),
  ),
  'hashing' => 
  array (
    'driver' => 'bcrypt',
  ),
  'init' => 
  array (
    'default_admin' => 
    array (
      'first_name' => 'John',
      'middle_name' => 'Default',
      'last_name' => 'Smith',
      'email' => 'admin@renova.com',
      'password' => 'secret',
      'title' => 'Administrator',
    ),
    'employee_titles' => 
    array (
      0 => 'Account Manager',
      1 => 'Administrator',
      2 => 'Care Manager',
      3 => 'Director',
      4 => 'Enroller',
      5 => 'Manager',
      6 => 'Scheduler',
      7 => 'Specialist',
      8 => 'Team Leader',
    ),
    'care_plans' => 
    array (
      0 => NULL,
      1 => NULL,
      2 => NULL,
      3 => NULL,
      4 => NULL,
      5 => NULL,
      6 => NULL,
      7 => NULL,
      8 => NULL,
      9 => NULL,
      10 => NULL,
      11 => NULL,
      12 => NULL,
      13 => NULL,
      14 => NULL,
      15 => NULL,
      16 => NULL,
      17 => NULL,
      18 => NULL,
      19 => NULL,
      20 => NULL,
      21 => NULL,
      22 => NULL,
      23 => NULL,
      24 => NULL,
      25 => NULL,
      26 => NULL,
      27 => NULL,
      28 => NULL,
      29 => NULL,
      30 => NULL,
      31 => NULL,
      32 => NULL,
    ),
  ),
  'logging' => 
  array (
    'default' => 'stack',
    'channels' => 
    array (
      'stack' => 
      array (
        'driver' => 'stack',
        'channels' => 
        array (
          0 => 'single',
        ),
      ),
      'activity' => 
      array (
        'driver' => 'single',
        'path' => '/home/michaelk/public_html/storage/logs/renova.log',
        'level' => 'debug',
      ),
      'single' => 
      array (
        'driver' => 'single',
        'path' => '/home/michaelk/public_html/storage/logs/laravel.log',
        'level' => 'debug',
      ),
      'daily' => 
      array (
        'driver' => 'daily',
        'path' => '/home/michaelk/public_html/storage/logs/laravel.log',
        'level' => 'debug',
        'days' => 7,
      ),
      'slack' => 
      array (
        'driver' => 'slack',
        'url' => NULL,
        'username' => 'Laravel Log',
        'emoji' => ':boom:',
        'level' => 'critical',
      ),
      'syslog' => 
      array (
        'driver' => 'syslog',
        'level' => 'debug',
      ),
      'errorlog' => 
      array (
        'driver' => 'errorlog',
        'level' => 'debug',
      ),
    ),
  ),
  'mail' => 
  array (
    'driver' => 'smtp',
    'host' => 'smtp.mailtrap.io',
    'port' => '2525',
    'from' => 
    array (
      'address' => NULL,
      'name' => NULL,
    ),
    'encryption' => NULL,
    'username' => NULL,
    'password' => NULL,
    'sendmail' => '/usr/sbin/sendmail -bs',
    'markdown' => 
    array (
      'theme' => 'default',
      'paths' => 
      array (
        0 => '/home/michaelk/public_html/resources/views/vendor/mail',
      ),
    ),
  ),
  'model' => 
  array (
    'mappings' => 
    array (
      'patient' => 
      array (
        'practice_physician_id' => 'physician_id',
      ),
      'questionnaire_billing_other' => 
      array (
        'value' => 'other_billing',
        'cpt' => 'cpt_other_billing',
      ),
      'questionnaire_caffeine' => 
      array (
        'none' => 'caffeine_none',
        'drinks_coffee' => 'caffeine_coffee',
        'drinks_tea' => 'caffeine_tea',
        'drinks_cola' => 'caffeine_cola',
        'coffee_cups_per_day' => 'caffeine_coffee_cups_per_day',
        'tea_cups_per_day' => 'caffeine_tea_cups_per_day',
        'cola_cups_per_day' => 'caffeine_cola_cups_per_day',
      ),
      'questionnaire_care_giver' => 
      array (
        'number' => 'phone',
      ),
      'questionnaire_form' => 
      array (
        'practice_physician_id' => 'physician_id',
        'cataract_glaucoma' => 'cataracts',
        'vision_exam' => 'last_vision_exam',
        'stairs_inside' => 'stairs_house',
        'stairs_inside_count' => 'stairs_house_n',
        'stairs_outside' => 'stairs_in_out',
        'stairs_outside_count' => 'stairs_in_out_n',
        'rug_mats' => 'rugs',
        'bathroom_bars' => 'grab_bars',
        'diet' => 'dieting',
        'night_sleep_hours' => 'sleep_hours',
        'alcohol' => 'drink_alcohol',
      ),
      'questionnaire_other_problem' => 
      array (
        'description' => 'value',
      ),
      'questionnaire_provider' => 
      array (
        'last_office_visit' => 'office_visit',
      ),
      'summary' => 
      array (
        'practice_physician_id' => 'physician_id',
      ),
      'summary_provider' => 
      array (
        'last_office_visit' => 'office_visit',
      ),
    ),
  ),
  'navbar' => 
  array (
    'registration' => 
    array (
      'route' => 'registration',
    ),
    'audit' => 
    array (
      'is_admin' => true,
      'route' => 'audit',
    ),
    'administration' => 
    array (
      'is_manager' => true,
      'is_admin' => true,
      'route' => 'administration',
    ),
  ),
  'queue' => 
  array (
    'default' => 'database',
    'connections' => 
    array (
      'sync' => 
      array (
        'driver' => 'sync',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'jobs',
        'queue' => 'default',
        'retry_after' => 90,
      ),
      'beanstalkd' => 
      array (
        'driver' => 'beanstalkd',
        'host' => 'localhost',
        'queue' => 'default',
        'retry_after' => 90,
      ),
      'sqs' => 
      array (
        'driver' => 'sqs',
        'key' => 'your-public-key',
        'secret' => 'your-secret-key',
        'prefix' => 'https://sqs.us-east-1.amazonaws.com/your-account-id',
        'queue' => 'your-queue-name',
        'region' => 'us-east-1',
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => NULL,
      ),
    ),
    'failed' => 
    array (
      'database' => 'mysql',
      'table' => 'failed_jobs',
    ),
  ),
  'reports' => 
  array (
    'immunizations' => 
    array (
      'flu' => 
      array (
        0 => 'practice_name',
        1 => 'patient_name',
        2 => 'physician_name',
        3 => 'dob',
        4 => 'influenza',
        5 => 'i_date',
      ),
      'pneumonia' => 
      array (
      ),
      'hepatitis_b' => 
      array (
      ),
      'varicella' => 
      array (
      ),
    ),
    'medication_usage' => 
    array (
    ),
    'disease_specific' => 
    array (
    ),
    'other_reports' => 
    array (
    ),
    'part_b_recommendations' => 
    array (
    ),
  ),
  'services' => 
  array (
    'mailgun' => 
    array (
      'domain' => NULL,
      'secret' => NULL,
    ),
    'ses' => 
    array (
      'key' => NULL,
      'secret' => NULL,
      'region' => 'us-east-1',
    ),
    'sparkpost' => 
    array (
      'secret' => NULL,
    ),
    'stripe' => 
    array (
      'model' => 'App\\User',
      'key' => NULL,
      'secret' => NULL,
    ),
  ),
  'session' => 
  array (
    'driver' => 'file',
    'lifetime' => '120',
    'expire_on_close' => false,
    'encrypt' => false,
    'files' => '/home/michaelk/public_html/storage/framework/sessions',
    'connection' => NULL,
    'table' => 'sessions',
    'store' => NULL,
    'lottery' => 
    array (
      0 => 2,
      1 => 100,
    ),
    'cookie' => 'renova_session',
    'path' => '/',
    'domain' => NULL,
    'secure' => false,
    'http_only' => true,
    'same_site' => NULL,
  ),
  'validation' => 
  array (
    'caffeine' => 
    array (
      '%s' => 'nullable|boolean',
      '%s_cups_per_day' => 'nullable|integer',
    ),
    'routine_screenings' => 
    array (
      '%s' => 'nullable|boolean',
      '%s_date' => 'nullable|date',
    ),
  ),
  'view' => 
  array (
    'paths' => 
    array (
      0 => '/home/michaelk/public_html/resources/views',
    ),
    'compiled' => '/home/michaelk/public_html/storage/framework/views',
  ),
  'trustedproxy' => 
  array (
    'proxies' => NULL,
    'headers' => 30,
  ),
  'tinker' => 
  array (
    'commands' => 
    array (
    ),
    'dont_alias' => 
    array (
    ),
  ),
);
