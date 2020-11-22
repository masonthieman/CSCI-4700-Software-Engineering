@extends("base.master")
@section("body")
	<div class="container bg-white">
		<div class="row">
			<div class="col-12" style="padding-top: 20px;">
				@table([
					"name"          => $name,
					"columns"       => $columns,
					"data"          => $data,
					"booleanFields" => $booleanFields,
					"pagination"    => False,
					"small"         => True,
					"bordered"      => True
				])
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				Total records: {{ count($data) }}
			</div>
		</div>
	</div>
@endsection
