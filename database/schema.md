# Renova Database Schema

********************************************

## patients
| Attributes Name | Type         | Null | Key | Default | Extra          |
|-----------------|--------------|------|-----|---------|----------------|
| id              | INT(10)      | NO   | PRI | NULL    | auto_increment |
| practice_id     | INT(10)      | YES  | MUL | NULL    |                |
| fname           | VARCHAR(35)  | NO   |     | NULL    |                |
| mname           | VARCHAR(35)  | YES  |     | NULL    |                |
| lname           | VARCHAR(35)  | NO   |     | NULL    |                |
| gender          | TINYINT(1)   | NO   |     | NULL    |                |
| bday            | date         | NO   |     | NULL    |                |
| addr1           | VARCHAR(70)  | NO   |     | NULL    |                |
| addr2           | VARCHAR(70)  | YES  |     | NULL    |                |
| city            | VARCHAR(35)  | NO   |     | NULL    |                |
| state           | VARCHAR(35)  | NO   |     | NULL    |                |
| zip             | VARCHAR(5)   | NO   |     | NULL    |                |
| ethnicity       | VARCHAR(45)  | YES  | MUL | NULL    |                |
| primary_phone   | VARCHAR(10)  | NO   | UNI | NULL    |                |
| secondary_phone | VARCHAR(10)  | YES  |     | NULL    |                |
| email           | VARCHAR(255) | NO   | UNI | NULL    |                |
| emr             | VARCHAR(10)  | NO   | UNI | NULL    |                |

********************************************

## practices
| Attributes Name | Type  | Null | Key | Default | Extra          |
|-----------|-------------|------|-----|---------|----------------|
| id        | INT(10)     | NO   | PRI | NULL    | auto_increment |
| name      | VARCHAR(50) | YES  |     | NULL    |                |
| number    | VARCHAR(45) | YES  |     | NULL    |                |
| is_active | TINYINT(1)  | NO   |     | NULL    |                |

********************************************

## employees
| Field     | Type        | Null | Key | Default | Extra          |
|-----------|-------------|------|-----|---------|----------------|
| id        | INT(10)     | NO   | PRI | NULL    | auto_increment |
| fname     | VARCHAR(35) | NO   |     | NULL    |                |
| mname     | VARCHAR(35) | YES  |     | NULL    |                |
| lname     | VARCHAR(35) | NO   |     | NULL    |                |
| renova_id | VARCHAR(10) | NO   |     | NULL    |                |
| title     | VARCHAR(10) | YES  |     | NULL    |                ||

********************************************

## employee_practices
| Field       | Type    | Null | Key | Default | Extra          |
|-------------|---------|------|-----|---------|----------------|
| id          | INT(10) | NO   | PRI | NULL    | auto_increment |
| employee_id | INT(10) | NO   | MUL | NULL    |                |
| practice_id | INT(10) | NO   | MUL | NULL    |                |

********************************************

## employee_auths
| Field       | Type        | Null | Key | Default | Extra          |
|-------------|-------------|------|-----|---------|----------------|
| id          | INT(10)     | NO   | PRI | NULL    | auto_increment |
| employee_id | INT(10)     | NO   | MUL | NULL    |                |
| username    | VARCHAR(20) | NO   |     | NULL    |                |
| password    | CHAR(60)    | NO   |     | NULL    |                |
| is_admin    | TINYINT(1)  | NO   |     | NULL    |                |
| is_active   | TINYINT(1)  | NO   |     | NULL    |                |

********************************************

## summaries

