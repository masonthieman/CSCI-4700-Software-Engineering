<div class="row">
    <div class="printing-col col-md-4">
        <label for="Last Name">Last Name:</label>
        <span class="printing-span">{{$form->lname}}</span>
    </div>
    <div class="printing-col col-md-4">
        <label for="First Name">First Name:</label>
        <span class="printing-span">{{$form->fname}}</span>
    </div>
    <div class="printing-col col-md-4">
        <label for="">Middle Name:</label>
        <span class="printing-span">{{$form->mname}}</span>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class=" form-inline">
            <label for="">Gender: </label>
            <label>
                <input name="" type="radio" value="" {{radioNo($form->gender)}}/>
                Male
            </label>
            <label>
                <input name="" type="radio" value="" {{radioYes($form->gender)}}/>
                Female
            </label>
        </div>
    </div>
    <div class="printing-col col-md-8">
        <label for="">Date Of Birth:</label>
        <span class="printing-span">{{dateValue($form->dob)}}</span>
    </div>
</div>
<div class="row">
    <div class="printing-col col-md-12">
        <label for="addr1">Address Line 1:</label>
        <span class="printing-span">{{$form->addr1}}</span>
    </div>
</div>
<div class="row">
    <div class="printing-col col-md-12">
        <label for="addr2">Address Line 2:</label>
        <span class="printing-span">{{$form->addr2}}</span>
    </div>
</div>
<div class="row">
    <div class="printing-col col-md-4">
        <label for="city">City:
        </label>
        <span class="printing-span">{{$form->city}}</span>
    </div>
    <div class="printing-col col-md-4">
        <label for="state">State:
        </label>
        <span class="printing-span">{{$form->state}}</span>
    </div>
    <div class="printing-col col-md-4">
        <label for="zip">Zip Code:

        </label>
        <span class="printing-span">{{$form->zip}}</span>
    </div>
</div>
<div class="row">
    <div class="printing-col col-md-4">
        <label for="">Ethnicity:

        </label>
        <span class="printing-span">{{$form->ethnicity1}}</span>
    </div>
    <div class="printing-col col-md-4">
        <label for="">Other Ethnicity (Optional):

        </label>
        <span class="printing-span">{{$form->ethnicity2}}</span>
    </div>
    <div class="printing-col col-md-4 ">
        <label for="">Education:

        </label>
        <span class="printing-span">{{$form->education}}</span>
    </div>
</div>
<div class="row">
    <div class="printing-col col-md-4 ">
        <label>Marital Status:</label>
        <span class="printing-span">{{ucwords($form->marital_status)}}</span>
    </div>
    <div class="printing-col col-md-12">
        <label for="">Occupation Description:</label>
        <span class="printing-span">{{$form->occupation_description}}</span>
        <label for="occupation-status-retired">
            <input name="" type="radio" {{radioYes($form->occupation_status)}}/>
            Retired
        </label>
        <label for="occupation-status-working">
            <input name="" type="radio" {{radioNo($form->occupation_status)}}>
            Working
        </label>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <label for="phone_primary">Primary Phone Number:</label>
        <label>
            <input name="" type="radio" {{$form->preferred_contact == 0 ? "checked" : ""}}>
            Preferred
        </label>
    </div>
    <div class="col-md-6">
        <label for="phone_secondary">Secondary Phone Number:</label>
        <label>
            <input name="" type="radio" {{$form->preferred_contact == 1 ? "checked" : ""}}}}>
            Preferred
        </label>
    </div>
</div>
<div class="row">
    <div class="form-group printing-col col-md-4">
        <span class="printing-span">{{$form->phone_primary}}</span>
    </div>
    <div class="form-group col-md-2">
    </div>
    <div class="form-group printing-col col-md-4">
        <span class="printing-span">{{$form->phone_secondary}}</span>
    </div>
    <div class="form-group col-md-2">
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <label for="email">Email:</label>
        <label>
            <input name="" type="radio" {{$form->preferred_contact == 2 ? "checked" : ""}}>
            Preferred
        </label>
    </div>
</div>
<div class="row">
    <div class="form-group printing-col col-md-12">
        <span class="printing-span">
            {{$form->email}}
        </span>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <label for="">Other Contact:</label>
        <label for="">
            <input name="" type="radio" {{$form->preferred_contact == 3 ? "checked" : ""}}>
            Preferred
        </label>
    </div>
</div>
<div class="row">
    <div class="printing-col col-md-6 ">
        <label for="">Name:</label>
        <span class="printing-span">{{$form->other_contact_name}}</span>
    </div>
    <div class="printing-col col-md-6 ">
        <label for="">Relationship:</label>
        <span class="printing-span">{{$form->other_contact_relationship}}</span>
    </div>
</div>
<div class="row">
    <div class="printing-col col-md-4 ">
        <label for="">Phone Number:</label>
        <span class="printing-span">{{$form->other_contact_phone}}</span>
    </div>
    <div class="printing-col col-md-8 ">
        <label for="">Email:</label>
        <span class="printing-span">{{$form->other_contact_email}}</span>
    </div>
</div>
<div class="row">
    <div class="printing-col col-md-6 div ">
        <label for="insurance_primary">Primary Insurance:</label>
        <span class="printing-span">{{$form->insurance_primary}}</span>
    </div>
    <div class="printing-col col-md-6 div ">
        <label for="insurance_primary_idnum">ID#:</label>
        <span class="printing-span">{{$form->insurance_primary_idnum}}</span>
    </div>
</div>
<div class="row">
    <div class="printing-col col-md-6 div ">
        <label for="insurance_secondary">Secondary Insurance:</label>
        <span class="printing-span">{{$form->insurance_secondary}}</span>
    </div>
    <div class="printing-col col-md-6 div ">
        <label for="insurance_secondary_idnum">ID#:</label>
        <span class="printing-span">{{$form->insurance_secondary_idnum}}</span>
    </div>
</div>
<div class="row">
    <div class="printing-col col-md-12">
        <label for="emr">EMR#:</label>
        <span class="printing-span">{{$form->emr}}</span>
    </div>
</div>
