@header("Psychosocial Issues")
@if (isset($form))
	<div class="row">
		<div class="printing-col col-4">
			@printcheckbox($form->psych_transportation, "Transportation: ")
			<span class="printing-span">{{$form->psych_transportation_desc}}</span>
		</div>
		<div class="printing-col col-4">
			@printcheckbox($form->psych_personal_safety, "Personal Safety: "):
			<span class="printing-span">{{$form->psych_personal_safety_desc}}</span>
		</div>

		<div class="printing-col col-4">
			@printcheckbox($form->psych_housing, "Housing: ")
			<span class="printing-span">{{$form->psych_housing_desc}}</span>
		</div>
	</div>
	<div class="row">
		<div class="printing-col col-4">
			@printcheckbox($form->psych_caregiver, "Caregiver: ")
			<span class="printing-span">{{$form->psych_caregiver_desc}}</span>
		</div>
		<div class="printing-col col-4">
			@printcheckbox($form->psych_adls, "ADLS: ")
			<span class="printing-span">{{$form->psych_adls_desc}}</span>
		</div>
		<div class="printing-col col-4">
			@printcheckbox($form->psych_nutrition, "Nutrition: ")
			<span class="printing-span">{{$form->psych_nutrition_desc}}</span>
		</div>
	</div>
	<div class="row">
		<div class="printing-col col-12">
			<label>Other</label>
			<span class="printing-span">{{$form->psych_other}}</span>
		</div>
	</div>
@else
	<div class="row">
		<div class="form-group col-md-4">
			@checkbox("Transportation", "psych_transportation", "psych-transportation", 1)
			@text("psych_transportation_desc")
		</div>
		<div class="form-group col-md-4">
			@checkbox("Personal Safety", "psych_personal_safety", "psych-personal-safety", 1)
			@text("psych_personal_safety_desc")
		</div>

		<div class="form-group col-md-4">
			@checkbox("Housing", "psych_housing", "psych-housing", 1)
			@text("psych_housing_desc")
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-4">
			@checkbox("Caregiver", "psych_caregiver", "psych-caregiver", 1)
			@text("psych_caregiver_desc")
		</div>
		<div class="form-group col-md-4">
			@checkbox("ADLS", "psych_adls", "psych-adls", 1)
			@text("psych_adls_desc")
		</div>
		<div class="form-group col-md-4">
			@checkbox("Nutrition", "psych_nutrition", "psych-nutrition", 1)
			@text("psych_nutrition_desc")
		</div>
	</div>
	<div class="row">
		<div class="form-group col-12">
			<label>Other</label>
			@text("psych_other")
		</div>
	</div>
@endif