| Attributes               | Type        | Null | Key | Default | Extra |
|----------------------|-------------|------|-----|---------|-------|
| id                   | INT(10)     | NO   | PRI | NULL    |       |
| patient_id           | INT(10)     | NO   | MUL | NULL    |       |
| initial_flag         | TINYINT(1)  | YES  |     | NULL    |       |
| date                 | DATE        | NO   |     | NULL    |       |
| education            | VARCHAR(45) | YES  |     | NULL    |       |
| occupation           | VARCHAR(45) | YES  |     | NULL    |       |
| marital_status       | VARCHAR(10) | YES  |     | NULL    |       |
| bmi                  | VARCHAR(10) | YES  |     | NULL    |       |
| blood_pressure       | VARCHAR(45) | YES  |     | NULL    |       |
| healthcare_directive | TINYINT(1)  | YES  |     | NULL    |       |
| life_sustain         | TINYINT(1)  | YES  |     | NULL    |       |
| poa                  | TINYINT(1)  | YES  |     | NULL    |       |
| prep_info            | TINYINT(1)  | YES  |     | NULL    |       |
| lives_alone          | TINYINT(1)  | YES  |     | NULL    |       |
| hearing_impaired     | TINYINT(1)  | YES  |     | NULL    |       |
| see_clearly          | TINYINT(1)  | YES  |     | NULL    |       |
| glasses_contacts     | TINYINT(1)  | YES  |     | NULL    |       |
| care_giver           | TINYINT(1)  | YES  |     | NULL    |       |
| cognitive_impaired   | TINYINT(1)  | YES  |     | NULL    |       |
| num_medications      | VARCHAR(10) | YES  |     | NULL    |       |
| employee_name        | VARCHAR(45) | YES  |     | NULL    |       |
| renova_id            | VARCHAR(10) | YES  |     | NULL    |       |
| esign                | VARCHAR(50) | YES  |     | NULL    |       |

********************************************

## summary_conditions

| Attributes          | Type         | Null | Key | Default | Extra |
|------------------|--------------|------|-----|---------|-------|
| id               | INT(10)      | NO   | PRI | NULL    |       |
| summary_id       | INT(10)      | NO   | MUL | NULL    |       |
| date             | date         | NO   |     | NULL    |       |
| icd10_number     | VARCHAR(10)  | NO   |     | NULL    |       |
| cond_description | VARCHAR(100) | YES  |     | NULL    |       |

********************************************

## summary_providers

| Attributes        | Type        | Null | Key | Default | Extra          |
|--------------|-------------|------|-----|---------|----------------|
| id           | INT(10)     | NO   | PRI | NULL    | auto_increment |
| summary_id   | INT(10)     | NO   | MUL | NULL    |                |
| p_name       | VARCHAR(45) | YES  |     | NULL    |                |
| p_speciality | VARCHAR(45) | YES  |     | NULL    |                |
| p_number     | VARCHAR(45) | YES  |     | NULL    |                |
| p_lastov     | DATE        | YES  |     | NULL    |                |

********************************************

## summary_allergies
| Attributes         | Type        | Null | Key | Default | Extra          |
|---------------|-------------|------|-----|---------|----------------|
| id            | INT(10)     | NO   | PRI | NULL    | auto_increment |
| summary_id    | INT(10)     | NO   | MUL | NULL    |                |
| drug_name     | VARCHAR(45) | YES  |     | NULL    |                |
| drug_reaction | VARCHAR(45) | YES  |     | NULL    |                |

********************************************

## summary_screenings

| Attributes           | Type        | Null | Key | Default | Extra |
|-----------------|-------------|------|-----|---------|-------|
| id              | INT(10)     | NO   | PRI | NULL    |       |
| summary_id      | INT(10)     | NO   | MUL | NULL    |       |
| recommendations | VARCHAR(45) | YES  |     | NULL    |       |

********************************************

## summary_recommendations
| Field           | Type        | Null | Key | Default | Extra          |
|-----------------|-------------|------|-----|---------|----------------|
| id              | INT(10)     | NO   | PRI | NULL    | auto_increment |
| summary_id      | INT(10)     | NO   | MUL | NULL    |                |
| recommendations | VARCHAR(45) | YES  |     | NULL    |                |

***********************************************

## summary_referrals
| Attribute     | Type        | Null | Key | Default | Extra          |
|------------|-------------|------|-----|---------|----------------|
| id         | INT(10)     | NO   | PRI | NULL    | auto_increment |
| summary_id | INT(10)     | NO   | MUL | NULL    |                |
| referrals  | VARCHAR(45) | YES  |     | NULL    |                ||

************************************

