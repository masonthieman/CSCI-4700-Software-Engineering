@header("Vision")
@if (isset($form))
	<div class="row">
		<div class="form-group col-md-3">
			@printradio($form->can_see_clearly, "Do you see clearly?")
		</div>
		<div class="form-group col-md-3">
			@printradio($form->has_glasses_contacts, "Do you wear glasses or contacts?")
		</div>
		<div class="form-group col-md-3">
			@printradio($form->cataract_glaucoma, "Do you have/had cataracts or glaucoma?")
		</div>
		<div class="form-group col-md-3">
			<label>Date of last vision exam?</label>
			<span class="printing-span">{{ $form->vision_exam_unknown_date ? "Unknown" : monthValue($form->vision_exam) }}</span>
		</div>
	</div>
@else
	<div class="row">
		<div class="form-group col-md-3">
			<yes-no name="can_see_clearly">Do you see clearly?</yes-no>
		</div>
		<div class="form-group col-md-3">
			<yes-no name="has_glasses_contacts">Do you wear glasses or contacts?</yes-no>
		</div>
		<div class="form-group col-md-3">
			<yes-no name="cataracts">Do you have/had cataracts or glaucoma?</yes-no>
		</div>
		<div class="form-group col-md-3">
			<label>Date of last vision exam?</label>
			<!-- @date("last_vision_exam", [ "id" => "last-vision-exam-date" ])-->
			@text("last_vision_exam", [ "id" => "last-vision-exam-date", "placeholder"=>"MM/YYYY", "class"=>"dateFormat"]) 
			@checkbox("Unknown Date", "vision_exam_unknown_date", "vision-exam-unknown-date")
		</div>
	</div>
@endif
