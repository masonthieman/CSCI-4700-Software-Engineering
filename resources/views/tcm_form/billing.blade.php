@header("Billing")
@if (isset($form))
		<div class="printing-col col-md-4">
			<label for="">Follow-Up Date:</label>
			<span class="printing-span">{{dateValuePrint($form->billing_follow_up_date)}}</span>
		</div>
		<div class="printing-col col-md-3">
			<label>Ending:</label>
			<span class="printing-span">
				@if(isset($form->billing_ending))
				    {{config("form.billing_ending")[$form->billing_ending]}}
			    @endif
			</span>
		</div>
@else
		<div class="form-group col-md-4 col-xl-3">
			<label for="">Follow-Up Date</label>
			@date("billing_follow_up_date",["id" => "billing-follow-up-date"])
		</div>
		<div class="form-group col-md-3">
			<label>Ending</label>
			@select("Ending", "billing_ending", config("form.billing_ending"),["id" => "billing-ending"])
		</div>
@endif