## summary_risk_factors
| Attribute     | Type     | Null | Key | Default | Extra          |
|------------|-------------|------|-----|---------|----------------|
| id         | INT(10)     | NO   | PRI | NULL    | auto_increment |
| summary_id | INT(10)     | NO   | MUL | NULL    |                |
| referrals  | VARCHAR(45) | YES  |     | NULL    |                ||

************************************

## summary_psych_issues
| Attributes      | Type        | Null | Key | Default | Extra |
|-----------------|-------------|------|-----|---------|-------|
| id              | INT(10)     | NO   | PRI | NULL    |       |
| summary_id      | INT(10)     | NO   | MUL | NULL    |       |
| psych_issues    | VARCHAR(45) | YES  |     | NULL    |       |
| transportation  | TINYINT(1)  | NO   |     | NULL    |       |
| personal_safety | TINYINT(1)  | NO   |     | NULL    |       |
| housing         | TINYINT(1)  | NO   |     | NULL    |       |
| care_giver      | TINYINT(1)  | NO   |     | NULL    |       |
| adl             | TINYINT(1)  | NO   |     | NULL    |       |
| nutrition       | TINYINT(1)  | NO   |     | NULL    |       ||

************************************

## summary_notes
| Attributes      | Type         | Null | Key | Default | Extra |
|------------|--------------|------|-----|---------|-------|
| id         | INT(10)      | NO   | PRI | NULL    |       |
| summary_id | INT(10)      | NO   | MUL | NULL    |       |
| note       | VARCHAR(255) | YES  |     | NULL    |       ||

********************************************

