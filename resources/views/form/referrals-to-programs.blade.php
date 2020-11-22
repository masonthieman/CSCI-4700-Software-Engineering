@header("List Referrals to Programs")
<div class="row">
    <div class="col-12 text-center">
        <p>lifestyle, fall prevention, nutrition, tobacco, cessation, weight loss, other</p>
    </div>
</div>
@if (isset($form))
    @foreach($form->referrals as $referral)
        <div class="row">
            <div class="col-12 printing-col">
                <label>Referral: </label>
                <span class="printing-span">{{$referral->referral}}</span>
            </div>
        </div>
    @endforeach
@else
    @dynamicarea("referrals", "referrals", "Referral")
    @push("dynamic_templates")
		@include("component.dynamic-templates.referrals")
	@endpush
@endif
