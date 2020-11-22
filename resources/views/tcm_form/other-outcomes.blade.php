@header("Other Outcomes")
@if(isset($form))
<div>
    <div class="row">
        <div class="printing-col col-md-10">
			@printcheckbox($form->readmission_for_new_or_diff_condition_occured, "Readmission for new or different condition occured")
        </div>
    </div>
    <div class = "row">
        <div class="printing-col col-md-4 offset-sm-1">
			<label>Date:</label>
            <span class="printing-span">{{dateValuePrint($form->readmission_for_new_or_diff_date)}}</span>
        </div>
        <div class="printing-col col-md-4">
			<span class="printing-span">
			<label for="readmission_location">Location:</label>
				@if(!empty($form->readmission_for_new_or_diff_location))
				    {{ $form->readmission_for_new_or_diff_location }}
			    @endif
			</span>
        </div>
    </div>
    <div class="row">
        @foreach($form->tcm_other_outcome_readmission_icds as $tcm_other_outcome_readmission_icd)
        <div class="printing-col col-md-4 offset-sm-1">
			<label for="readmission_icd10">ICD 10:</label>
			<span class="printing-span">
				{{ $tcm_other_outcome_readmission_icd->icd_10 }}
			</span>
        </div>
        @endforeach
    </div>


    <div class="row">
        <div class="printing-col col-md-10">
			@printcheckbox($form->ED_visit_same_or_similar, "ED visit since discharge for same or similar condition")
        </div>
    </div>
    <div class = "row">
        <div class="printing-col col-md-4 offset-sm-1">
			<label for="ED_visit_same_or_similar_date">Date:</label>
            <span class="printing-span">{{dateValuePrint($form->ED_visit_same_or_similar_date)}}</span>
        </div>
        <div class="printing-col col-md-4">
			<label for="ED_visit_same_or_similar_location">Location:</label>
			<span class="printing-span">
				@if(!empty($form->ED_visit_same_or_similar_location))
				    {{ $form->ED_visit_same_or_similar_location }}
			    @endif
			</span>
        </div>
        @foreach($form->tcm_other_outcome_ed_same_icds as $tcm_other_outcome_ed_same_icd)
        <div class="printing-col col-md-4 offset-sm-1">
            <label for="readmission_icd10">ICD 10:</label>
            <span class="printing-span">
                {{ $tcm_other_outcome_ed_same_icd->icd_10 }}
            </span>
        </div>
        @endforeach
    </div>

    <div class="row">
        <div class="printing-col col-md-10">
			@printcheckbox($form->ED_visit_new_or_different, "ED visit since discharge for new or different condition")
        </div>
    </div>
    <div class = "row">
        <div class="printing-col col-md-4 offset-sm-1">
            <label for="ED_visit_new_or_different_date">Date:</label>
            <span class="printing-span">{{dateValuePrint($form->ED_visit_new_or_different_date)}}</span>
        </div>
        <div class="printing-col col-md-4">
			<label for="ED_visit_new_or_different_location">Location:</label>
			<span class="printing-span">
				@if(!empty($form->ED_visit_new_or_different_location))
				    {{ $form->ED_visit_new_or_different_location }}
			    @endif
			</span>
        </div>
        @foreach($form->tcm_other_outcome_ed_new_icds as $tcm_other_outcome_ed_new_icd)
        <div class="printing-col col-md-4 offset-sm-1">
            <label for="readmission_icd10">ICD 10:</label>
            <span class="printing-span">
                {{ $tcm_other_outcome_ed_new_icd->icd_10 }}
            </span>
        </div>
        @endforeach
    </div>


    <div class="row">
        <div class="printing-col col-md-10">
			@printcheckbox($form->other_outcome_other, "Other")
        </div>
        <div class="printing-col col-md-4 offset-sm-1">
			<label for="other_outcome_other_date">Date:</label>
            <span class="printing-span">{{dateValuePrint($form->other_outcome_other_date)}}</span>
        </div>
        <div class="printing-col col-md-4">
			<label for="other_outcome_other_location">Location:</label>
			<span class="printing-span">
				@if(!empty($form->other_outcome_other_location))
				    {{ $form->other_outcome_other_location }}
			    @endif
			</span>
        </div>
        @foreach($form->tcm_other_outcome_other_icds as $tcm_other_outcome_other_icd)
        <div class="printing-col col-md-4 offset-sm-1">
            <label for="readmission_icd10">ICD 10:</label>
            <span class="printing-span">
                {{ $tcm_other_outcome_other_icd->icd_10 }}
            </span>
        </div>
        @endforeach
    </div>


    <div class="row">
        <div class="printing-col col-md-8">
            <label for="other_outcome_notes">Notes:</label>
			<span class="printing-span">
				@if(!empty($form->other_outcome_notes))
				    {{ $form->other_outcome_notes }}
			    @endif
			</span>
        </div>
    </div>
</div>
<!-- Printing section  -->
@else
<!-- Viewing Section -->
<div>
    <h6>(Check all that apply)</h6>