## iccm_forms
| Attributes                                          | Type          | Null | Key | Default | Extra          |
|-----------------------------------------------------|---------------|------|-----|---------|----------------|
| id                                                  | INT(10)       | NO   | PRI | NULL    | auto_increment |
| patient_id                                          | INT(10)       | NO   | MUL | NULL    |                |
| fname                                               | VARCHAR(35)   | YES  |     | NULL    |                |
| mname                                               | VARCHAR(35)   | YES  |     | NULL    |                |
| lname                                               | VARCHAR(35)   | YES  |     | NULL    |                |
| gender                                              | TINYINT(1)    | YES  |     | NULL    |                |
| dob                                                 | DATE          | YES  |     | NULL    |                |
| age                                                 | SMALLINT(3)   | YES  |     | NULL    |                |
| email                                               | VARCHAR(255)  | YES  |     | NULL    |                |
| marital_status                                      | VARCHAR(10)   | YES  |     | NULL    |                |
| primary_doctor                                      | VARCHAR(45)   | YES  |     | NULL    |                |
| pd_number                                           | VARCHAR(45)   | YES  |     | NULL    |                |
| pd_lastseen                                         | DATE          | YES  |     | NULL    |                |
| education                                           | VARCHAR(45)   | YES  |     | NULL    |                |
| military                                            | TINYINT(1)    | YES  |     | NULL    |                |
| occupation                                          | VARCHAR(50)   | YES  |     | NULL    |                |
| occupation_description                              | TINYINT(1)    | YES  |     | NULL    |                |
| vital_height                                        | VARCHAR(5)    | YES  |     | NULL    |                |
| vital_weight                                        | SMALLINT(4)   | YES  |     | NULL    |                |
| bmi                                                 | VARCHAR(10)   | YES  |     | NULL    |                |
| blood_pressure                                      | VARCHAR(30)   | YES  |     | NULL    |                |
| vital_other                                         | VARCHAR(45)   | YES  |     | NULL    |                |
| living_will                                         | TINYINT(1)    | YES  |     | NULL    |                |
| polst                                               | TINYINT(1)    | YES  |     | NULL    |                |
| poa                                                 | TINYINT(1)    | YES  |     | NULL    |                |
| info_prep                                           | TINYINT(1)    | YES  |     | NULL    |                |
| measles                                             | TINYINT(1)    | YES  |     | NULL    |                |
| mumps                                               | TINYINT(1)    | YES  |     | NULL    |                |
| rubella                                             | TINYINT(1)    | YES  |     | NULL    |                |
| chicken_pox                                         | TINYINT(1)    | YES  |     | NULL    |                |
| rheuma_fever                                        | TINYINT(1)    | YES  |     | NULL    |                |
| polio                                               | TINYINT(1)    | YES  |     | NULL    |                |
| tetanus                                             | TINYINT(1)    | YES  |     | NULL    |                |
| t_date                                              | DATE          | YES  |     | NULL    |                |
| hepatitis                                           | TINYINT(1)    | YES  |     | NULL    |                |
| h_date                                              | DATE          | YES  |     | NULL    |                |
| influenza                                           | TINYINT(1)    | YES  |     | NULL    |                |
| i_date                                              | DATE          | YES  |     | NULL    |                |
| pneumonia                                           | TINYINT(1)    | YES  |     | NULL    |                |
| p_date                                              | DATE          | YES  |     | NULL    |                |
| shingles                                            | TINYINT(1)    | YES  |     | NULL    |                |
| s_date                                              | DATE          | YES  |     | NULL    |                |
| hearing_diff                                        | TINYINT(1)    | YES  |     | NULL    |                |
| hearing_aid                                         | TINYINT(1)    | YES  |     | NULL    |                |
| hearing_exam                                        | DATE          | YES  |     | NULL    |                |
| see_clearly                                         | TINYINT(1)    | YES  |     | NULL    |                |
| glass_contact                                       | TINYINT(1)    | YES  |     | NULL    |                |
| cataract_glaucoma                                   | TINYINT(1)    | YES  |     | NULL    |                |
| vision_exam                                         | DATE          | YES  |     | NULL    |                |
| stairs_inside                                       | TINYINT(1)    | YES  |     | NULL    |                |
| stairs_inside_count                                 | SMALLINT(50)  | YES  |     | 0       |                |
| stairs_outside                                      | TINYINT(1)    | YES  |     | NULL    |                |
| stairs_outside_count                                | SMALLINT(50)  | YES  |     | 0       |                |
| rug_mats                                            | TINYINT(1)    | YES  |     | NULL    |                |
| pets                                                | TINYINT(1)    | YES  |     | NULL    |                |
| bathroom_bars                                       | TINYINT(1)    | YES  |     | NULL    |                |
| live_alone                                          | TINYINT(1)    | YES  |     | NULL    |                |
| caregiver                                           | TINYINT(1)    | YES  |     | NULL    |                |
| hurting_you                                         | TINYINT(1)    | YES  |     | NULL    |                |
| seatbelt                                            | TINYINT(1)    | YES  |     | NULL    |                |
| pharmacy_name                                       | VARCHAR(45)   | YES  |     | NULL    |                |
| pharmacy_number                                     | VARCHAR(45)   | YES  |     | NULL    |                |
| excercise                                           | VARCHAR(100)  | YES  |     | NULL    |                |
| diet                                                | TINYINT(1)    | YES  |     | NULL    |                |
| typical_meal                                        | VARCHAR(45)   | YES  |     | NULL    |                |
| salt_intake                                         | CHAR3)       | YES  |     | NULL    |                |
| fat_intake                                          | CHAR3)       | YES  |     | NULL    |                |
| sleep_apnea                                         | CHAR3)       | YES  |     | NULL    |                |
| prescribed_diet                                     | TINYINT(1)    | YES  |     | NULL    |                |
| night_sleep_hours                                   | TINYINT(2)    | YES  |     | NULL    |                |
| sleep_aid                                           | TINYINT(1)    | YES  |     | NULL    |                |
| caffeine_none                                       | TINYINT(1)    | YES  |     | NULL    |                |
| caffeine_cola                                       | TINYINT(1)    | YES  |     | NULL    |                |
| caffeine_tea                                        | TINYINT(1)    | YES  |     | NULL    |                |
| caffeine_coffee                                     | TINYINT(1)    | YES  |     | NULL    |                |
| alcohol                                             | TINYINT(1)    | YES  |     | NULL    |                |
| alcohol_kind                                        | VARCHAR(45)   | YES  |     | NULL    |                |
| alcohol_drink_per_wk                                | SMALLINT(100) | YES  |     | 0       |                |
| alcohol_concern                                     | TINYINT(1)    | YES  |     | NULL    |                |
| consider_stop_alcohol                               | TINYINT(1)    | YES  |     | NULL    |                |
| experience_blackout                                 | TINYINT(1)    | YES  |     | NULL    |                |
| binge_drink                                         | TINYINT(1)    | YES  |     | NULL    |                |
| drive_drink                                         | TINYINT(1)    | YES  |     | NULL    |                |
| tobacco                                             | TINYINT(1)    | YES  |     | NULL    |                |
| cigarettes                                          | TINYINT(1)    | YES  |     | NULL    |                |
| cig_pkt_day                                         | SMALLINT(100) | YES  |     | 0       |                |
| chew                                                | TINYINT(1)    | YES  |     | NULL    |                |
| chew_pkt_day                                        | SMALLINT(100) | YES  |     | 0       |                |
| pipe                                                | TINYINT(1)    | YES  |     | NULL    |                |
| pipe_pkt_day                                        | SMALLINT(100) | YES  |     | 0       |                |
| cigar                                               | TINYINT(1)    | YES  |     | NULL    |                |
| cigar_pkt_day                                       | SMALLINT(100) | YES  |     | 0       |                |
| cigar_years                                         | SMALLINT(100) | YES  |     | 0       |                |
| year_quit                                           | CHAR4)       | YES  |     | NULL    |                |
| street_drugs                                        | TINYINT(1)    | YES  |     | NULL    |                |
| needle_drugs                                        | TINYINT(1)    | YES  |     | NULL    |                |
| ethnicity                                           | VARCHAR(45)   | YES  |     | NULL    |                |
| cognitive_impairment                                | TINYINT(1)    | YES  |     | NULL    |                |
| other_notes                                         | mediumtext    | YES  |     | NULL    |                |
| caffeine_cups                                       | SMALLINT(100) | YES  |     | NULL    |                |
| depression_sad                                      | VARCHAR(75)   | YES  |     | NULL    |                |
| depression_concentrating                            | VARCHAR(75)   | YES  |     | NULL    |                |
| depression_death                                    | VARCHAR(75)   | YES  |     | NULL    |                |
| depression_guilt                                    | VARCHAR(75)   | YES  |     | NULL    |                |
| depression_fatigue                                  | VARCHAR(75)   | YES  |     | NULL    |                |
| depression_treatment                                | TINYINT(1)    | YES  |     | NULL    |                |
| devices_pacemaker                                   | TINYINT(1)        | YES  |     | NULL    |                |
| devices_defibrillator                               | TINYINT(1)        | YES  |     | NULL    |                |
| devices_port_a_cath                                 | TINYINT(1)        | YES  |     | NULL    |                |
| devices_brain_simulator                             | TINYINT(1)        | YES  |     | NULL    |                |
| device_bladder_bowel_simulator                      | TINYINT(1)        | YES  |     | NULL    |                |
| medical_problems_diagnosed_arthritis                | TINYINT(1)        | YES  |     | NULL    |                |
| medical_problems_diagnosed_asthma                   | TINYINT(1)        | YES  |     | NULL    |                |
| medical_problems_diagnosed_cancer_breast            | TINYINT(1)        | YES  |     | NULL    |                |
| medical_problems_diagnosed_cancer_colon             | TINYINT(1)        | YES  |     | NULL    |                |
| medical_problems_diagnosed_depression               | TINYINT(1)        | YES  |     | NULL    |                |
| medical_problems_diagnosed_diabetes                 | TINYINT(1)        | YES  |     | NULL    |                |
| medical_problems_diagnosed_heart_attack             | TINYINT(1)        | YES  |     | NULL    |                |
| medical_problems_diagnosed_high_cholesterol         | TINYINT(1)        | YES  |     | NULL    |                |
| medical_problems_diagnosed_hypertension             | TINYINT(1)        | YES  |     | NULL    |                |
| medical_problems_diagnosed_stroke                   | TINYINT(1)        | YES  |     | NULL    |                |
| medical_problems_diagnosed_congestive_heart_failure | TINYINT(1)        | YES  |     | NULL    |                |
| other_problems_skin                                 | TINYINT(1)        | YES  |     | NULL    |                |
| other_problems_head_neck                            | TINYINT(1)        | YES  |     | NULL    |                |
| iother_problems_ears                                | TINYINT(1)        | YES  |     | NULL    |                |
| other_problems_chest_heart                          | TINYINT(1)        | YES  |     | NULL    |                |
| other_problems_back                                 | TINYINT(1)        | YES  |     | NULL    |                |
| other_problems_intestinal                           | TINYINT(1)        | YES  |     | NULL    |                |
| other_problems_recent_changes_weight                | TINYINT(1)        | YES  |     | NULL    |                |
| other_problems_recent_changes_energy_level          | TINYINT(1)        | YES  |     | NULL    |                |
| routine_screening_mammography                      | TINYINT(1)        | YES  |     | NULL    |                |
| routine_screening_mammography_date                 | DATE          | YES  |     | NULL    |                |
| routine_screening_std                              | TINYINT(1)        | YES  |     | NULL    |                |
| routine_screening_std_date                         | DATE          | YES  |     | NULL    |                |
| routine_screening_prostate                         | TINYINT(1)        | YES  |     | NULL    |                |
| routine_screening_prostate_date                    | DATE          | YES  |     | NULL    |                |
| routine_screening_ultrasound                       | TINYINT(1)        | YES  |     | NULL    |                |
| routine_screening_ultrasound_date                  | DATE          | YES  |     | NULL    |                |
| routine_screening_bone_density                     | TINYINT(1)        | YES  |     | NULL    |                |
| routine_screening_bone_density_date                | DATE          | YES  |     | NULL    |                ||

