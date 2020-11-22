-- Authors: Benjamin Okwuwolu
--          Patrick Howell
--          Yonathan Feleke

CREATE TABLE 'assigned_patients' (
    'patient_id' int(10) NOT NULL,
    'employee_id'int(10) NOT NULL,
    PRIMARY KEY ('employee_id'),
    FOREIGN KEY ('patient_id') REFERENCES 'patients' ('id'),
    FOREIGN KEY ('employee_id') REFERENCES 'employees' ('id')
);

-- Creates the practice talbe
CREATE TABLE `practices` (
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `name` varchar(50) DEFAULT NULL,
    `number` varchar(45) DEFAULT NULL,
    `is_active` tinyint(1) NOT NULL,
    PRIMARY KEY (`id`)
);

-- Creates the patients talbe
CREATE TABLE `patients` (
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `date` date NOT NULL,
    `emr` varchar(10) NOT NULL,
    `practice_id` int(10) NOT NULL,
    `fname` varchar(35) NOT NULL,
    `mname` varchar(35) DEFAULT NULL,
    `lname` varchar(35) NOT NULL,
    `gender` tinyint(1) NOT NULL,
    `dob` date NOT NULL,
    `addr1` varchar(70) NOT NULL,
    `addr2` varchar(70) DEFAULT NULL,
    `city` varchar(35) NOT NULL,
    `state` varchar(35) NOT NULL,
    `zip` varchar(5) NOT NULL,
    `ethnicity` varchar(45) NOT NULL,
    `primary_phone` varchar(10) NOT NULL,
    `secondary_phone` varchar(10) DEFAULT NULL,
    `email` varchar(255) NOT NULL,
    `primary_insurance` VARCHAR(255) DEFAULT NULL,
    `primary_insurance_idnum` VARCHAR(50) DEFAULT NULL,
    `secondary_insurance` VARCHAR(255) DEFAULT NULL,
    `secondary_insurance_idnum` VARCHAR(50) DEFAULT NULL,
    `marital_status` VARCHAR(45) NOT NULL,
    `education` VARCHAR(45) NOT NULL,
    `occupation_status` TINYINT(1) NOT NULL,
    `occupation_desc` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `email_unique` (`email`),
    UNIQUE KEY `emr_unique` (`emr`),
    UNIQUE KEY `primary_phone_unique` (`primary_phone`),
    KEY `patients_practice_id` (`practice_id`),
    CONSTRAINT `patients_practice_id`
        FOREIGN KEY (`practice_id`)
        REFERENCES `practices` (`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

-- Creates the employees talbe
CREATE TABLE `employees` (
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `fname` varchar(35) NOT NULL,
    `mname` varchar(35) DEFAULT NULL,
    `lname` varchar(35) NOT NULL,
    `renova_id` varchar(10) NOT NULL,
    `title` varchar(10) DEFAULT NULL,
    PRIMARY KEY (`id`)
);

-- Creates the care plan templates talbe
CREATE TABLE `care_plan_templates` (
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `name` varchar(50) NOT NULL,
    `icd10` varchar(10) NOT NULL,
    `template` json DEFAULT NULL,
    PRIMARY KEY (`id`)
);

-- Creates the employee authorization talbe
CREATE TABLE `employee_auths` (
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `employee_id` int(10) NOT NULL,
    `username` varchar(20) NOT NULL,
    `password` char(60) NOT NULL,
    `is_admin` tinyint(1) NOT NULL,
    `is_active` tinyint(1) NOT NULL,
    PRIMARY KEY (`id`),
    KEY `employee_auths_employee_id` (`employee_id`),
    CONSTRAINT `employee_auths_employee_id`
        FOREIGN KEY (`employee_id`)
        REFERENCES `employees` (`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

-- Creates the employee practice talbe
CREATE TABLE `employee_practice` (
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `employee_id` int(10) NOT NULL,
    `practice_id` int(10) NOT NULL,
    PRIMARY KEY (`id`),
    KEY `employee_practice_practice` (`practice_id`),
    KEY `employee_practice_employee` (`employee_id`),
    CONSTRAINT `employee_practice_employee`
        FOREIGN KEY (`employee_id`)
        REFERENCES `employees` (`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    CONSTRAINT `employee_practice_practice`
        FOREIGN KEY (`practice_id`)
        REFERENCES `practices` (`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

-- Creates the questionnaire forms talbe
CREATE TABLE `questionnaire_forms` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `patient_id` int(10) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `fname` varchar(35)  DEFAULT NULL,
  `mname` varchar(35)  DEFAULT NULL,
  `lname` varchar(35)  DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `email` varchar(255)  DEFAULT NULL,
  `marital_status` varchar(10)  DEFAULT NULL,
  `primary_doctor` varchar(45)  DEFAULT NULL,
  `pd_number` varchar(45)  DEFAULT NULL,
  `pd_last_seen` date DEFAULT NULL,
  `education` varchar(45)  DEFAULT NULL,
  `military` tinyint(1) DEFAULT NULL,
  `occupation_status` tinyint(1) DEFAULT NULL,
  `occupation_desc` varchar(50)  DEFAULT NULL,
  `vital_height` varchar(5)  DEFAULT NULL,
  `vital_weight` smallint(4) DEFAULT NULL,
  `bmi` varchar(10)  DEFAULT NULL,
  `blood_pressure` varchar(30)  DEFAULT NULL,
  `vital_other` varchar(45)  DEFAULT NULL,
  `living_will` tinyint(1) DEFAULT NULL,
  `polst` tinyint(1) DEFAULT NULL,
  `poa` tinyint(1) DEFAULT NULL,
  `info_prep` tinyint(1) DEFAULT NULL,
  `measles` tinyint(1) DEFAULT NULL,
  `mumps` tinyint(1) DEFAULT NULL,
  `rubella` tinyint(1) DEFAULT NULL,
  `chickenpox` tinyint(1) DEFAULT NULL,
  `rheuma_fever` tinyint(1) DEFAULT NULL,
  `polio` tinyint(1) DEFAULT NULL,
  `tetanus` tinyint(1) DEFAULT NULL,
  `t_date` date DEFAULT NULL,
  `hepatitis` tinyint(1) DEFAULT NULL,
  `h_date` date DEFAULT NULL,
  `influenza` tinyint(1) DEFAULT NULL,
  `i_date` date DEFAULT NULL,
  `pneumonia` tinyint(1) DEFAULT NULL,
  `p_date` date DEFAULT NULL,
  `shingles` tinyint(1) DEFAULT NULL,
  `s_date` date DEFAULT NULL,
  `hearing_diff` tinyint(1) DEFAULT NULL,
  `hearing_aid` tinyint(1) DEFAULT NULL,
  `hearing_exam` date DEFAULT NULL,
  `see_clearly` tinyint(1) DEFAULT NULL,
  `glass_contact` tinyint(1) DEFAULT NULL,
  `cataract_glaucoma` tinyint(1) DEFAULT NULL,
  `vision_exam` date DEFAULT NULL,
  `stairs_inside` tinyint(1) DEFAULT NULL,
  `stairs_inside_count` int(10) DEFAULT NULL,
  `stairs_outside` tinyint(1) DEFAULT NULL,
  `stairs_outside_count` int(10) DEFAULT NULL,
  `rug_mats` tinyint(1) DEFAULT NULL,
  `pets` tinyint(1) DEFAULT NULL,
  `bathroom_bars` tinyint(1) DEFAULT NULL,
  `live_alone` tinyint(1) DEFAULT NULL,
  `caregiver` tinyint(1) DEFAULT NULL,
  `hurting_you` tinyint(1) DEFAULT NULL,
  `seatbelt` tinyint(1) DEFAULT NULL,
  `pharmacy_name` varchar(45)  DEFAULT NULL,
  `pharmacy_number` varchar(45)  DEFAULT NULL,
  `exercise` varchar(100)  DEFAULT NULL,
  `diet` tinyint(1) DEFAULT NULL,
  `typical_meal` varchar(45)  DEFAULT NULL,
  `salt_intake` char(3)  DEFAULT NULL,
  `fat_intake` char(3)  DEFAULT NULL,
  `sleep_apnea` char(3)  DEFAULT NULL,
  `cpap` tinyint(1) DEFAULT NULL,
  `prescribed_diet` tinyint(1) DEFAULT NULL,
  `night_sleep_hours` tinyint(1) DEFAULT NULL,
  `trouble_sleeping` tinyint(1) DEFAULT NULL,
  `nap_day` tinyint(1) DEFAULT NULL,
  `sleep_aid` tinyint(1) DEFAULT NULL,
  `caffeine_none` tinyint(1) DEFAULT NULL,
  `caffeine_cola` tinyint(1) DEFAULT NULL,
  `caffeine_tea` tinyint(1) DEFAULT NULL,
  `caffeine_coffee` tinyint(1) DEFAULT NULL,
  `caffeine_num_cups` smallint(2) DEFAULT NULL,
  `alcohol` tinyint(1) DEFAULT NULL,
  `alcohol_kind` varchar(45)  DEFAULT NULL,
  `alcohol_amount_week` smallint(100) DEFAULT NULL,
  `alcohol_concern` tinyint(1) DEFAULT NULL,
  `alcohol_consider_stop` tinyint(1) DEFAULT NULL,
  `alcohol_experience_blackout` tinyint(1) DEFAULT NULL,
  `alcohol_binge_drink` tinyint(1) DEFAULT NULL,
  `alcohol_drive_drink` tinyint(1) DEFAULT NULL,
  `tobacco` tinyint(1) DEFAULT NULL,
  `tobacco_cigarettes` tinyint(1) DEFAULT NULL,
  `tobacco_cig_pkt_day` smallint(100) DEFAULT NULL,
  `tobacco_chew` tinyint(1) DEFAULT NULL,
  `tobacco_chew_pkt_day` smallint(100) DEFAULT NULL,
  `tobacco_pipe` tinyint(1) DEFAULT NULL,
  `tobacco_pipe_pkt_day` smallint(100) DEFAULT NULL,
  `tobacco_cigar` tinyint(1) DEFAULT NULL,
  `tobacco_cigar_pkt_day` smallint(100) DEFAULT NULL,
  `tobacco_years` smallint(100) DEFAULT NULL,
  `tobacco_year_quit` char(4)  DEFAULT NULL,
  `tobacco_street_drugs` tinyint(1) DEFAULT NULL,
  `needle_drugs` tinyint(1) DEFAULT NULL,
  `ethnicity` varchar(45)  DEFAULT NULL,
  `cognitive_impairment` tinyint(1) DEFAULT NULL,
  `other_notes` mediumtext DEFAULT NULL,
  `depression_sad` varchar(75)  DEFAULT NULL,
  `depression_concentrating` varchar(75)  DEFAULT NULL,
  `depression_death` varchar(75)  DEFAULT NULL,
  `depression_guilt` varchar(75)  DEFAULT NULL,
  `depression_fatigue` varchar(75)  DEFAULT NULL,
  `depression_treatment` tinyint(1) DEFAULT NULL,
  `devices_pacemaker` tinyint(1) DEFAULT NULL,
  `devices_defibrillator` tinyint(1) DEFAULT NULL,
  `devices_port_a_cath` tinyint(1) DEFAULT NULL,
  `devices_brain_stimulator` tinyint(1) DEFAULT NULL,
  `devices_bladder_bowel_stimulator` tinyint(1) DEFAULT NULL,
  `diagnosed_arthritis` tinyint(1) DEFAULT NULL,
  `diagnosed_asthma` tinyint(1) DEFAULT NULL,
  `diagnosed_cancer_breast` tinyint(1) DEFAULT NULL,
  `depression_med_elavil` varchar(45)  DEFAULT NULL,
  `diagnosed_cancer_colon` tinyint(1) DEFAULT NULL,
  `diagnosed_depression` tinyint(1) DEFAULT NULL,
  `diagnosed_diabetes` tinyint(1) DEFAULT NULL,
  `diagnosed_heart_attack` tinyint(1) DEFAULT NULL,
  `diagnosed_high_cholesterol` tinyint(1) DEFAULT NULL,
  `diagnosed_hypertension` tinyint(1) DEFAULT NULL,
  `diagnosed_stroke` tinyint(1) DEFAULT NULL,
  `diagnosed_congestive_heart_failure` tinyint(1) DEFAULT NULL,
  `other_problems_skin` tinyint(1) DEFAULT NULL,
  `other_problems_head_neck` tinyint(1) DEFAULT NULL,
  `other_problems_ears` tinyint(1) DEFAULT NULL,
  `other_problems_chest_heart` tinyint(1) DEFAULT NULL,
  `other_problems_back` tinyint(1) DEFAULT NULL,
  `other_problems_intestinal` tinyint(1) DEFAULT NULL,
  `other_problems_recent_changes_weight` tinyint(1) DEFAULT NULL,
  `other_problems_recent_changes_energy_level` tinyint(1) DEFAULT NULL,
  `routine_screening_mammography` tinyint(1) DEFAULT NULL,
  `routine_screening_mammography_date` date DEFAULT NULL,
  `routine_screening_std` tinyint(1) DEFAULT NULL,
  `routine_screening_std_date` date DEFAULT NULL,
  `routine_screening_prostate` tinyint(1) DEFAULT NULL,
  `routine_screening_prostate_date` date DEFAULT NULL,
  `routine_screening_ultrasound` tinyint(1) DEFAULT NULL,
  `routine_screening_ultrasound_date` date DEFAULT NULL,
  `routine_screening_bone_density` tinyint(1) DEFAULT NULL,
  `routine_screening_bone_density_date` date DEFAULT NULL,
  `depression_med_anafranil` tinyint(1) DEFAULT NULL,
  `depression_med_norpramin` tinyint(1) DEFAULT NULL,
  `depression_med_sinequan` tinyint(1) DEFAULT NULL,
  `depression_med_tofranil` tinyint(1) DEFAULT NULL,
  `depression_med_surmontil` tinyint(1) DEFAULT NULL,
  `depression_med_celexa` tinyint(1) DEFAULT NULL,
  `depression_med_lexapro` tinyint(1) DEFAULT NULL,
  `depression_med_cymbalta` tinyint(1) DEFAULT NULL,
  `depression_med_zoloft` tinyint(1) DEFAULT NULL,
  `depression_med_paxil` tinyint(1) DEFAULT NULL,
  `depression_med_effexor` tinyint(1) DEFAULT NULL,
  `other_problems_bladder` tinyint(1) DEFAULT NULL,
  `other_problems_throat` tinyint(1) DEFAULT NULL,
  `other_problems_bowel` tinyint(1) DEFAULT NULL,
  `other_problems_circulation` tinyint(1) DEFAULT NULL,
  `other_problems_lungs` tinyint(1) DEFAULT NULL,
  `other_problems_nose` tinyint(1) DEFAULT NULL,
  `other_problems_recent_changes_sleep` tinyint(1) DEFAULT NULL,
  `recommend_abdom_aortic_screen` tinyint(1) DEFAULT NULL,
  `recommend_alcohol_misuse_screen` tinyint(1) DEFAULT NULL,
  `recommend_bone_mass_measurements` tinyint(1) DEFAULT NULL,
  `recommend_cardio_disease_screen` tinyint(1) DEFAULT NULL,
  `recommend_cardio_disease_bt` tinyint(1) DEFAULT NULL,
  `recommend_cervical_cancer_screen` tinyint(1) DEFAULT NULL,
  `recommend_colectoral_cancer_screen` tinyint(1) DEFAULT NULL,
  `recommend_counsel_tobacco` tinyint(1) DEFAULT NULL,
  `recommend_depression_screen` tinyint(1) DEFAULT NULL,
  `recommend_diabetes_smt` tinyint(1) DEFAULT NULL,
  `recommend_glaucoma_screen` tinyint(1) DEFAULT NULL,
  `recommend_hep_c_screen` tinyint(1) DEFAULT NULL,
  `recommend_hiv_screen` tinyint(1) DEFAULT NULL,
  `recommend_lung_cancer_screen` tinyint(1) DEFAULT NULL,
  `recommend_mammogram_screen` tinyint(1) DEFAULT NULL,
  `recommend_nutrition_therapy` tinyint(1) DEFAULT NULL,
  `recommend_obesity_screen` tinyint(1) DEFAULT NULL,
  `recommend_medicare_visit` tinyint(1) DEFAULT NULL,
  `recommend_prostate_cancer_screen` tinyint(1) DEFAULT NULL,
  `recommend_std_screen` tinyint(1) DEFAULT NULL,
  `recommend_flu_shots` tinyint(1) DEFAULT NULL,
  `recommend_hep_b_shots` tinyint(1) DEFAULT NULL,
  `recommend_pneumococcal_shots` tinyint(1) DEFAULT NULL,
  `recommend_tobacco_screen` tinyint(1) DEFAULT NULL,
  `recommend_yearly_wellness` tinyint(1) DEFAULT NULL,
  `high_blood_pressure` tinyint(1) DEFAULT NULL,
  `hbp_relationship` varchar(45)  DEFAULT NULL,
  `stroke` tinyint(1) DEFAULT NULL,
  `stroke_relationship` varchar(45)  DEFAULT NULL,
  `heart_disease` tinyint(1) DEFAULT NULL,
  `hd_relationship` varchar(45)  DEFAULT NULL,
  `high_cholesterol` tinyint(1) DEFAULT NULL,
  `hc_relationship` varchar(45)  DEFAULT NULL,
  `diabetes` tinyint(1) DEFAULT NULL,
  `diabetes_relationship` varchar(45)  DEFAULT NULL,
  `glaucoma` tinyint(1) DEFAULT NULL,
  `glaucoma_relationship` varchar(45)  DEFAULT NULL,
  `cancer` tinyint(1) DEFAULT NULL,
  `cancer_relationship` varchar(45)  DEFAULT NULL,
  `alcoholism` tinyint(1) DEFAULT NULL,
  `alcoholism_relationship` varchar(45)  DEFAULT NULL,
  `asthma` tinyint(1) DEFAULT NULL,
  `asthma_relationship` varchar(45)  DEFAULT NULL,
  `depression` tinyint(1) DEFAULT NULL,
  `depression_relationship` varchar(45)  DEFAULT NULL,
  `complete` tinyint(1)  NOT NULL,
  PRIMARY KEY (`id`),
  KEY `questionnaire_forms_patient` (`patient_id`),
  CONSTRAINT `questionnaire_forms_patient`
    FOREIGN KEY (`patient_id`)
    REFERENCES `patients` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

-- Creates the questionnaire allergies to medications talbe
-- This table is helper for the questionnaire form
CREATE TABLE `questionnaire_allergies_to_medications` (
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `questionnaire_form_id` int(10) DEFAULT NULL,
    `name_of_drug` varchar(255) DEFAULT NULL,
    `reaction` varchar(255) DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `allergies_to_medications_questionnaire_form` (`questionnaire_form_id`),
    CONSTRAINT `allergies_to_medications_questionnaire_form`
        FOREIGN KEY (`questionnaire_form_id`)
        REFERENCES `questionnaire_forms` (`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

-- Creates the questionnaire care givers talbe
-- This table is helper for the questionnaire form
CREATE TABLE `questionnaire_care_givers` (
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `questionnaire_form_id` int(10) NOT NULL,
    `name` varchar(45) DEFAULT NULL,
    `relationship` varchar(45) DEFAULT NULL,
    `number` varchar(45) DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `care_givers_questionnaire_form` (`questionnaire_form_id`),
    CONSTRAINT `care_givers_questionnaire_form`
        FOREIGN KEY (`questionnaire_form_id`)
        REFERENCES `questionnaire_forms` (`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

-- Creates the questionnaire billings talbe
-- This table is helper for the questionnaire form
CREATE TABLE `questionnaire_billings` (
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `questionnaire_form_id` int(10) NOT NULL,
    `employee_id` int(10) NOT NULL,
    `practice_id` int(10) NOT NULL,
    `e_signature` varchar(50) NOT NULL,
    `date` date NOT NULL,
    `fname` varchar(35) NOT NULL,
    `lname` varchar(35) NOT NULL,
    `dob` date NOT NULL,
    `careplan_development` tinyint(1) NOT NULL,
    PRIMARY KEY (`id`),
    KEY `billings_questionnaire_form` (`questionnaire_form_id`),
    CONSTRAINT `billings_questionnaire_form`
        FOREIGN KEY (`questionnaire_form_id`)
        REFERENCES `questionnaire_forms` (`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    KEY `questionnaire_billings_employee` (`employee_id`),
    CONSTRAINT `questionnaire_billings_employee`
        FOREIGN KEY (`employee_id`)
        REFERENCES `employees` (`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    KEY `questionnaire_billings_practice` (`practice_id`),
    CONSTRAINT `questionnaire_billings_practice`
        FOREIGN KEY (`practice_id`)
        REFERENCES `practices` (`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

-- Creates the questionnaire depression medications talbe
-- This table is helper for the questionnaire form
CREATE TABLE `questionnaire_depression_medications` (
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `questionnaire_form_id` int(10) DEFAULT NULL,
    `medication_used_or_taking` varchar(30) DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `depression_medications_questionnaire_form` (`questionnaire_form_id`),
    CONSTRAINT `depression_medications_questionnaire_form`
        FOREIGN KEY (`questionnaire_form_id`)
        REFERENCES `questionnaire_forms` (`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

-- Creates the questionnaire devices talbe
-- This table is helper for the questionnaire form
CREATE TABLE `questionnaire_devices` (
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `questionnaire_form_id` int(10) NOT NULL,
    `name` varchar(70) NOT NULL,
    PRIMARY KEY (`id`),
    KEY `devices_questionnaire_form` (`questionnaire_form_id`),
    CONSTRAINT `devices_questionnaire_form`
        FOREIGN KEY (`questionnaire_form_id`)
        REFERENCES `questionnaire_forms` (`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

-- Creates the questionnaire family histories talbe
-- This table is helper for the questionnaire form
CREATE TABLE `questionnaire_family_histories` (
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `questionnaire_form_id` int(10) DEFAULT NULL,
    `condition_name` varchar(70) DEFAULT NULL,
    `relationship` varchar(70) DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `family_histories_questionnaire_form` (`questionnaire_form_id`),
    CONSTRAINT `family_histories_questionnaire_form`
        FOREIGN KEY (`questionnaire_form_id`)
        REFERENCES `questionnaire_forms` (`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

-- Creates the questionnaire hospitilizations talbe
-- This table is helper for the questionnaire form
CREATE TABLE `questionnaire_hospitalizations` (
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `questionnaire_form_id` int(10) NOT NULL,
    `year` smallint(10) DEFAULT NULL,
    `reason` varchar(50) NOT NULL,
    `hospital` varchar(45) DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `hospitalizations_questionnaire_form` (`questionnaire_form_id`),
    CONSTRAINT `hospitalizations_questionnaire_form`
        FOREIGN KEY (`questionnaire_form_id`)
        REFERENCES `questionnaire_forms` (`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

-- Creates the questionnaire medical problems talbe
-- This table is helper for the questionnaire form
CREATE TABLE `questionnaire_medical_problems` (
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `questionnaire_form_id` int(10) NOT NULL,
    `name` varchar(255) NOT NULL,
    PRIMARY KEY (`id`),
    KEY `medical_problems_questionnaire_form` (`questionnaire_form_id`),
    CONSTRAINT `medical_problems_questionnaire_form`
        FOREIGN KEY (`questionnaire_form_id`)
        REFERENCES `questionnaire_forms` (`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

-- Creates the questionnaire medicare talbe
-- This table is helper for the questionnaire form
CREATE TABLE `questionnaire_medicare` (
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `questionnaire_form_id` int(10) DEFAULT NULL,
    `preventive_services` varchar(255) DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `medicaire_questionnaire_form` (`questionnaire_form_id`),
    CONSTRAINT `medicaire_questionnaire_form`
        FOREIGN KEY (`questionnaire_form_id`)
        REFERENCES `questionnaire_forms` (`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

-- Creates the questionnaire medication lists talbe
-- This table is helper for the questionnaire form
CREATE TABLE `questionnaire_medication_lists` (
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `questionnaire_form_id` int(10) DEFAULT NULL,
    `name_of_drug` varchar(50) NOT NULL,
    `strength` varchar(20) DEFAULT NULL,
    `frequency_taken` varchar(20) DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `medication_lists_questionnaire_form` (`questionnaire_form_id`),
    CONSTRAINT `medication_lists_questionnaire_form`
        FOREIGN KEY (`questionnaire_form_id`)
        REFERENCES `questionnaire_forms` (`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

-- Creates the questionnaire occupants talbe
-- This table is helper for the questionnaire form
CREATE TABLE `questionnaire_occupants` (
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `questionnaire_form_id` int(10) NOT NULL,
    `name` varchar(255) NOT NULL,
    PRIMARY KEY (`id`),
    KEY `occupants_questionnaire_form` (`questionnaire_form_id`),
    CONSTRAINT `occupants_questionnaire_form`
        FOREIGN KEY (`questionnaire_form_id`)
        REFERENCES `questionnaire_forms` (`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

-- Creates the questionnaire other problems talbe
-- This table is helper for the questionnaire form
CREATE TABLE `questionnaire_other_problems` (
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `questionnaire_form_id` int(10) NOT NULL,
    `description` varchar(255) DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `other_problems_questionnaire_form` (`questionnaire_form_id`),
    CONSTRAINT `other_problems_questionnaire_form`
        FOREIGN KEY (`questionnaire_form_id`)
        REFERENCES `questionnaire_forms` (`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

-- Creates the questionnaire providers talbe
-- This table is helper for the questionnaire form
CREATE TABLE `questionnaire_providers` (
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `questionnaire_form_id` int(10) NOT NULL,
    `name` varchar(45) DEFAULT NULL,
    `specialty` varchar(45) DEFAULT NULL,
    `number` varchar(45) DEFAULT NULL,
    `lastov` date DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `providers_questionnaire_form` (`questionnaire_form_id`),
    CONSTRAINT `providers_questionnaire_form`
        FOREIGN KEY (`questionnaire_form_id`)
        REFERENCES `questionnaire_forms` (`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

-- Creates the questionnaire referrals to programs talbe
-- This table is helper for the questionnaire form
CREATE TABLE `questionnaire_referral_to_programs` (
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `questionnaire_form_id` int(10) NOT NULL,
    `referral_program` varchar(50) NOT NULL,
    PRIMARY KEY (`id`),
    KEY `referral_to_programs_questionnaire_form` (`questionnaire_form_id`),
    CONSTRAINT `referral_to_programs_questionnaire_form`
        FOREIGN KEY (`questionnaire_form_id`)
        REFERENCES `questionnaire_forms` (`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

-- Creates the questionnaire revisions talbe
-- This table is helper for the questionnaire form
CREATE TABLE `questionnaire_revisions` (
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `questionnaire_id` int(10) NOT NULL,
    `renova_id` int(10) NOT NULL,
    `questionnaire_form_status` tinyint(1) NOT NULL,
    `questionnaire_date` date NOT NULL,
    PRIMARY KEY (`id`),
    KEY `revisions_renova_id` (`renova_id`),
    KEY `revisions_questionnaire_form` (`questionnaire_id`),
    CONSTRAINT `revisions_questionnaire_form`
        FOREIGN KEY (`questionnaire_id`)
        REFERENCES `questionnaire_forms` (`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    CONSTRAINT `revisions_renova_id`
        FOREIGN KEY (`renova_id`)
        REFERENCES `employees` (`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

-- Creates the questionnaire risk factors talbe
-- This table is helper for the questionnaire form
CREATE TABLE `questionnaire_risk_factors` (
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `questionnaire_form_id` int(10) DEFAULT NULL,
    `conditions_identified` varchar(50) NOT NULL,
    PRIMARY KEY (`id`),
    KEY `risk_factors_questionnaire_form` (`questionnaire_form_id`),
    CONSTRAINT `risk_factors_questionnaire_form`
        FOREIGN KEY (`questionnaire_form_id`)
        REFERENCES `questionnaire_forms` (`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

-- Creates the questionnaire routine screens talbe
-- This table is helper for the questionnaire form
CREATE TABLE `questionnaire_routine_screens` (
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `questionnaire_form_id` int(10) NOT NULL,
    `name` varchar(255) NOT NULL,
    `date` date DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `routine_screens_questionnaire_form` (`questionnaire_form_id`),
    CONSTRAINT `routine_screens_questionnaire_form`
        FOREIGN KEY (`questionnaire_form_id`)
        REFERENCES `questionnaire_forms` (`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

-- Creates the questionnaire suppliers talbe
-- This table is helper for the questionnaire form
CREATE TABLE `questionnaire_suppliers` (
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `questionnaire_form_id` int(10) NOT NULL,
    `name` varchar(45) NOT NULL,
    `device` varchar(45) NOT NULL,
    `number` varchar(45) NOT NULL,
    PRIMARY KEY (`id`),
    KEY `suppliers_questionnaire_form` (`questionnaire_form_id`),
    CONSTRAINT `suppliers_questionnaire_form`
        FOREIGN KEY (`questionnaire_form_id`)
        REFERENCES `questionnaire_forms` (`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

-- Creates the questionnaire surgeries talbe
-- This table is helper for the questionnaire form
CREATE TABLE `questionnaire_surgeries` (
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `questionnaire_form_id` int(10) NOT NULL,
    `year` smallint(10) DEFAULT NULL,
    `reason` varchar(255) NOT NULL,
    `hospital` varchar(70) NOT NULL,
    PRIMARY KEY (`id`),
    KEY `surgeries_questionnaire_form` (`questionnaire_form_id`),
    CONSTRAINT `surgeries_questionnaire_form`
        FOREIGN KEY (`questionnaire_form_id`)
        REFERENCES `questionnaire_forms` (`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);


-- Creates the summaries talbe
CREATE TABLE `summaries` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `employee_id` int(10) NOT NULL,
  `initial_flag` tinyint(1) DEFAULT NULL,
  `patient_id` int(10) NOT NULL,
  `emr` varchar(10) NOT NULL,
  `practice_id` int(10) NOT NULL,
  `fname` varchar(35) NOT NULL,
  `mname` varchar(35) DEFAULT NULL,
  `lname` varchar(35) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `dob` date NOT NULL,
  `addr1` varchar(70) NOT NULL,
  `addr2` varchar(70) DEFAULT NULL,
  `city` varchar(35) NOT NULL,
  `state` varchar(35) NOT NULL,
  `zip` varchar(5) NOT NULL,
  `ethnicity` varchar(45) NOT NULL,
  `primary_phone` varchar(10) NOT NULL,
  `secondary_phone` varchar(10) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `primary_insurance` VARCHAR(255) DEFAULT NULL,
  `primary_insurance_idnum` VARCHAR(50) DEFAULT NULL,
  `secondary_insurance` VARCHAR(255) DEFAULT NULL,
  `secondary_insurance_idnum` VARCHAR(50) DEFAULT NULL,
  `marital_status` VARCHAR(45) NOT NULL,
  `education` VARCHAR(45) NOT NULL,
  `occupation_status` TINYINT(1) NOT NULL,
  `occupation_desc` VARCHAR(255) NOT NULL,
  `bmi` varchar(10) DEFAULT NULL,
  `blood_pressure` varchar(45) DEFAULT NULL,
  `healthcare_directive` tinyint(1) DEFAULT NULL,
  `life_sustain` tinyint(1) DEFAULT NULL,
  `poa` tinyint(1) DEFAULT NULL,
  `prep_info` tinyint(1) DEFAULT NULL,
  `lives_alone` tinyint(1) DEFAULT NULL,
  `hearing_impaired` tinyint(1) DEFAULT NULL,
  `see_clearly` tinyint(1) DEFAULT NULL,
  `glasses_contacts` tinyint(1) DEFAULT NULL,
  `caregiver` tinyint(1) DEFAULT NULL,
  `cognitive_impaired` tinyint(1) DEFAULT NULL,
  `recommend_abdom_aortic_screen` tinyint(1) DEFAULT NULL,
  `recommend_alcohol_misuse_screen` tinyint(1) DEFAULT NULL,
  `recommend_bone_mass_measurements` tinyint(1) DEFAULT NULL,
  `recommend_cardio_disease_screen` tinyint(1) DEFAULT NULL,
  `recommend_cardio_disease_bt` tinyint(1) DEFAULT NULL,
  `recommend_cervical_cancer_screen` tinyint(1) DEFAULT NULL,
  `recommend_colectoral_cancer_screen` tinyint(1) DEFAULT NULL,
  `recommend_counsel_tobacco` tinyint(1) DEFAULT NULL,
  `recommend_depression_screen` tinyint(1) DEFAULT NULL,
  `recommend_diabetes_smt` tinyint(1) DEFAULT NULL,
  `recommend_glaucoma_screen` tinyint(1) DEFAULT NULL,
  `recommend_hep_c_screen` tinyint(1) DEFAULT NULL,
  `recommend_hiv_screen` tinyint(1) DEFAULT NULL,
  `recommend_lung_cancer_screen` tinyint(1) DEFAULT NULL,
  `recommend_mammogram_screen` tinyint(1) DEFAULT NULL,
  `recommend_nutrition_therapy` tinyint(1) DEFAULT NULL,
  `recommend_obesity_screen` tinyint(1) DEFAULT NULL,
  `recommend_medicare_visit` tinyint(1) DEFAULT NULL,
  `recommend_prostate_cancer_screen` tinyint(1) DEFAULT NULL,
  `recommend_std_screen` tinyint(1) DEFAULT NULL,
  `recommend_flu_shots` tinyint(1) DEFAULT NULL,
  `recommend_hep_b_shots` tinyint(1) DEFAULT NULL,
  `recommend_pneumococcal_shots` tinyint(1) DEFAULT NULL,
  `recommend_tobacco_screen` tinyint(1) DEFAULT NULL,
  `recommend_yearly_wellness` tinyint(1) DEFAULT NULL,
  `psych_transportation` tinyint(1) DEFAULT NULL,
  `psych_transportation_desc` varchar(45) DEFAULT NULL,
  `psych_personal_safety` tinyint(1) DEFAULT NULL,
  `psych_personal_safety_desc` varchar(45) DEFAULT NULL,
  `psych_housing` tinyint(1) DEFAULT NULL,
  `psych_housing_desc` varchar(45) DEFAULT NULL,
  `psych_caregiver` tinyint(1) DEFAULT NULL,
  `psych_caregiver_desc` varchar(45) DEFAULT NULL,
  `psych_adls` tinyint(1) DEFAULT NULL,
  `psych_adls_desc` varchar(45) DEFAULT NULL,
  `psych_nutrition` tinyint(1) DEFAULT NULL,
  `psych_nutrition_desc` varchar(45) DEFAULT NULL,
  `psych_other` varchar(45) DEFAULT NULL,
  `date_last_completed` date NOT NULL,
  `complete` tinyint(1) NOT NULL,
  `other_notes` mediumtext DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `summaries_patient` (`patient_id`),
  CONSTRAINT `summaries_patient`
    FOREIGN KEY (`patient_id`)
    REFERENCES `patients` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  KEY `summaries_employee` (`employee_id`),
  CONSTRAINT `summaries_employee`
    FOREIGN KEY (`employee_id`)
    REFERENCES `employees` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

-- Creates the summaries medication lists talbe
-- This table is helper for summaries form
CREATE TABLE `summary_medication_lists` (
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `summary_id` int(10) NOT NULL,
    `name_of_drug` varchar(50) NOT NULL,
    `strength` varchar(20) DEFAULT NULL,
    `frequency_taken` varchar(20) DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `medication_lists_summary` (`summary_id`),
    CONSTRAINT `medication_lists_summary`
        FOREIGN KEY (`summary_id`)
        REFERENCES `summaries` (`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

-- Creates the summaries allergies talbe
-- This table is helper for summaries form
CREATE TABLE `summary_allergies` (
      `id` int(10) NOT NULL AUTO_INCREMENT,
      `summary_id` int(10) NOT NULL,
      `drug_name` varchar(45) DEFAULT NULL,
      `drug_reaction` varchar(45) DEFAULT NULL,
      PRIMARY KEY (`id`),
      KEY `allergies_summary` (`summary_id`),
      CONSTRAINT `allergies_summary`
        FOREIGN KEY (`summary_id`)
        REFERENCES `summaries` (`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

-- Creates the summaries care plans talbe
-- This table is helper for summaries form
CREATE TABLE `summary_care_plans` (
      `id` int(10) NOT NULL AUTO_INCREMENT,
      `care_plan_templates_id` int(10) NOT NULL,
      `summary_id` int(10) NOT NULL,
      `date` DATE NOT NULL,
      `icd10` varchar(10) NOT NULL,
      `care_plan` json DEFAULT NULL,
      PRIMARY KEY (`id`),
      KEY `care_plans_template` (`care_plan_templates_id`),
      KEY `care_plans_summary` (`summary_id`),
      CONSTRAINT `care_plans_template`
        FOREIGN KEY (`care_plan_templates_id`)
        REFERENCES `care_plan_templates` (`id`),
      CONSTRAINT `care_plans_summary`
        FOREIGN KEY (`summary_id`)
        REFERENCES `summaries` (`id`)
);

-- Creates the summaries conditions talbe
-- This table is helper for summaries form
CREATE TABLE `summary_conditions` (
      `id` int(10) NOT NULL AUTO_INCREMENT,
      `summary_id` int(10) NOT NULL,
      `date` date NOT NULL,
      `icd10_number` varchar(10) NOT NULL,
      `cond_description` varchar(100) DEFAULT NULL,
      PRIMARY KEY (`id`),
      KEY `conditions_summary` (`summary_id`),
      CONSTRAINT `conditions_summary`
        FOREIGN KEY (`summary_id`)
        REFERENCES `summaries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Creates the summaries providers talbe
-- This table is helper for summaries form
CREATE TABLE `summary_providers` (
      `id` int(10) NOT NULL AUTO_INCREMENT,
      `summary_id` int(10) NOT NULL,
      `name` varchar(45) DEFAULT NULL,
      `specialty` varchar(45) DEFAULT NULL,
      `number` varchar(45) DEFAULT NULL,
      `lastov` date DEFAULT NULL,
      PRIMARY KEY (`id`),
      KEY `providers_summary` (`summary_id`),
      CONSTRAINT `providers_summary`
        FOREIGN KEY (`summary_id`)
        REFERENCES `summaries` (`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

-- Creates the summaries referrals talbe
-- This table is helper for summaries form
CREATE TABLE `summary_referrals` (
      `id` int(10) NOT NULL AUTO_INCREMENT,
      `summary_id` int(10) NOT NULL,
      `referrals` varchar(45) DEFAULT NULL,
      PRIMARY KEY (`id`),
      KEY `referrals_summary` (`summary_id`),
      CONSTRAINT `referrals_summary`
        FOREIGN KEY (`summary_id`)
        REFERENCES `summaries` (`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

-- Creates the summaries risk factors talbe
-- This table is helper for summaries form
CREATE TABLE `summary_risk_factors` (
      `id` int(10) NOT NULL AUTO_INCREMENT,
      `summary_id` int(10) NOT NULL,
      `risk_factor` varchar(45) DEFAULT NULL,
      PRIMARY KEY (`id`),
      KEY `risk_factors_summary` (`summary_id`),
      CONSTRAINT `risk_factors_summary`
        FOREIGN KEY (`summary_id`)
        REFERENCES `summaries` (`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

-- Creates the summaries recommendations talbe
-- This table is helper for summaries form
CREATE TABLE `summary_recommendations` (
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `summary_id` int(10) NOT NULL,
    `recommendations` varchar(45) DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `recommendations_summary` (`summary_id`),
    CONSTRAINT `recommendations_summary`
        FOREIGN KEY (`summary_id`)
        REFERENCES `summaries` (`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

-- If the patient information gets updated while filling out
-- the questionnaire form, these triggers will update the patient
-- information in the patients table.
DELIMITER $$;
CREATE TRIGGER `after_update_questionnaire_form`
	AFTER UPDATE ON `questionnaire_forms`
	FOR EACH ROW
	BEGIN
		IF new.complete = 1
		THEN
			UPDATE patients p
			SET p.fname = new.fname,
	            p.lname = new.lname,
	            p.mname = new.mname,
	            p.gender = new.gender,
	            p.dob = new.dob,
	            p.email = new.email,
	            p.marital_status = new.marital_status,
	            p.education = new.education,
	            p.occupation_status = new.occupation_status,
	            p.occupation_desc = new.occupation_desc,
	            p.ethnicity = new.ethnicity
			WHERE id in (new.patient_id);
		END IF;
	END$$;
DELIMITER ;


DELIMITER $$;
CREATE TRIGGER `after_insert_questionnaire_form`
	AFTER INSERT ON `questionnaire_forms`
	FOR EACH ROW
	BEGIN
		IF new.complete = 1
		THEN
			UPDATE patients p
			SET p.fname = new.fname,
	            p.lname = new.lname,
	            p.mname = new.mname,
	            p.gender = new.gender,
	            p.dob = new.dob,
	            p.email = new.email,
	            p.marital_status = new.marital_status,
	            p.education = new.education,
	            p.occupation_status = new.occupation_status,
	            p.occupation_desc = new.occupation_desc,
	            p.ethnicity = new.ethnicity
			WHERE id in (new.patient_id);
		END IF;
	END$$;
DELIMITER ;


-- If the patient information is updated in the summary form
-- these two triggers will update patient's information in the
-- patients table.
DELIMITER $$;
CREATE TRIGGER `after_update_summary`
	AFTER UPDATE ON `summaries`
	FOR EACH ROW
	BEGIN
		IF new.complete = 1
		THEN
			UPDATE patients p
			SET p.fname = new.fname,
	            p.lname = new.lname,
	            p.mname = new.mname,
	            p.gender = new.gender,
	            p.dob = new.dob,
                p.addr1 = new.addr1,
                p.addr2 = new.addr2,
                p.city = new.city,
                p.state = new.state,
                p.zip = new.zip,
                p.ethnicity = new.ethnicity,
                p.primary_phone = new.primary_phone,
                p.secondary_phone = new.secondary_phone,
	            p.email = new.email,
                p.primary_insurance = new.primary_insurance,
                p.primary_insurance_idnum = new.primary_insurance_idnum,
                p.secondary_insurance = new.secondary_insurance,
                p.secondary_insurance_idnum = new.secondary_insurance_idnum,
	            p.marital_status = new.marital_status,
	            p.education = new.education,
	            p.occupation_status = new.occupation_status,
	            p.occupation_desc = new.occupation_desc
			WHERE id in (new.patient_id);
		END IF;
	END$$;
DELIMITER ;


DELIMITER $$;
CREATE TRIGGER `after_insert_summary`
	AFTER INSERT ON `summaries`
	FOR EACH ROW
	BEGIN
		IF new.complete = 1
		THEN
			UPDATE patients p
            SET p.fname = new.fname,
                p.lname = new.lname,
                p.mname = new.mname,
                p.gender = new.gender,
                p.dob = new.dob,
                p.addr1 = new.addr1,
                p.addr2 = new.addr2,
                p.city = new.city,
                p.state = new.state,
                p.zip = new.zip,
                p.ethnicity = new.ethnicity,
                p.primary_phone = new.primary_phone,
                p.secondary_phone = new.secondary_phone,
                p.email = new.email,
                p.primary_insurance = new.primary_insurance,
                p.primary_insurance_idnum = new.primary_insurance_idnum,
                p.secondary_insurance = new.secondary_insurance,
                p.secondary_insurance_idnum = new.secondary_insurance_idnum,
                p.marital_status = new.marital_status,
                p.education = new.education,
                p.occupation_status = new.occupation_status,
                p.occupation_desc = new.occupation_desc
			WHERE id in (new.patient_id);
		END IF;
	END$$;
DELIMITER ;



insert into employees (fname,
                       lname,
                       renova_id,
                       title)
values (admin,
        admin,
        0000000000,
        admin);

insert into employee_auths (employee_id,
                            username,
                            password,
                            is_admin,
                            is_active)
values (0,
        admin,
        '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
        1,
        1);
