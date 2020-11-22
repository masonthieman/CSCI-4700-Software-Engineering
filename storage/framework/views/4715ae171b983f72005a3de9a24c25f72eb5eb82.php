<?php if(isset($form)): ?>
	<div class="row">
		<div class="printing-col col-4">
			<label for="Last Name">Last Name:</label>
			<span class="printing-span capitalize"><?php echo e($form->lname); ?></span>
		</div>
		<div class="printing-col col-4">
			<label for="First Name">First Name:</label>
			<span class="printing-span capitalize"><?php echo e($form->fname); ?></span>
		</div>
		<div class="printing-col col-4">
			<label>Middle Name:</label>
			<span class="printing-span capitalize"><?php echo e($form->mname); ?></span>
		</div>
	</div>
	<div class="row">
		<div class="printing-col col-4">
			<label>Gender:</label>
			<span class="printing-span"><?php echo e(__("form.gender.$form->gender")); ?></span>
		</div>
		<div class="printing-col col-4 ">
			<label>Marital Status:</label>
			<span class="printing-span"><?php echo e(ucwords($form->marital_status)); ?></span>
		</div>
		<div class="printing-col col-4">
			<label>Date Of Birth:</label>
			<span class="printing-span"><?php echo e(dateValue($form->dob)); ?></span>
		</div>
	</div>
	<div class="row">
		<div class="printing-col col-12">
			<label for="addr1">Address Line 1:</label>
			<span class="printing-span"><?php echo e($form->addr1); ?></span>
		</div>
	</div>
	<div class="row">
		<div class="printing-col col-12">
			<label for="addr2">Address Line 2:</label>
			<span class="printing-span"><?php echo e($form->addr2); ?></span>
		</div>
	</div>
	<div class="row">
		<div class="printing-col col-4">
			<label for="city">City:</label>
			<span class="printing-span capitalize"><?php echo e($form->city); ?></span>
		</div>
		<div class="printing-col col-4">
			<label for="state">State:</label>
			<span class="printing-span"><?php if(!empty($form->state)): ?><?php echo e(config("form.states")[$form->state]); ?><?php endif; ?></span>
		</div>
		<div class="printing-col col-4">
			<label for="zip">Zip Code:</label>
			<span class="printing-span"><?php echo e($form->zip); ?></span>
		</div>
	</div>
	<div class="row">
		<div class="printing-col col-4">
			<label>Ethnicity:</label>
			<span class="printing-span"><?php echo e($form->ethnicity1); ?></span>
		</div>
		<div class="printing-col col-4">
			<label>Other Ethnicity (Optional):</label>
			<span class="printing-span"><?php echo e($form->ethnicity2); ?></span>
		</div>
		<div class="printing-col col-4 ">
			<label>Education:</label>
			<span class="printing-span"><?php echo e($form->education); ?></span>
		</div>
	</div>
	<div class="row">
		<div class="printing-col col-4">
			<label>Occupation Status:</label>
			<span class="printing-span"><?php echo e(config("form.occupation_status")[$form->occupation_status]); ?></span>
		</div>
		<div class="printing-col col-4">
			<label>Occupation Description:</label>
			<span class="printing-span"><?php echo e($form->occupation_description); ?></span>
		</div>
        <div class="printing-col col-4">
            <label>Have you ever served in the Military?:</label>
            <span class="printing-span"><?php echo e(militaryValDisplay($form->military)); ?></span>
        </div>
	</div>
	<div class="row">
		<div class="printing-col col-6">
			<label for="phone_primary">Primary Phone Number:</label>
			<span class="printing-span"><?php echo e($form->phone_primary); ?></span>
		</div>
		<div class="printing-col col-6">
			<label for="phone_secondary">Secondary Phone Number:</label>
			<span class="printing-span"><?php echo e($form->phone_secondary); ?></span>
		</div>
	</div>
	<div class="row">
		<div class="printing-col col-6">
			<label for="email">Email:</label>
			<span class="printing-span">
				<?php if(isset($form->email) && !empty($form->email)): ?>
					<?php echo e($form->email); ?>

				<?php else: ?>
					No Email Id
				<?php endif; ?>
			</span>
		</div>
		<div class="printing-col col-6">
			<label>Preferred method of contact:</label>
			<span class="printing-span"><?php echo e(selectPreferredContact($form->preferred_contact)); ?></span>
		</div>
	</div>
	<div class='row'><div class='col-12'><hr></div></div>
	<div class="row">
		<div class="col-12 text-center">
			<h5>Other Contact</h5>
		</div>
	</div>
	<div class="row">
		<div class="printing-col col-6 ">
			<label>Name:</label>
			<span class="printing-span"><?php echo e($form->other_contact_name); ?></span>
		</div>
		<div class="printing-col col-6 ">
			<label>Relationship:</label>
			<span class="printing-span"><?php echo e($form->other_contact_relationship); ?></span>
		</div>
	</div>
	<div class="row">
		<div class="printing-col col-4 ">
			<label>Phone Number:</label>
			<span class="printing-span"><?php echo e($form->other_contact_phone); ?></span>
		</div>
		<div class="printing-col col-8 ">
			<label>Email:</label>
			<span class="printing-span"><?php echo e($form->other_contact_email); ?></span>
		</div>
	</div>
	<div class='row'><div class='col-12'><hr></div></div>
	<div class="row">
		<div class="col-12 text-center">
			<h5>Best Time to Contact</h5>
		</div>
	</div>
	<?php if($form instanceof \App\Models\Patient): ?>
		<contact-time printing="1" values="<?php echo e(json_encode($form->contactTime->json())); ?>"></contact-time>
	<?php else: ?>
		<contact-time printing="1" values="<?php echo e(json_encode($form->patient->contactTime->json())); ?>"></contact-time>
	<?php endif; ?>
	<div class='row'><div class='col-12'><hr></div></div>
	<div class="row">
		<div class="printing-col col-6">
			<label for="insurance_primary">Primary Insurance:</label>
			<span class="printing-span"><?php echo e($form->insurance_primary); ?></span>
		</div>
		<div class="printing-col col-6">
			<label for="insurance_primary_idnum">ID#:</label>
			<span class="printing-span"><?php echo e($form->insurance_primary_idnum); ?></span>
		</div>
	</div>
	<div class="row">
		<div class="printing-col col-6">
			<label for="insurance_secondary">Secondary Insurance:</label>
			<span class="printing-span"><?php echo e($form->insurance_secondary); ?></span>
		</div>
		<div class="printing-col col-6">
			<label for="insurance_secondary_idnum">ID#:</label>
			<span class="printing-span"><?php echo e($form->insurance_secondary_idnum); ?></span>
		</div>
	</div>
	<div class="row">
		<div class="printing-col col-12">
			<label for="emr">EMR#:</label>
			<span class="printing-span"><?php echo e($form->emr); ?></span>
		</div>
	</div>
