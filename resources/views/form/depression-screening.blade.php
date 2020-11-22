@header("Depression Screening")
<div class="row">
	@if (isset($form))
		<div class="printing-col col-md-4">
			@printradio($form->depression_sad, "Do you feel sad or empty?")
		</div>
		<div class="printing-col col-md-4">
			@printradio($form->depression_concentrating, "Do you have trouble concentrating?")
		</div>
		<div class="printing-col col-md-4">
			@printradio($form->depression_death, "Do you have recurrent thoughts of death?")
		</div>
		<div class="printing-col col-md-4">
			@printradio($form->depression_guilt, "Do you feel worthlessness or guilt?")
		</div>
		<div class="printing-col col-md-4">
			@printradio($form->depression_fatigue, "Do you have excessive fatigue or loss of energy?")
		</div>
		<div class="printing-col col-md-4">
			@printradio($form->depression_treatment, "Prior or current treatment for depression?")
		</div>
	@else
		<div class="form-group col-md-4">
			<yes-no name="depression_sad">Do you feel sad or empty?</yes-no>
		</div>
		<div class="form-group col-md-4">
			<yes-no name="depression_concentrating">Do you have trouble concentrating?</yes-no>
		</div>
		<div class="form-group col-md-4">
			<yes-no name="depression_death">Do you have recurrent thoughts of death?</yes-no>
		</div>
		<div class="form-group col-md-4">
			<yes-no name="depression_guilt">Do you feel worthlessness or guilt?</yes-no>
		</div>
		<div class="form-group col-md-4">
			<yes-no name="depression_fatigue">Do you have excessive fatigue or loss of energy?</yes-no>
		</div>
		<div class="form-group col-md-4">
			<yes-no name="depression_treatment">Prior or current treatment for depression?</yes-no>
		</div>
	@endif
</div>
