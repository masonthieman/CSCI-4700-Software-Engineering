@header("Hearing")
@if (isset($form))
	<div class="row">
		<div class="printing-col col-6">
			@printradio($form->is_hearing_impaired, "Do you have difficulty hearing?")
		</div>
		<div class="printing-col col-6">
			@printradio($form->hearing_aid, "Do you wear a hearing aid?")
		</div>
		<div class="printing-col col-12">
			<label>Date of your last hearing exam?</label>
			<span class="printing-span">{{ $form->hearing_exam_unknown_date ? "Unknown" : monthValue($form->hearing_exam) }}</span>
		</div>
	</div>
@else
	<div class="row">
		<div class="form-group col-md-4 col-sm-6">
			<yes-no name="is_hearing_impaired">Do you have difficulty hearing?</yes-no>
		</div>
		<div class="form-group col-md-4 col-sm-6">
			<yes-no name="hearing_aid">Do you wear a hearing aid?</yes-no>
		</div>
		<div class="form-group col-md-4">
			<label>Date of your last hearing exam?</label>
			<!-- @date("hearing_exam", ["id" => "hearing-exam-date"]) -->
			@text("hearing_exam", ["id" => "hearing-exam-date", "placeholder"=>"MM/YYYY", "class"=>"dateFormat"])
			@checkbox("Unknown Date", "hearing_exam_unknown_date", "hearing-exam-unknown-date")
		</div>
	</div>
@endif