<?php else: ?>
	<div class="row">
		<div class="col-6">
			<div class="form-group">
				<label>Select Practice</label>
				<?php
                $params     = ["practice_id"];
                $name       = $params[0];
                $attributes = defaultParameter($params, 1, []);
                $selected   = defaultParameter($params, 2, "");
                $options    = ["" => "None"];
                $practices  = Auth::user()->is_admin ? App\Models\Practice::activePractices() : Auth::user()->employee->practices;
                foreach ($practices as $practice) {
                    $options[$practice->id] = $practice->name;
                }
                echo App\Support\Form::selectSearchable("Practice", $name, $options, $attributes, $selected);
            ?>
			</div>
		</div>
		<div class="col-6">
			<div class="form-group">
				<label>Select Physician</label>
				<?php echo App\Support\Form::select("Physician", "physician_id", [], ["id" => "physician"]); ?>
			</div>
		</div>
	</div>
	<div class='row'><div class='col-12'><hr></div></div>
	<div class="row">
		<div class="col-4">
			<div class="form-group">
				<label for="lname">Last Name</label>
				<?php echo \App\Support\Form::input('text', "lname", ["id" => "lname", "class" => "capitalize"]); ?>
			</div>
		</div>
		<div class="col-4">
			<div class="form-group">
				<label for="fname">First Name</label>
				<?php echo \App\Support\Form::input('text', "fname", ["id" => "fname", "class" => "capitalize"]); ?>
			</div>
		</div>
		<div class="col-4">
			<div class="form-group">
				<label for="mname">Middle Name</label>
				<?php echo \App\Support\Form::input('text', "mname", ["id" => "mname", "class" => "capitalize"]); ?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-4 col-md-2">
			<div class="form-group">
				<label>Gender</label>
				<?php echo App\Support\Form::select("Gender", "gender", [
					0 => "Male",
					1 => "Female"
				]); ?>
			</div>
		</div>
		<div class="col-md-4 form-group">
			<label>Marital Status</label>
			<?php echo App\Support\Form::select("Marital Status", "marital_status", [
			"single" => "Single",
			"partnered" => "Partnered",
			"married" => "Married",
			"separated" => "Separated",
			"divorced" => "Divorced",
			"widowed" => "Widowed"
			]); ?>
		</div>
		<div class="col-8 col-md-4">
			<div class="form-group">
				<label>Date of Birth</label>
				<?php echo \App\Support\Form::input('date', "dob"); ?>
			</div>
		</div>
		<div class="col-4 col-md-2">
			<label>Age</label>
			<input type="text" class="form-control" id="age" readonly>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<div class="form-group">
				<label for="addr1">Address Line 1</label>
				<?php echo \App\Support\Form::input('text', "addr1", ["id" => "addr1"]); ?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<div class="form-group">
				<label for="addr2">Address Line 2</label>
				<?php echo \App\Support\Form::input('text', "addr2", ["id" => "addr2"]); ?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label for="city">City</label>
				<?php echo \App\Support\Form::input('text', "city", ["id" => "city", "class" => "capitalize"]); ?>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label for="state">State</label>
				<select class="custom-select" name="state"><option value="">Select State</option><option value="AK">Alaska</option><option value="AL">Alabama</option><option value="AR">Arkansas</option><option value="AZ">Arizona</option><option value="CA">California</option><option value="CO">Colorado</option><option value="CT">Connecticut</option><option value="DC">District of Columbia</option><option value="DE">Delaware</option><option value="FL">Florida</option><option value="GA">Georgia</option><option value="HI">Hawaii</option><option value="IA">Iowa</option><option value="ID">Idaho</option><option value="IL">Illinois</option><option value="IN">Indiana</option><option value="KS">Kansas</option><option value="KY">Kentucky</option><option value="LA">Louisiana</option><option value="MA">Massachusetts</option><option value="MD">Maryland</option><option value="ME">Maine</option><option value="MI">Michigan</option><option value="MN">Minnesota</option><option value="MO">Missouri</option><option value="MS">Mississippi</option><option value="MT">Montana</option><option value="NC">North Carolina</option><option value="ND">North Dakota</option><option value="NE">Nebraska</option><option value="NH">New Hampshire</option><option value="NJ">New Jersey</option><option value="NM">New Mexico</option><option value="NV">Nevada</option><option value="NY">New York</option><option value="OH">Ohio</option><option value="OK">Oklahoma</option><option value="OR">Oregon</option><option value="PA">Pennsylvania</option><option value="PR">Puerto Rico</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option><option value="SD">South Dakota</option><option value="TN">Tennessee</option><option value="TX">Texas</option><option value="UT">Utah</option><option value="VA">Virginia</option><option value="VT">Vermont</option><option value="WA">Washington</option><option value="WI">Wisconsin</option><option value="WV">West Virginia</option><option value="WY">Wyoming</option></select><div class="invalid-feedback"></div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label for="zip">Zip Code</label>
				<?php echo \App\Support\Form::input('text', "zip", ["id" => "zip"]); ?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-4">
			<label>Ethnicity</label>
			<div class="select-other-container"><select id="ethnicity1" class="select-other custom-select" name="ethnicity1"><option value="">Select Ethnicity</option><option>Caucasian</option><option>African-American</option><option>Asian</option><option>Hispanic/Latino</option><option>Unknown</option><option class="editable">Enter Other...</option></select><div class="edit-option-container"><input class="form-control edit-option" style="display: none;" placeholder="Click to enter other..."></div><div class="invalid-feedback"></div></div>
		</div>
		<div class="form-group col-md-4">
			<label>Other Ethnicity (Optional)</label>
			<div class="select-other-container"><select id="ethnicity2" class="select-other custom-select" name="ethnicity2"><option value="">Select Ethnicity</option><option>Caucasian</option><option>African-American</option><option>Asian</option><option>Hispanic/Latino</option><option>Unknown</option><option class="editable">Enter Other...</option></select><div class="edit-option-container"><input class="form-control edit-option" style="display: none;" placeholder="Click to enter other..."></div><div class="invalid-feedback"></div></div>
		</div>
		<div class="col-md-4 form-group">
			<label>Education</label>
			<div class="select-other-container"><select class="select-other custom-select" name="education"><option value="">Select Education</option><option>High School</option><option>Trade School</option><option>Some College</option><option>College</option><option>Unknown</option><option class="editable">Enter Other...</option></select><div class="edit-option-container"><input class="form-control edit-option" style="display: none;" placeholder="Click to enter other..."></div><div class="invalid-feedback"></div></div>
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-3">
			<label>Occupation Status</label>
			<?php echo App\Support\Form::select("Occupation Status", "occupation_status", config("form.occupation_status")); ?>
		</div>
		<div class="form-group col-md-5">
			<label for="occupation_description">Occupation Description</label>
			<?php echo \App\Support\Form::input('text', "occupation_description"); ?>
		</div>
        <div class="col-md-4 form-group">
            <label>Have you ever served in the Military?</label>
            <?php echo App\Support\Form::select("Military served status", "military", [
                0 => "Yes",
                1 => "No",
                2 => "Unknown"
            ], [ "id" => "military" ]); ?>
        </div>
	</div>
	<div class="row">
		<div class="col-md-4 form-group">
			<label for="email">Email</label>
			<?php
                $params     = ["None", "no_email", "no_email"];
                $label      = $params[0];
                $name       = $params[1];
                $id         = $params[2];
                $value      = defaultParameter($params, 3, 1);
                $attributes = defaultParameter($params, 4, []);
                $checked    = defaultParameter($params, 5, False);
                echo \App\Support\Form::checkBox($name, $id, $label, $value, $attributes, $checked);
            ?>
			<!-- <div class="col-md-12">
			 <input class="form-check-input" type="checkbox"  id="no_email" name="no_email" >
			 <label class="form-check-label" for="no-email">No Email</label>
			</div> -->
		</div>
	</div>
	<div data-toggle="buttons">
		<div class="row">
			<div class="col-md-12">
				
				<div class="input-group form-group">
					<div class="input-group-prepend btn-group btn-group-toggle" >
						<label class="btn btn-outline-primary" for="email-preferred">
							Preferred
							<?php echo \App\Support\Form::input("radio", "preferred_contact", ["id" => "email-preferred", "value" => "2", "data-feedback" => "contact-preferred-feedback"]); ?>
						</label>
					</div>
					<?php echo \App\Support\Form::input('email', "email", ["id" => "email"]); ?>
				</div>
			</div>
		</div>		
		<div class="row">
			<div class="col-md-6">
				<label for="phone_primary">Primary Phone Number</label>
				<div class="input-group form-group">
					<div class="input-group-prepend btn-group btn-group-toggle" >
						<label class="btn btn-outline-primary" for="phone-primary-preferred">
							Preferred
							<?php echo \App\Support\Form::input("radio", "preferred_contact", ["id" => "phone-primary-preferred", "value" => "0", "data-feedback" => "contact-preferred-feedback"]); ?>
						</label>
					</div>
					<input data-inputmask="'mask': '(999) 999-9999'" class="form-control" name="phone_primary" type="text" value="" autocomplete="off"><div class="invalid-feedback"></div>
				</div>
			</div>
			<div class="col-md-6">
				<label for="phone_secondary">Secondary Phone Number</label>
				<div class="input-group form-group">
					<div class="input-group-prepend btn-group btn-group-toggle" >
						<label class="btn btn-outline-primary" for="phone-secondary-preferred">
							Preferred
							<?php echo \App\Support\Form::input("radio", "preferred_contact", ["id" => "phone-secondary-preferred", "value" => "1", "data-feedback" => "contact-preferred-feedback"]); ?>
						</label>
					</div>
					<input data-inputmask="'mask': '(999) 999-9999'" class="form-control" name="phone_secondary" type="text" value="" autocomplete="off"><div class="invalid-feedback"></div>
				</div>
			</div>
		</div>
		
		
		<div class="row">
			<div class="col-md-12">
				<label>Other Contact</label>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4 col-md-6 form-group">
				<label>Name</label>
				<?php echo \App\Support\Form::input('text', "other_contact_name"); ?>
			</div>
			<div class="col-lg-2 col-md-6 form-group">
				<label>Relationship</label>
				<?php echo \App\Support\Form::input('text', "other_contact_relationship"); ?>
			</div>
			<div class="col-lg-2 col-md-4 form-group">
				<label>Phone Number</label>
				<input data-inputmask="'mask': '(999) 999-9999'" class="form-control" name="other_contact_phone" type="text" value="" autocomplete="off"><div class="invalid-feedback"></div>
			</div>
			<div class="col-lg-4 col-md-8 form-group">
				<label>Email</label>
				<?php echo \App\Support\Form::input('email', "other_contact_email"); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-12 text-right">
				<span class="invalid-feedback visible" style="display: inline;" data-feedback-area="contact-preferred-feedback"></span>
				<div class="btn-group btn-group-toggle">
					<label class="btn btn-outline-primary" for="preferred_contact">
						Preferred
						<?php echo \App\Support\Form::input("radio", "preferred_contact", ["id" => "other-preferred", "value" => "3", "data-feedback" => "contact-preferred-feedback"]); ?>
					</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="invalid-feedback visible" data-feedback-area="other-preferred-feedback"></div>
			</div>
		</div>
	</div>
	<div class='row'><div class='col-12'><hr></div></div>
	<div class='row'><div class='col-12 text-center'><h3>Best Time to Contact</h3></div></div>
	<contact-time></contact-time>
	<div class='row'><div class='col-12'><hr></div></div>
	<div class="row">
		<div class="col-6 div form-group">
			<label for="insurance_primary">Primary Insurance</label>
			<?php echo \App\Support\Form::input('text', "insurance_primary"); ?>
		</div>
		<div class="col-6 div form-group">
			<label for="insurance_primary_idnum">ID#</label>
			<?php echo \App\Support\Form::input('text', "insurance_primary_idnum"); ?>
			<input type="hidden" name="insurance_primary_idnum_check" id="insurance_primary_idnum_check" value="0">
		</div>
	</div>
	<div class="row">
		<div class="col-6 div form-group">
			<label for="insurance_secondary">Secondary Insurance</label>
			<?php echo \App\Support\Form::input('text', "insurance_secondary"); ?>
		</div>
		<div class="col-6 div form-group">
			<label for="insurance_secondary_idnum">ID#</label>
			<?php echo \App\Support\Form::input('text', "insurance_secondary_idnum"); ?>
			<input type="hidden" name="insurance_secondary_idnum_check" id="insurance_secondary_idnum_check" value="0">
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<div class="form-group">
				<label for="emr">EMR#</label>
				<?php echo \App\Support\Form::input('text', "emr", ["id" => "emr"]); ?>
			</div>
		</div>
	</div>
<?php endif; ?>