********************************************

## iccm_occupants
| Attributes       | Type         | Null | Key | Default | Extra          |
|--------------|--------------|------|-----|---------|----------------|
| id           | INT(10)      | NO   | PRI | NULL    | auto_increment |
| iccm_form_id | INT(10)      | NO   | MUL | NULL    |                |
| name         | VARCHAR(255) | NO   |     | NULL    |                |

*******************************************
## iccm_devices
| Attributes     | Type        | Null | Key | Default | Extra          |
|--------------|-------------|------|-----|---------|----------------|
| id           | INT(10)     | NO   | PRI | NULL    | auto_increment |
| iccm_form_id | INT(10)     | NO   | MUL | NULL    |                |
| name         | VARCHAR(70) | NO   |     | NULL    |                |

*******************************************
## iccm_medical_problems
| Attributes      | Type         | Null | Key | Default | Extra          |
|--------------|--------------|------|-----|---------|----------------|
| id           | INT(10)      | NO   | PRI | NULL    | auto_increment |
| iccm_form_id | INT(10)      | NO   | MUL | NULL    |                |
| name         | VARCHAR(255) | NO   |     | NULL    |                |

******************************************
## iccm_other_problems
| Attributes        | Type         | Null | Key | Default | Extra |
|--------------|--------------|------|-----|---------|-------|
| id           | INT(10)      | NO   | PRI | NULL    |       |
| iccm_form_id | INT(10)      | NO   | MUL | NULL    |       |
| name         | VARCHAR(45)  | NO   |     | NULL    |       |
| description  | VARCHAR(255) | YES  |     | NULL    |       |