<!-- Readmission for new or different condition occured -->
    <div class="row">
        <div class="form-group col-md-10">
            @checkbox("Readmission for new or different condition occured", "readmission_for_new_or_diff_condition_occured", "readmission_for_new_or_diff_condition_occured", 1)
        </div>
    </div>
    <div class = "row">
        <div class="form-group col-md-4 offset-sm-1">
			@date("readmission_for_new_or_diff_date",["id" => "readmission_for_new_or_diff_date"])
			<label for="readmission_date"> Date</label>
        </div>
        <div class="form-group col-md-4">
			@text("readmission_for_new_or_diff_location",["id" => "readmission_for_new_or_diff_location"])
			<label for="readmission_location"> Location</label>
        </div>
    </div>
    <!-- dynamic area for icd_10 -->
    <div class="row">
        <div class="form-group col-md-12">
            @dynamicarea("tcm_other_outcome_readmission_icds", "tcm_other_outcome_readmission_icds", "ICD-10")
            @push("dynamic_templates")
                @include("component.tcm-dynamic-templates.tcm-other-outcome-readmission-icd")
            @endpush
        </div>
    </div>
    <!-- dynamic area for icd_10 -->
<!-- Readmission for new or different condition occured -->

<!-- ED visit since discharge for same or similar condition -->
    <div class="row">
        <div class="form-group col-md-10">
            @checkbox("ED visit since discharge for same or similar condition", "ED_visit_same_or_similar", "ED_visit_same_or_similar", 1)
        </div>
    </div>
    <div class = "row">
        <div class="form-group col-md-4 offset-sm-1">
			@date("ED_visit_same_or_similar_date",["id" => "ED_visit_same_or_similar_date"])
			<label for="ED_visit_same_or_similar_date"> Date</label>
        </div>
        <div class="form-group col-md-4">
			@text("ED_visit_same_or_similar_location",["id" => "ED_visit_same_or_similar_location"])
			<label for="ED_visit_same_or_similar_location"> Location</label>
        </div>
    </div>
    <!-- dynamic area for icd_10 -->
    <div class="row">
        <div class="form-group col-md-12">
            @dynamicarea("tcm_other_outcome_ed_same_icds", "tcm_other_outcome_ed_same_icds", "ICD-10")
            @push("dynamic_templates")
                @include("component.tcm-dynamic-templates.tcm-other-outcome-ed-same-icd")
            @endpush
        </div>
    </div>
    <!-- dynamic area for icd_10 -->
<!-- ED visit since discharge for same or similar condition -->

<!-- ED visit since discharge for new or different condition -->
    <div class="row">
        <div class="form-group col-md-10">
            @checkbox("ED visit since discharge for new or different condition", "ED_visit_new_or_different", "ED_visit_new_or_different", 1)
        </div>
    </div>
    <div class = "row">
        <div class="form-group col-md-4 offset-sm-1">
            @date("ED_visit_new_or_different_date",["id" => "ED_visit_new_or_different_date"])
            <label for="ED_visit_new_or_different_date"> Date</label>
        </div>
        <div class="form-group col-md-4">
			@text("ED_visit_new_or_different_location",["id" => "ED_visit_new_or_different_location"])
			<label for="ED_visit_new_or_different_location"> Location</label>
        </div>
    </div>
    <!-- dynamic area for icd_10 -->
    <div class="row">
        <div class="form-group col-md-12">
            @dynamicarea("tcm_other_outcome_ed_new_icds", "tcm_other_outcome_ed_new_icds", "ICD-10")
            @push("dynamic_templates")
                @include("component.tcm-dynamic-templates.tcm-other-outcome-ed-new-icd")
            @endpush
        </div>
    </div>
    <!-- dynamic area for icd_10 -->
<!-- ED visit since discharge for new or different condition -->

<!-- Other -->
    <div class="row">
        <div class="form-group col-md-10">
            @checkbox("Other", "other_outcome_other", "other_outcome_other", 1)
        </div>
    </div>
    <div class = "row">
        <div class="form-group col-md-4 offset-sm-1">
			@date("other_outcome_other_date", ["id" => "other_outcome_other_date"])
			<label for="other_outcome_other_date">Date</label>
        </div>
        <div class="form-group col-md-4">
			@text("other_outcome_other_location",["id" => "other_outcome_other_location"])
			<label for="ED_visit_new_or_different_location"> Location</label>
        </div>
    </div>
    <!-- dynamic area for icd_10 -->
    <div class="row">
        <div class="form-group col-md-12">
            @dynamicarea("tcm_other_outcome_other_icds", "tcm_other_outcome_other_icds", "ICD-10")
            @push("dynamic_templates")
                @include("component.tcm-dynamic-templates.tcm-other-outcome-other-icd")
            @endpush

        </div>
    </div>
    <!-- dynamic area for icd_10 -->
<!-- Other -->
    <div class="row">
        <div class="form-group col-md-8">
            <label for="other_outcome_notes">Notes:</label>
            @text("other_outcome_notes", ["id" => "other_outcome_notes"])
        </div>
    </div>
</div>
<!-- Viewing section -->
@endif