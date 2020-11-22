@header("Best Time to Contact")
@if (isset($form))
	@if ($form instanceof \App\Models\Patient)
		<contact-time printing="1" values="{{ json_encode($form->contactTime->json()) }}"></contact-time>
	@else
		<contact-time printing="1" values="{{ json_encode($form->patient->contactTime->json()) }}"></contact-time>
	@endif
@else
	<contact-time></contact-time>
@endif