******************************************

## iccm_surgeries
| Attributes     | Type         | Null | Key | Default | Extra          |
|--------------|--------------|------|-----|---------|----------------|
| id           | INT(10)      | NO   | PRI | NULL    | auto_increment |
| iccm_form_id | INT(10)      | NO   | MUL | NULL    |                |
| year         | SMALLINT(10) | YES  |     | NULL    |                |
| reason       | VARCHAR(255) | NO   |     | NULL    |                |
| hospital     | VARCHAR(70)  | YES  |     | NULL    |                |

*****************************************
## iccm_hospitalizations
| Attributes       | Type         | Null | Key | Default | Extra          |
|--------------|--------------|------|-----|---------|----------------|
| id           | INT(10)      | NO   | PRI | NULL    | auto_increment |
| iccm_form_id | INT(10)      | NO   | MUL | NULL    |                |
| year         | SMALLINT(10) | YES  |     | NULL    |                |
| reason       | VARCHAR(50)  | YES  |     | NULL    |                |
| hospital     | VARCHAR(45)  | YES  |     | NULL    |                |

***************************************
## iccm_family_histories
| Attributes                   | Type        | Null | Key | Default | Extra          |
|-------------------------|-------------|------|-----|---------|----------------|
| id                      | INT(10)     | NO   | PRI | NULL    | auto_increment |
| iccm_form_id            | INT(10)     | NO   | MUL | NULL    |                |
| high_blood_pressure     | TINYINT(1)  | NO   |     | NULL    |                |
| hbp_relationship        | VARCHAR(45) | YES  |     | NULL    |                |
| stroke                  | TINYINT(1)  | NO   |     | NULL    |                |
| stroke_relationship     | VARCHAR(45) | YES  |     | NULL    |                |
| heart_disease           | TINYINT(1)  | NO   |     | NULL    |                |
| hd_relationship         | VARCHAR(45) | YES  |     | NULL    |                |
| high_cholesteral        | TINYINT(1)  | NO   |     | NULL    |                |
| hc_relationship         | VARCHAR(45) | YES  |     | NULL    |                |
| disease                 | TINYINT(1)  | NO   |     | NULL    |                |
| disease_relationship    | VARCHAR(45) | YES  |     | NULL    |                |
| glaucoma                | TINYINT(1)  | NO   |     | NULL    |                |
| glaucoma_relationship   | VARCHAR(45) | YES  |     | NULL    |                |
| cancer                  | TINYINT(1)  | NO   |     | NULL    |                |
| cancer_relationship     | VARCHAR(45) | YES  |     | NULL    |                |
| alcoholism              | TINYINT(1)  | NO   |     | NULL    |                |
| alcoholism_relationship | VARCHAR(45) | YES  |     | NULL    |                |
| asthma                  | TINYINT(1)  | NO   |     | NULL    |                |
| asthma_relationship     | VARCHAR(45) | YES  |     | NULL    |                |
| depression              | TINYINT(1)  | NO   |     | NULL    |                |
| depresson_relationship  | VARCHAR(45) | YES  |     | NULL    |                |

