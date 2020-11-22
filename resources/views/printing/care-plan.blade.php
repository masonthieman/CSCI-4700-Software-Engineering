@extends("base.master")
@section("body")
	<div class="container bg-white">
		@foreach($carePlans as $careplan)
			{{-- {{ dd($careplan->care_plan["others"]) }} --}}
			<div class="pagebrk">
				<div class="row">
					<div class="printing-col col-md-12 text-center">
						<h3>Care Plan: {{$careplan->template->name}}</h3>
					</div>
				</div>
				<div class="row">
					<div class="printing-col col-md-6">
						<label>ICD10:</label>
						<span class="printing-span">{{$careplan->icd10 ? $careplan->icd10 : $careplan->template->icd10}}</span>
					</div>
					<div class="printing-col col-md-6">
						<label>Date:</label>
						<span class="printing-span">{{dateValue($careplan->date)}}</span>
					</div>
				</div>
				<div class="row">
					<div class="printing-col col-md-4">
						<label for="Last Name">Last Name:</label>
						<span class="printing-span">{{$patient->lname}}</span>
					</div>
					<div class="printing-col col-md-4">
						<label>Middle Name:</label>
						<span class="printing-span">{{$patient->mname}}</span>
					</div>
					<div class="printing-col col-md-4">
						<label for="First Name">First Name:</label>
						<span class="printing-span">{{$patient->fname}}</span>
					</div>
				</div>
				<div class="row">
					<div class="printing-col col-md-4">
						<div class="form-inline">
							<label>Gender: </label>
							<label>
								<input type="radio" value="" {{radioYes($patient->gender)}}/>
								Male
							</label>
							<label>
								<input type="radio" value="" {{radioNo($patient->gender)}}/>
								Female
							</label>
						</div>
					</div>
					<div class="printing-col col-md-8">
						<label>Date of Birth:</label>
						<span class="printing-span">{{dateValue($patient->dob)}}</span>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<h4>Symptoms</h4>
					</div>
				</div>
				@foreach($careplan->template->template["symptoms"] as $key => $original)
					@if($original["type"] == 0)
						<div class="row">
							<div class="printing-col col-md-12">
								<input type="checkbox" {!! checkboxChecked($careplan->care_plan["values"]["symptoms"][$key]["checked"]) !!}>
								<label>{{$original["description"]}}</label>
							</div>
						</div>
					@elseif($original["type"] == 1)
						<div class="row">
							<div class="printing-col col-md-6">
								<input type="checkbox" {!! checkboxChecked($careplan->care_plan["values"]["symptoms"][$key]["checked"]) !!}>
								<label>{{$original["description"]}}</label>
							</div>
							@if($careplan->care_plan["values"]["symptoms"][$key]["value"])
							<div class="printing-col col-md-6">
								<span class="printing-span">{{$careplan->care_plan["values"]["symptoms"][$key]["value"]}}</span>
							</div>
							@endif
						</div>
					@endif
				@endforeach
				<div class="row">
					<div class="col-md-12">
						<h4>Goals</h4>
					</div>
				</div>
				@foreach($careplan->template->template["goals"] as $key => $original)
					@if($original["type"] == 0)
						<div class="row">
							<div class="printing-col col-md-12">
								<input type="checkbox" {!! checkboxChecked($careplan->care_plan["values"]["goals"][$key]["checked"]) !!}>
								<label>{{$original["description"]}}</label>
							</div>
						</div>
					@elseif($original["type"] == 1)
						<div class="row">
							<div class="printing-col col-md-6">
								<input type="checkbox" {!! checkboxChecked($careplan->care_plan["values"]["goals"][$key]["checked"]) !!}>
								<label>{{$original["description"]}}</label>
							</div>
							@if($careplan->care_plan["values"]["goals"][$key]["value"])
							<div class="printing-col col-md-6">
								<span class="printing-span">{{$careplan->care_plan["values"]["goals"][$key]["value"]}}</span>
							</div>
							@endif
						</div>
					@endif
				@endforeach
				<div class="row">
					<div class="col-md-12">
						<h4>Tasks</h4>
					</div>
				</div>
				@foreach($careplan->template->template["tasks"] as $key => $original)
					@if($original["type"] == 0)
						<div class="row">
							<div class="printing-col col-md-12">
								<input type="checkbox" {!! checkboxChecked($careplan->care_plan["values"]["tasks"][$key]["checked"]) !!}>
								<label>{{$original["description"]}}</label>
							</div>
						</div>
					@elseif($original["type"] == 1)
						<div class="row">
							<div class="printing-col col-md-6">
								<input type="checkbox" {!! checkboxChecked($careplan->care_plan["values"]["tasks"][$key]["checked"]) !!}>
								<label>{{$original["description"]}}</label>
							</div>
						</div>
						@if($careplan->care_plan["values"]["tasks"][$key]["value"])
							<div class="printing-col col-md-6">
								<span class="printing-span">{{$careplan->care_plan["values"]["tasks"][$key]["value"]}}</span>
							</div>
						@endif
					@endif
				@endforeach
				<div class="row">
					<div class="col-md-12">
						<h4>Physicians and Specialists</h4>
					</div>
				</div>
				@if(isset($careplan->care_plan["misc"]["physicians"]))
					@foreach($careplan->care_plan["misc"]["physicians"] as $physician)
						<div class="row">
							<div class="printing-col col-md-4">
								<span class="printing-span">{{$physician[0]}}</span>
							</div>
							<div class="printing-col col-md-4">
								<span class="printing-span">{{$physician[1]}}</span>
							</div>
							<div class="printing-col col-md-4">
								<span class="printing-span">{{$physician[2]}}</span>
							</div>
						</div>
						<div class="row">
							<div class="printing-col col-md-4">
								<label>Name</label>
							</div>
							<div class="printing-col col-md-4">
								<label>Number</label>
							</div>
							<div class="printing-col col-md-4">
								<label>Specialty</label>
							</div>
						</div>
					@endforeach
				@endif
				<div class="row">
					<div class="col-md-12">
						<h4>Pharmacies</h4>
					</div>
				</div>
				@if(isset($careplan->care_plan["misc"]["pharmacies"]))
					@foreach($careplan->care_plan["misc"]["pharmacies"] as $pharmacy)
						<div class="row">
							<div class="printing-col col-md-2">
								<span class="printing-span">{{$loop->iteration}}</span>
							</div>
							<div class="printing-col col-md-7">
								<span class="printing-span">{{$pharmacy[0]}}</span>
							</div>
							<div class="printing-col col-md-3">
								<span class="printing-span">{{$pharmacy[1]}}</span>
							</div>
						</div>
						<div class="row">
							<div class="printing-col col-md-2">
								<label>RX</label>
							</div>
							<div class="printing-col col-md-7">
								<label>Name</label>
							</div>
							<div class="printing-col col-md-3">
								<label>Number</label>
							</div>
						</div>
					@endforeach
				@endif
				<div class="row">
					<div class="col-md-12">
						<h4>Medications</h4>
					</div>
				</div>
				@if(isset($careplan->care_plan["misc"]["medications"]))
					@foreach($careplan->care_plan["misc"]["medications"] as $medication)
						<div class="row">
							<div class="printing-col col-md-1">
								<span class="printing-span">{{$medication[0] == 0 ? "N/A" : $medication[0]}}</span>
							</div>
							<div class="printing-col col-md-4">
								<span class="printing-span">{{$medication[1]}}</span>
							</div>
							<div class="printing-col col-md-4">
								<span class="printing-span">{{$medication[2]}}</span>
							</div>
							<div class="printing-col col-md-3">
								<span class="printing-span">{{config("form.medical_abbreviations.$medication[3]")}}</span>
							</div>
						</div>
						<div class="row">
							<div class="printing-col col-md-1">
								<label>RX</label>
							</div>
							<div class="printing-col col-md-4">
								<label>Name</label>
							</div>
							<div class="printing-col col-md-4">
								<label>Strength</label>
							</div>
							<div class="printing-col col-md-3">
								<label>Frequency</label>
							</div>
						</div>
					@endforeach
				@endif
				<div class="row">
					<div class="col-md-12">
						<h4>Resources</h4>
					</div>
				</div>
				@if(isset($careplan->care_plan["values"]["resources"]))
					@foreach($careplan->template->template["resources"] as $key => $original)
						@if($original["type"] == 0)
							<div class="row">
								<div class="printing-col col-md-12">
									<input type="checkbox" {!! checkboxChecked($careplan->care_plan["values"]["resources"][$key]["checked"]) !!}>
									<label>{{$original["description"]}}</label>
								</div>
							</div>
						@elseif($original["type"] == 1)
							<div class="row">
								<div class="printing-col col-md-6">
									<input type="checkbox" {!! checkboxChecked($careplan->care_plan["values"]["resources"][$key]["checked"]) !!}>
									<label>{{$original["description"]}}</label>
								</div>
								@if($careplan->care_plan["values"]["resources"][$key]["value"])
								<div class="printing-col col-md-6">
									<span class="printing-span">{{$careplan->care_plan["values"]["resources"][$key]["value"]}}</span>
								</div>
								@endif
							</div>
						@endif
					@endforeach
				@endif
				<div class="row">
					<div class="col-md-12">
						<h4>Tracking</h4>
					</div>
				</div>
				@foreach($careplan->template->template["tracking"] as $key => $original)
					@if($original["type"] == 0)
						<div class="row">
							<div class="printing-col col-md-12">
								<input type="checkbox" {!! checkboxChecked($careplan->care_plan["values"]["tracking"][$key]["checked"]) !!}>
								<label>{{$original["description"]}}</label>
							</div>
						</div>
					@elseif($original["type"] == 1)
						<div class="row">
							<div class="printing-col col-md-6">
								<input type="checkbox" {!! checkboxChecked($careplan->care_plan["values"]["tracking"][$key]["checked"]) !!}>
								<label>{{$original["description"]}}</label>
							</div>
							@if($careplan->care_plan["values"]["tracking"][$key]["value"])
							<div class="printing-col col-md-6">
								<span class="printing-span">{{$careplan->care_plan["values"]["tracking"][$key]["value"]}}</span>
							</div>
							@endif
						</div>
					@endif
				@endforeach
			</div>
		@endforeach
	</div>
@endsection
