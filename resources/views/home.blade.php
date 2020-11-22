@extends("base.no_scroll")
@section("body")
	<div id="text" style="position:absolute; top:60px; left:90px; z-index:99999"> 
			<h1 style="color:white"> Our mission is <br> to genuinely care about and improve 
									<br> our patient's quality of life
			</h1>
			<h3 style="color:#92d400"> by listening, understanding, and customizing an approach <br>
									   to meet their healthcare needs
			</h3>
	</div>
	<div class="csslider1 autoplay">
		<input name="cs_anchor1" id='cs_slide1_0' type="radio" class='cs_anchor slide'>
		<input name="cs_anchor1" id='cs_slide1_1' type="radio" class='cs_anchor slide'>
		<input name="cs_anchor1" id='cs_slide1_2' type="radio" class='cs_anchor slide'>
		<input name="cs_anchor1" id='cs_slide1_3' type="radio" class='cs_anchor slide'>
		<input name="cs_anchor1" id='cs_play1' type="radio" class='cs_anchor' checked>
		<input name="cs_anchor1" id='cs_pause1' type="radio" class='cs_anchor'>
		<ul>
			{{-- <div style="width: 100%; visibility: hidden; font-size: 0px; line-height: 0;">
				<img src="/img/header_bg_1.png" style="width: 100%;">
			</div> --}}
			<li class='num0 img'>
				<img src="/img/header_bg_1.png">
			</li>
			<li class='num1 img'>
				<img src="/img/header_bg_2.png">
			</li>
			<li class='num2 img'>
				<img src="/img/header_bg_3.png">
			</li>
			<li class='num3 img'>
				<img src="/img/header_bg_4.png">
			</li>
		</ul>
	</div>
@endsection