*********************************************

## iccm_providers
| Atrributes      | Type        | Null | Key | Default | Extra          |
|--------------|-------------|------|-----|---------|----------------|
| id           | INT(10)     | NO   | PRI | NULL    | auto_increment |
| iccm_form_id | INT(10)     | NO   | MUL | NULL    |                |
| name         | VARCHAR(45) | YES  |     | NULL    |                |
| specialty    | VARCHAR(45) | YES  |     | NULL    |                |
| number       | VARCHAR(45) | YES  |     | NULL    |                |
| lastov       | DATE        | YES  |     | NULL    |                |

*********************************************

## iccm_routine_screens
| Attributes        | Type         | Null | Key | Default | Extra          |
|--------------|--------------|------|-----|---------|----------------|
| id           | INT(10)      | NO   | PRI | NULL    | auto_increment |
| iccm_form_id | INT(10)      | NO   | MUL | NULL    |                |
| name         | VARCHAR(255) | YES  |     | NULL    |                |
| date         | DATE         | YES  |     | NULL    |                |
********************************************

## iccm_suppliers
| Attributes        | Type        | Null | Key | Default | Extra          |
|--------------|-------------|------|-----|---------|----------------|
| id           | INT(10)     | NO   | PRI | NULL    | auto_increment |
| iccm_form_id | INT(10)     | NO   | MUL | NULL    |                |
| name         | VARCHAR(45) | YES  |     | NULL    |                |
| device       | VARCHAR(45) | YES  |     | NULL    |                |
| number       | VARCHAR(45) | YES  |     | NULL    |                |

