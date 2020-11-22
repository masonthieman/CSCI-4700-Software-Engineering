@if (isset($form))
	
	
@else

	<div class="row">
		<div class="printing-col col-12">
			<div class="form-group">
				<label for="tblname"></label>
				<select name="tblname" id="tblname">
					<option value="Patient">Patient</option>
					<option value="Reviews">Reviews</option>
				</select>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-6">
			<div class="form-group">
				<label for="opid"></label>
				<select name="opid" id="opid">
					<option value="c">Create</option>
					<option value="r">Read</option>
					<option value="u">Update</option>
					<option value="d">Delete</option>
				</select>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="printing-col col-4">
			<label for="Start Date">Start Date:</label>
			<span class="printing-span"></span>
		</div>
		<div class="printing-col col-4">
			<label for="End Date">End Date:</label>
			<span class="printing-span"></span>
		</div>
	</div>
	
@endif