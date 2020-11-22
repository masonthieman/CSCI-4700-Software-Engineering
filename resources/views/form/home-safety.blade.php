@header("Home Safety")
@if (isset($form))
	<div class="row">
		<div class="printing-col col-6">
		    @printcheckbox($form->stairs_inside, "Do you have stairs inside the home?")
			<label>How many?</label>
			<span class="printing-span">{{$form->stairs_inside_count}}</span>
		</div>
		<div class="printing-col col-6">
		    @printcheckbox($form->stairs_outside, "Do you have stairs to get in and out of the house?")
			<label>How many?</label>
			<span class="printing-span">{{$form->stairs_outside_count}}</span>
		</div>
	</div>
	<div class="row">
		<div class="printing-col col-md-6">
			@printradio($form->fallen, "Have you fallen in the past few months?")
		</div>
		<div class="printing-col col-md-6">
			@printradio($form->rug_mats, "Do you have rugs or floor mats?")
		</div>
		<div class="printing-col col-md-6">
			@printradio($form->pets, "Do you have any pets?")
		</div>
		<div class="printing-col col-md-6">
			@printradio($form->bathroom_bars, "Do you have/need grab bars in the bathrooms?")
		</div>
		<div class="printing-col col-md-6">
			@printradio($form->is_living_alone, "Do you live alone?")
		</div>
		<div class="printing-col col-md-6">
			@printradio($form->hurting_you, "Is anyone hurting you?")
		</div>
		<div class="printing-col col-md-6">
			@printradio($form->seatbelts, "Do you wear seatbelts?")
		</div>
	</div>
@else
	<div class="row">
		<div class="form-group col-md-6">
			@checkbox("Do you have stairs inside the home? -- How many?", "stairs_house", "stairs-house")
			@number("stairs_house_n")
		</div>
		<div class="form-group col-md-6">
			@checkbox("Do you have stairs to get in and out of the house? -- How many?", "stairs_in_out", "stairs-in-out")
			@number("stairs_in_out_n")
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-4">
			<yes-no name="fallen">Have you fallen in the past few months?</yes-no>
		</div>
		<div class="form-group col-md-4">
			<yes-no name="rugs">Do you have rugs or floor mats?</yes-no>
		</div>
		<div class="form-group col-md-4">
			<yes-no name="pets">Do you have any pets?</yes-no>
		</div>
		<div class="form-group col-md-4">
			<yes-no name="grab_bars">Do you have/need grab bars in the bathrooms?</yes-no>
		</div>
		<div class="form-group col-md-4">
			<yes-no name="is_living_alone">Do you live alone?</yes-no>
		</div>
		<div class="form-group col-md-4">
			<yes-no name="hurting_you">Is anyone hurting you?</yes-no>
		</div>
		<div class="form-group col-md-4">
			<yes-no name="seatbelts">Do you wear seatbelts?</yes-no>
		</div>
	</div>
@endif