********************************************
## iccm_care_givers
| Attributes       | Type        | Null | Key | Default | Extra          |
|--------------|-------------|------|-----|---------|----------------|
| id           | INT(10)     | NO   | PRI | NULL    | auto_increment |
| iccm_form_id | INT(10)     | NO   | MUL | NULL    |                |
| name         | VARCHAR(45) | YES  |     | NULL    |                |
| relationship | VARCHAR(45) | YES  |     | NULL    |                |
| number       | VARCHAR(45) | YES  |     | NULL    |                |

*******************************************

## iccm_depression_medications
| Attributes                   | Type        | Null | Key | Default | Extra          |
|---------------------------|-------------|------|-----|---------|----------------|
| id                        | INT(10)     | NO   | PRI | NULL    | auto_increment |
| iccm_form_id              | INT(10)     | YES  | MUL | NULL    |                |
| medication_used_or_taking | VARCHAR(30) | YES  |     | NULL    |                |

******************************************

## iccm_medication_list
| Attributes       | Type        | Null | Key | Default | Extra          |
|-----------------|-------------|------|-----|---------|----------------|
| id              | INT(10)     | NO   | PRI | NULL    | auto_increment |
| iccm_form_id    | INT(10)     | YES  | MUL | NULL    |                |
| name_of_drug    | VARCHAR(50) | YES  |     | NULL    |                |
| strength        | VARCHAR(20) | YES  |     | NULL    |                |
| frequency_taken | VARCHAR(20) | YES  |     | NULL    |                |

*******************************************

## iccm_allergies_to_medications
| Attributes      | Type         | Null | Key | Default | Extra          |
|--------------|--------------|------|-----|---------|----------------|
| id           | INT(10)      | NO   | PRI | NULL    | auto_increment |
| iccm_form_id | INT(10)      | YES  | MUL | NULL    |                |
| name_of_drug | VARCHAR(255) | YES  |     | NULL    |                |
| reaction     | VARCHAR(255) | YES  |     | NULL    |                |

## iccm_medicare
| Attributes               | Type         | Null | Key | Default | Extra          |
|---------------------|--------------|------|-----|---------|----------------|
| id                  | INT(10)      | NO   | PRI | NULL    | auto_increment |
| iccm_form_id        | INT(10)      | YES  | MUL | NULL    |                |
| preventive_services | VARCHAR(255) | YES  |     | NULL    |                |

*****************************************
## iccm_referral_to_programs
| Attributes            | Type        | Null | Key | Default | Extra          |
|------------------|-------------|------|-----|---------|----------------|
| id               | INT(10)     | NO   | PRI | NULL    | auto_increment |
| iccm_form_id     | INT(10)     | YES  | MUL | NULL    |                |
| referral_program | VARCHAR(50) | YES  |     | NULL    |                |

****************************************

## iccm_risk_factors
| Attributes                 | Type        | Null | Key | Default | Extra          |
|-----------------------|-------------|------|-----|---------|----------------|
| id                    | INT(10)     | NO   | PRI | NULL    | auto_increment |
| iccm_form_id          | INT(10)     | YES  | MUL | NULL    |                |
| conditions_identified | VARCHAR(50) | YES  |     | NULL    |                |
***************************************
## care_plan_templates
| Attributes         | Type        | Null | Key | Default | Extra          |
|---------------|-------------|------|-----|---------|----------------|
| id            | INT(10)     | NO   | PRI | NULL    | auto_increment |
| template_name | VARCHAR(50) | NO   |     | NULL    |                |
| icd10         | VARCHAR(20) | NO   |     | NULL    |                |
| template      | JSON        | YES  |     | NULL    |                |

**************************************

## summary_care_plans
| Attributes               | Type    | Null | Key | Default | Extra          |
|------------------------|---------|------|-----|---------|----------------|
| id                     | INT(10) | NO   | PRI | NULL    | auto_increment |
| care_plan_templates_id | INT(10) | NO   | MUL | NULL    |                |
| summary_id             | INT(10) | NO   | MUL | NULL    |                |
| care_plan              | JSON    | YES  |     | NULL    |                |

****************************************
