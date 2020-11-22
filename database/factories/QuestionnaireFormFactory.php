<?php

use Faker\Generator as Faker;
use App\Models\QuestionnaireForm;
use Carbon\Carbon;

/*
   |--------------------------------------------------------------------------
   | Model Factories
   |--------------------------------------------------------------------------
   |
   | This directory should contain each of the model factory definitions for
   | your application. Factories provide a convenient way to generate new
   | model instances for testing / seeding your application's database.
   |
 */

function randomDate($faker)
{
    return new Carbon($faker->dateTimeInInterval('-30 years', '+ 0 days', Null)->format("Y-m-d"));
}

$factory->define(QuestionnaireForm::class, function (Faker $faker) {
    $height = random_int(42, 90);
    $weight = random_int(50, 700);

    $bloodPressure   = (bool) random_int(0, 1);
    $stroke          = (bool) random_int(0, 1);
    $heartDisease    = (bool) random_int(0, 1);
    $highCholesterol = (bool) random_int(0, 1);
    $diabetes        = (bool) random_int(0, 1);
    $glaucoma        = (bool) random_int(0, 1);
    $cancer          = (bool) random_int(0, 1);
    $alcoholism      = (bool) random_int(0, 1);
    $asthma          = (bool) random_int(0, 1);
    $depression      = (bool) random_int(0, 1);

    $mammography = (bool) random_int(0, 1);
    $std         = (bool) random_int(0, 1);
    $prostate    = (bool) random_int(0, 1);
    $boneDensity = (bool) random_int(0, 1);
    $ulrasound   = (bool) random_int(0, 1);

    $tetanus   = (bool) random_int(0, 1);
    $hepatitis = (bool) random_int(0, 1);
    $influenza = (bool) random_int(0, 1);
    $pneumonia = (bool) random_int(0, 1);
    $varicella = (bool) random_int(0, 1);

    $stairsInside  = (bool) random_int(0, 1);
    $stairsOutside = (bool) random_int(0, 1);

    $cigarettes = (bool) random_int(0, 1);
    $chew       = (bool) random_int(0, 1);
    $pipe       = (bool) random_int(0, 1);
    $cigar      = (bool) random_int(0, 1);

    $exercises = [
	"Sedentary (no exercise)",
	"Mild exercise (i.e. climb stairs, walk 3 blocks, golf, etc.)",
	"Occasional vigorous exercise (i.e. work or reacreation, less than 4x/week for 30 min.)",
	"Regular vigorous exercise (i.e. work or reaction 4x/week for at least 30 min.)"
    ];

    $scale = ["High", "Medium", "Low"];

    return array_merge([
		'pd_number'              => sprintf('(%03d) %03d-%04d', random_int(1, 999), random_int(1, 999), random_int(1, 9999)),
		'pd_last_seen'           => Carbon::createFromDate(random_int(0, 1) ? 2017 : 2018, random_int(0, 11), random_int(0, 27)),
		'military'               => (bool) random_int(0, 1),
		'vital_height'           => $height,
		'vital_weight'           => $weight,
		'bmi'                    => bmi($height, $weight),
		'blood_pressure'         => "120/90",
		'vital_other'            => "something",
		'living_will'            => (bool) random_int(0, 1),
		'polst'                  => (bool) random_int(0, 1),
		'poa'  => (bool) random_int(0, 1),
		'info_prep_requested'    => (bool) random_int(0, 1),

		// Personal Health History Page 1 ------------------------------------------------------
		'depression_med_elavil'                      => (bool) random_int(0, 1),
		'depression_med_tofranil'                    => (bool) random_int(0, 1),
		'depression_med_anafranil'                   => (bool) random_int(0, 1),
		'depression_med_cymbalta'                    => (bool) random_int(0, 1),
		'depression_med_surmontil'                   => (bool) random_int(0, 1),
		'depression_med_zoloft'                      => (bool) random_int(0, 1),
		'depression_med_norpramin'                   => (bool) random_int(0, 1),
		'depression_med_celexa'                      => (bool) random_int(0, 1),
		'depression_med_paxil'                       => (bool) random_int(0, 1),
		'depression_med_sinequan'                    => (bool) random_int(0, 1),
		'depression_med_lexapro'                     => (bool) random_int(0, 1),
		'depression_med_effexor'                     => (bool) random_int(0, 1),
		'diagnosed_arthritis'                        => (bool) random_int(0, 1),
		'diagnosed_asthma'                           => (bool) random_int(0, 1),
		'diagnosed_cancer_breast'                    => (bool) random_int(0, 1),
		'diagnosed_cancer_colon'                     => (bool) random_int(0, 1),
		'diagnosed_depression'                       => (bool) random_int(0, 1),
		'diagnosed_diabetes'                         => (bool) random_int(0, 1),
		'diagnosed_heart_attack'                     => (bool) random_int(0, 1),
		'diagnosed_high_cholesterol'                 => (bool) random_int(0, 1),
		'diagnosed_hypertension'                     => (bool) random_int(0, 1),
		'diagnosed_stroke'                           => (bool) random_int(0, 1),
		'diagnosed_congestive_heart_failure'         => (bool) random_int(0, 1),
		'other_problems_skin'                        => (bool) random_int(0, 1),
		'other_problems_chest_heart'                 => (bool) random_int(0, 1),
		'other_problems_head_neck'                   => (bool) random_int(0, 1),
		'other_problems_back'                        => (bool) random_int(0, 1),
		'other_problems_ears'                        => (bool) random_int(0, 1),
		'other_problems_intestinal'                  => (bool) random_int(0, 1),
		'other_problems_nose'                        => (bool) random_int(0, 1),
		'other_problems_bladder'                     => (bool) random_int(0, 1),
		'other_problems_throat'                      => (bool) random_int(0, 1),
		'other_problems_bowel'                       => (bool) random_int(0, 1),
		'other_problems_lungs'                       => (bool) random_int(0, 1),
		'other_problems_circulation'                 => (bool) random_int(0, 1),
		'other_problems_recent_changes_weight'       => (bool) random_int(0, 1),
		'other_problems_recent_changes_sleep'        => (bool) random_int(0, 1),
		'other_problems_recent_changes_energy_level' => (bool) random_int(0, 1),

		'history_depression_suicide'                 => $depression,
		'history_depression_suicide_relationship'    => $depression ? $faker->name : Null,

		'routine_screening_mammography'       => $mammography,
		'routine_screening_mammography_date'  => $mammography ? randomDate($faker) : Null,
		'routine_screening_std'               => $std,
		'routine_screening_std_date'          => $std ? randomDate($faker) : Null,
		'routine_screening_prostate'          => $prostate,
		'routine_screening_prostate_date'     => $prostate ? randomDate($faker) : Null,
		'routine_screening_ultrasound'        => $boneDensity,
		'routine_screening_ultrasound_date'   => $boneDensity ? randomDate($faker) : Null,
		'routine_screening_bone_density'      => $ulrasound,
		'routine_screening_bone_density_date' => $ulrasound ? randomDate($faker) : Null,
		'measles'                             => (bool) random_int(0, 1),
		'mumps'                               => (bool) random_int(0, 1),
		'rubella'                             => (bool) random_int(0, 1),
		'chickenpox'                          => (bool) random_int(0, 1),
		'rheumatic_fever'                     => (bool) random_int(0, 1),
		'polio'                               => (bool) random_int(0, 1),
		'immunization_tetanus'                => $tetanus,
		'immunization_tetanus_date'           => $tetanus ? randomDate($faker) : Null,
		'immunization_hepatitis'              => $hepatitis,
		'immunization_hepatitis_date'         => $hepatitis ? randomDate($faker) : Null,
		'immunization_influenza'              => $influenza,
		'immunization_influenza_date'         => $influenza ? randomDate($faker) : Null,
		'immunization_pneumonia'              => $pneumonia,
		'immunization_pneumonia_date'         => $pneumonia ? randomDate($faker) : Null,
		'immunization_varicella'              => $varicella,
		'immunization_varicella_date'         => $varicella ? randomDate($faker) : Null,

		// Personal Health History Page 2 ------------------------------------------------------
		'is_hearing_impaired'      => (bool) random_int(0, 1),
		'hearing_aid'              => (bool) random_int(0, 1),
		'hearing_exam'             => random_int(0, 1) ? randomDate($faker) : Null,
		'can_see_clearly'          => (bool) random_int(0, 1),
		'has_glasses_contacts'     => (bool) random_int(0, 1),
		'cataract_glaucoma'        => (bool) random_int(0, 1),
		'vision_exam'              => random_int(0, 1) ? randomDate($faker) : Null,
		'stairs_inside'            => $stairsInside,
		'stairs_inside_count'      => $stairsInside ? random_int(1, 100) : Null,
		'stairs_outside'           => $stairsOutside,
		'stairs_outside_count'     => $stairsOutside ? random_int(1, 25) : Null,
		'fallen'                   => (bool) random_int(0, 1),
		'rug_mats'                 => (bool) random_int(0, 1),
		'pets'                     => (bool) random_int(0, 1),
		'bathroom_bars'            => (bool) random_int(0, 1),
		'is_living_alone'          => (bool) random_int(0, 1),
		'hurting_you'              => (bool) random_int(0, 1),
		'seatbelts'                => (bool) random_int(0, 1),
		'depression_sad'           => (bool) random_int(0, 1),
		'depression_concentrating' => (bool) random_int(0, 1),
		'depression_death'         => (bool) random_int(0, 1),
		'depression_guilt'         => (bool) random_int(0, 1),
		'depression_fatigue'       => (bool) random_int(0, 1),
		'depression_treatment'     => (bool) random_int(0, 1),
		'devices_pacemaker'        => (bool) random_int(0, 1),
		'devices_defibrillator'    => (bool) random_int(0, 1),
		'devices_port_a_cath'      => (bool) random_int(0, 1),
		'devices_brain_stim'       => (bool) random_int(0, 1),
		'devices_bladder_stim'     => (bool) random_int(0, 1),
		'pharmacy_name'            => $faker->company,
		'pharmacy_number'          => sprintf('(%03d) %03d-%04d', random_int(1, 999), random_int(1, 999), random_int(1, 9999)),

		// Health Habits -----------------------------------------------------------------------
		'exercise'                           => $exercises[random_int(0, count($exercises)-1)],
		'diet'                               => (bool) random_int(0, 1),
		'prescribed_diet'                    => (bool) random_int(0, 1),
		'typical_meal'                       => $faker->text(45),
		'salt_intake'                        => random_int(0, 2),
		'fat_intake'                         => random_int(0, 2),
		'sleep_apnea'                        => (bool) random_int(0, 1),
		'cpap'                               => (bool) random_int(0, 1),
		'cpap_uses'                          => random_int(0, 2),
		'cpap_working'                       => $faker->text(45),
		'night_sleep_hours'                  => random_int(1, 16),
		'trouble_sleeping'                   => (bool) random_int(0, 1),
		'nap_day'                            => (bool) random_int(0, 1),
		'sleep_aid'                          => (bool) random_int(0, 1),
		'alcohol'                            => (bool) random_int(0, 1),
		'alcohol_kind'                       => $faker->text(45),
		'alcohol_amount_week'                => random_int(0, 50),
		'alcohol_concern'                    => (bool) random_int(0, 1),
		'alcohol_consider_stop'              => (bool) random_int(0, 1),
		'alcohol_blackouts'                  => (bool) random_int(0, 1),
		'alcohol_binge_drink'                => (bool) random_int(0, 1),
		'alcohol_drive_drunk'                => (bool) random_int(0, 1),
		'tobacco'                            => (bool) random_int(0, 1),
		'tobacco_cigarettes'                 => $cigarettes,
		'tobacco_cig_pkt_day'                => $cigarettes ? random_int(1, 5) : 0,
		'tobacco_chew'                       => $chew,
		'tobacco_chew_pkt_day'               => $chew ? random_int(1, 5) : 0,
		'tobacco_pipe'                       => $pipe,
		'tobacco_pipe_pkt_day'               => $pipe ? random_int(1, 5) : 0,
		'tobacco_cigar'                      => $cigar,
		'tobacco_cigar_pkt_day'              => $cigar ? random_int(1, 5) : 0,
		'tobacco_years'                      => random_int(0, 65),
		'tobacco_year_quit'                  => random_int(1950, 2018),
		'recommend_abdom_aortic_screen'      => (bool) random_int(0, 1),
		'recommend_alcohol_misuse_screen'    => (bool) random_int(0, 1),
		'recommend_bone_mass_measurements'   => (bool) random_int(0, 1),
		'recommend_cardio_disease_screen'    => (bool) random_int(0, 1),
		'recommend_cardio_disease_bt'        => (bool) random_int(0, 1),
		'recommend_cervical_cancer_screen'   => (bool) random_int(0, 1),
		'recommend_colorectal_cancer_screen' => (bool) random_int(0, 1),
		'recommend_counsel_tobacco'          => (bool) random_int(0, 1),
		'recommend_depression_screen'        => (bool) random_int(0, 1),
		'recommend_diabetes_smt'             => (bool) random_int(0, 1),
		'recommend_glaucoma_screen'          => (bool) random_int(0, 1),
		'recommend_hep_c_screen'             => (bool) random_int(0, 1),
		'recommend_hiv_screen'               => (bool) random_int(0, 1),
		'recommend_lung_cancer_screen'       => (bool) random_int(0, 1),
		'recommend_mammogram_screen'         => (bool) random_int(0, 1),
		'recommend_nutrition_therapy'        => (bool) random_int(0, 1),
		'recommend_obesity_screen'           => (bool) random_int(0, 1),
		'recommend_medicare_visit'           => (bool) random_int(0, 1),
		'recommend_prostate_cancer_screen'   => (bool) random_int(0, 1),
		'recommend_std_screen'               => (bool) random_int(0, 1),
		'recommend_flu_shots'                => (bool) random_int(0, 1),
		'recommend_hep_b_shots'              => (bool) random_int(0, 1),
		'recommend_pneumococcal_shots'       => (bool) random_int(0, 1),
		'recommend_tobacco_screen'           => (bool) random_int(0, 1),
		'recommend_yearly_wellness'          => (bool) random_int(0, 1),
		'street_drugs'                       => (bool) random_int(0, 1),
		'needle_drugs'                       => (bool) random_int(0, 1),
		'cognitive_impairment'               => (bool) random_int(0, 1),
		'other_notes'                        => $faker->sentence(),
		'is_complete'                        => True
    ], 	(function($faker) {
		foreach (config("form.section.family_history") as $history) {
			$fields[$history]                  = (bool) random_int(0, 1);
			$fields["{$history}_relationship"] = $fields[$history] ? $faker->name : Null;
		}
		return $fields;
	})($faker));
});
